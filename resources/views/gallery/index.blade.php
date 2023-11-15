@extends('layouts.master')
@section('content')
    @include('components.navbar')

    <div class="container bg-body-secondary rounded-3 px-0  pb-4">
        <div class="container-fluid bg-white d-flex justify-content-start align-items-start ">
            <a href="{{ route('gallery.create') }}" class=" btn btn-info m-2">(+) Create gallery</a>
        </div>

        <div class="container-fluid p-3 ">
            <div class="row mt-5">
                @if (count($galleries) > 0)
                    @foreach ($galleries as $gallery)
                        <div class="col-sm-2 bg-body-tertiary m-2 rounded-4 ">
                            <div>
                                <div class="row p-3 rounded-2 ">
                                    <div class="col col-6">
                                        <a class="example-image-link" href="{{ asset('storage/posts_image/' . $gallery->picture) }}"
                                            data-lightbox="roadtrip" data-title="{{ $gallery->description }}">
                                            <img class="example-image img-fluid mb-2"src="{{ asset('storage/posts_image/' . $gallery->picture) }}"
                                                alt="image-1" />
                                        </a>
                                    </div>
                                    <div class="col col-3 ">
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-primary">Edit</a>
                                <form onsubmit="return confirm('Yakin ingin hapus ?');"
                                    action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger my-2">Delete</button>
                                </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <h3>Tidak ada data.</h3>
                @endif
                <div class="d-flex">
                    {{ $galleries->links() }}
                </div>
                <div class="d-flex mt-5">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">
                        < Back to Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
