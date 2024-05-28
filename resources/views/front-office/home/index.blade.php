@extends('front-office.layout.main')

@section('content')

    <!-- Carousel Start -->
        @include('front-office.layout.carousel')
    <!-- Carousel End -->

    <!-- Fact Start -->
        @include('front-office.layout.fact')
    <!-- Fact End -->

    <!-- About Start -->
        @include('front-office.about.about')
    <!-- About End -->

    <!-- Services Start -->
        @include('front-office.service.service')
    <!-- Services End -->

    <!-- Project Start -->
        @include('front-office.project.project')
    <!-- Project End -->

    <!-- Blog Start -->
        @include('front-office.blog.blog')
    <!-- Blog End -->

    <!-- Team Start -->
        @include('front-office.about.team')
    <!-- Team End -->

    <!-- Contact Start -->
        @include('front-office.contact.contact')
    <!-- Contact End -->

    <!-- Client Start -->
    @include('front-office.about.client')
    <!-- Client End -->

@endsection