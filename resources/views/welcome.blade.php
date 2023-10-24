@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('components.navbar')
    {{-- about --}}
    <div class="container p-lg-5">
        <div class="row p-3">
            <div class="col-6 p-2">
                <p class="fs-3 fw-bold mt-3" data-aos="fade-right" data-aos-delay="0">Hello,</p>
                <p class="fs-2 fw-bold" data-aos="fade-right" data-aos-delay="50">I am <span class="PrLavender"> Nur Muhammad
                        Kafabih</span></p>
                <p class="text-secondary fs-4" data-aos="fade-right" data-aos-delay="100">Junior Programmer</p>
                <hr class="bg-secondary mt-2" data-aos="fade-right" data-aos-delay="150">
                <p class="text-secondary" data-aos="fade-right" data-aos-delay="200">I am student at University Gadjah Mada
                    in the major Software Engineering and
                    currently in semester 3. For the Time being i'm currently developing the skill necessary for programmer
                    like Javascript, HTML, CSS, Kotlin, and Java</p>
            </div>
            <div class="col-6" data-aos="fade-up">
                <img src="{{ asset('images/Picture.png') }}" alt="">
                <div class="row d-flex align-items-center g-0 g-lg-1 p-lg-5">
                    <div class="col text-center" data-aos="fade-up" data-aos-delay="0">Find Me</div>
                    <div class="col" data-aos="fade-left" data-aos-delay="50" data-aos-easing="ease-in-out">
                        <img src="{{ asset('images/facebook.png') }}" href="google.com" alt="">
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset('images/instagram.png') }}" href="google.com" alt="">
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-delay="150">
                        <img src="{{ asset('images/whatsapp.png') }}" href="google.com" alt="">
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-delay="200">
                        <img src="{{ asset('images/linkedin.png') }}" href="google.com" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- tech stack --}}
    <div class="container p-lg-5 ">
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-5 px-5">
            <div class="col">
                <div class="card p-3 gray " data-aos="fade-right" data-aos-delay="100">
                    <img src="{{ asset('images/file-type-html.svg') }}" class="card-img" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card p-3 gray" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('images/file-type-css.svg') }}" class="card-img" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card p-4 gray" data-aos="fade-down" data-aos-delay="500">
                    <img src="{{ asset('images/kotlin-original.svg') }}" class="card-img" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card p-3 gray" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('images/java-original-wordmark.svg') }}" class="card-img" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card p-4 gray" data-aos="fade-left" data-aos-delay="100">
                    <img src="{{ asset('images/laravel.svg') }}" class="card-img" alt="...">
                </div>
            </div>
            {{-- <div class="col">
                <div class="card p-3 gray">
                    <img src="{{ asset('images/php.svg') }}" class="card-img" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="card gray p-2">
                    <img src="{{ asset('images/file-type-xml.svg') }}" class="card-img" alt="...">
                </div>
            </div> --}}
        </div>
    </div>
    {{-- pesan --}}
    <div class="container px-2 py-2 px-lg-3 TrBlack" data-aos="fade-up" data-aos-delay="0" style="border-radius: 0.5rem">
        <div class="row d-flex align-items-center">
            <div class="col-9 py-1">
                <p class="fs-5 fw-bold text-white " data-aos="fade-down" data-aos-delay="200">Have any project in mind</p>
                <p class="fs-6 text-secondary" data-aos="fade-down" data-aos-delay="100">I'm avaible for freelance</p>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col">
                        <a name="" id="" class="btn border-white text-white " data-aos="fade-down"
                            data-aos-delay="0"href="#" role="button">Button</a>
                    </div>
                    <div class="col">
                        <a name="" id="" class="btn text-white TrLavender" data-aos="fade-down"
                            data-aos-delay="0" href="#" role="button">Email Me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
