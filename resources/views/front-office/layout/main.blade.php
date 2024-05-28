<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Mareca - IT Solutions Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        {{-- icon web --}}
        <link rel="icon" type="image/png" href="{{ asset('images/mareca-logo.png') }}">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('assets/hightechit/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/hightechit/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/hightechit/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/hightechit/css/style.css') }}" rel="stylesheet">

        {{-- custom css --}}
        <style>
            
        </style>

    </head>

    <body>

        @include('front-office.layout.spinner')

        @include('front-office.layout.topbar')

        @include('front-office.layout.navbar')
        
        @yield('content')

        @include('front-office.layout.footer')

        <a href="https://wa.me/6285523782593" class="" target="_blank" style="position: fixed; left: 25px; bottom: 25px;">
            <img src="{{asset('images/wa.png')}}" alt="" style="width: 55px; height: 55px">
        </a>

        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/hightechit/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets/hightechit/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/hightechit/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/hightechit/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('assets/hightechit/js/main.js') }}"></script>
    </body>

</html>