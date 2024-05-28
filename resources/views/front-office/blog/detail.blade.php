@extends('front-office.layout.main')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Blog</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ $blog->title }}
                        {{-- <p class="" --}}
                            {{-- maks 20 huruf --}}
                            {{-- style="max-width: 30ch;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: nowrap;" --}}
                        {{-- >{{ $blog->title }}</p> --}}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Fact Start -->
    @include('front-office.layout.fact')
    <!-- Fact End -->

    <div class="container-fluid py-5 my-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <div class="blog-item position-relative bg-light rounded" >
                            @if ($blog->image)
                                <img src="{{ Storage::disk('s3')->url($blog->image) }}" class="img-fluid w-100 rounded-top" alt=""
                                style="height: 400px">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" class="img-fluid w-100 rounded-top" alt=""
                                style="height: 400px">
                            @endif
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded" style="top: -28px; left: 20px;">
                                <i class="fa fa-newspaper"></i> {{ $blog->blogCategory->category }}
                            </span>
                            <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: ;">
                            </div>
                            <div class="blog-content position-relative px-3" style="margin-top: -50px;">
                                <div class="text-center">
    
                                    @if ($blog->user_id)
                                        @if ($blog->user->foto)
                                            <img src="{{ Storage::disk('s3')->url($blog->user->foto) }}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt=""
                                            style="width: 100px; height: 100px">
                                        @else
                                            <img src="{{ asset('images/profile-default.jpg') }}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt=""
                                            style="width: 100px; height: 100px">
                                            @endif
                                            <h5 class="">Ditulis Oleh: {{ $blog->user->name }}</h5>
                                    @else
                                        <img src="{{ asset('images/profile-default.jpg') }}" class="img-fluid rounded-circle border border-4 border-white mb-3" alt=""
                                        style="width: 100px; height: 100px">
                                        <h5 class="">Ditulis Oleh: Admin</h5>
                                    @endif
    
                                    <p class="text-secondary">{{ date('d F, Y', strtotime($blog->created_at)) }}</p>
                                </div>
                            </div>
                            <div class="blog-coment d-flex justify-content-center px-4 py-2 border bg-secondary rounded-bottom">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    {{-- <h5 class="text-primary">{{ $blog->blogCategory->category }}</h5> --}}
                    <h1 class="mb-4">{{ $blog->title }}</h1>
                    <p>{{ $blog->content }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection