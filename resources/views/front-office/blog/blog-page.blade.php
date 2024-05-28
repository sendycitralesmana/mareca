@extends('front-office.layout.main')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Blog</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Fact Start -->
    @include('front-office.layout.fact')
    <!-- Fact End -->

    {{-- Project Start --}}
        @include('front-office.blog.blog')

        <div class="container-fluid project mb-4">
            <div class="container">
                <div class="row">
                    <div class="">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    {{-- Project End --}}

@endsection