@extends('front-office.layout.main')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Tentang</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item" aria-current="page">Tentang</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Fact Start -->
    @include('front-office.layout.fact')
    <!-- Fact End -->

    {{-- About Start --}}
        @include('front-office.about.about')
    {{-- About End --}}

    {{-- Team Start --}}
        @include('front-office.about.team')
    {{-- Team End --}}

    {{-- Client Start --}}
        @include('front-office.about.client')
    {{-- Client End --}}

@endsection