@extends('layouts.master')
@section('title','resize')
@section('content')
@include('components.navbar')
@if ($message = Session::get('message'))
	<div class="alert alert-success">
		{{ $message }}
	</div>
	@endif
    <div class="d-flex align-items-center justify-content-center flex-column">
        <img src="{{ asset('storage/'.$user->photo) }}" width="300" class="mb-5" alt="{{ $user->name }}">
        <form action="{{ route('auth.resizePost', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary my-2">Resize Ke bentuk Thumbnail (100x100)> </button>
            <a href="{{ route('auth.index') }}" class=" btn btn-danger text-center my-3">
				Cancel
			</a>

        </form>
    </div>
@endsection
