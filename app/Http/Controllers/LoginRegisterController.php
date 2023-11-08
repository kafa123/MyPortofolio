<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class LoginRegisterController extends Controller
{
    //

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'photo'=>'image|nullable|max:1999'
        ]);
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filenameSimpan);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $path
            ]);
        } else {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }
        $data = [
            'name'=> $request->name,
            'email'=> $request->email
        ];

        dispatch(new SendMailJob($data));

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
            ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email',
            'photo' => 'image|nullable|max:1999'
        ]);
        // dd($request->all());
        $user = User::findOrFail($id);
        // check apakah image is uploaded
        if ($request->hasFile('photo')){
            // upload  new image
            $image = $request->file('photo');
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filenameSimpan);

            //delete old image
            // dd(public_path().''.$user->photo);
            Storage::delete('photos/'.$user->photo);

            //update post with new image
            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'photo'     => $filenameSimpan
            ]);
        } else {
            //update user without photo
            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
            ]);
        }
        //redirect to dashboard
        return redirect()->route('user.index')->with(['message' => 'Data Berhasil Diubah!']);
    }
     public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('welcome');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }
    public function resize(Request $request, string $id){
        $user = User::findOrFail($id);
        return view('auth.resize', compact('user'));
    }

    // resize image post
    public function resizePost(string $id){
        $user = User::findOrFail($id);

        $photoPath = public_path('storage/'.$user->photo);

        $thumbnailPath = public_path('storage/thumbnails/'.$user->photo);
        $photoResized = Image::make($photoPath);
        $photoResized->fit(100,100);
        $photoResized->save($thumbnailPath);
        return redirect()->route('auth.resize', $user->id)->with(['message'=> 'Berhasil di resize']);
    }

    public function edit(string $id){
        $user = User::findOrFail($id);
        if (Auth::check()) {
            return view('auth.edit', compact('user'));
        }
    }

    public function destroy(string $id){
        $user = User::findOrFail($id);

        Storage::delete($user->photo);

        $user->delete();

        return redirect()->route('auth.index')->with(['message' => 'Data Berhasil Dihapus!']);
    }

    public function indexUser(){
        $users = User::get();
        if (Auth::check()) {
            return view('auth.index', compact('users'));
        }
    }

}
