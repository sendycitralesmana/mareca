<div class="container-fluid project py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Proyek Kami</h5>
            <h1>{{ $portfolioDesc }}</h1>
        </div>
        <div class="row g-5">

            @foreach ($portfolios as $key => $portfolio)
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".{{$key + 3}}s">
                    <div class="project-item">
                        <div class="project-img">
                            @if ($portfolio->image)
                                <img src="{{ Storage::disk('s3')->url($portfolio->image) }}" class="img-fluid w-100 rounded" alt=""
                                    style="width: 100px; height: 400px">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="" class="img-fluid w-100 rounded"
                                    style="width: 100px; height: 400px">
                            @endif
                            <div class="project-content">
                                <a class="text-center">
                                    <h4 class="text-secondary">{{ $portfolio->title }}</h4>
                                    <p class="m-0 text-white">{{ $portfolio->description }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{-- Lihat Lebih --}}
        @if ($portfolios->count() > 6)
            <div class="text-center mt-5">
                <a href="" class="btn btn-primary py-3 px-5">Lihat Lebih <span class="fa fa-arrow-right"></span></a>
            </div>
        @endif

    </div>
</div>