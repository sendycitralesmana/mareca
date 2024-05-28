<div class="container-fluid py-5 mb-5 team">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Tim Kami</h5>
            <h1>Temui Tim Ahli Kami</h1>
        </div>
        <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">

            @foreach ($users as $key => $user)
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">

                                @if ($user->foto)
                                    <img src="{{ Storage::disk('s3')->url($user->foto) }}" class="img-fluid w-100 rounded-circle" alt=""
                                    style="height: 300px">
                                @else
                                    <img src="{{ asset('images/profile-default.jpg') }}" alt="" class="img-fluid w-100 rounded-circle"
                                    style="height: 300px">
                                @endif

                                {{-- <img src="{{ asset('assets/hightechit/img/team-1.jpg') }}" class="img-fluid w-100 rounded-circle" alt=""> --}}
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">{{ $user->name }}</h4>
                                <p class="m-0">{{ $user->role->role }}</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>