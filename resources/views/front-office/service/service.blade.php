<div class="container-fluid services py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Layanan Kami</h5>
            <h1>Layanan yang Dibangun Khusus Untuk Bisnis Anda</h1>
        </div>
        <div class="row g-5 services-inner">
            @foreach ($services as $key => $service)
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".{{$key + 3}}s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                {{-- <i class="fa fa-code fa-7x mb-4 text-primary"></i> --}}
                                <div class="p-4 text-center">
                                    @if ($service->icon)
                                        <img src="{{ Storage::disk('s3')->url($service->icon) }}" alt="" class="img-fluid rounded"
                                        style="width: 90%; height: 250px">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="" class="img-fluid rounded"
                                        style="width: 90%; height: 250px">
                                    @endif
                                </div>
                                @if ($service->link)
                                    <a href="{{ $service->link }}">
                                        <h4 class="mb-3">{{ $service->title }}</h4>
                                    </a>
                                @else
                                    <h4 class="mb-3">{{ $service->title }}</h4>
                                @endif
                                <p class="mb-4">{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>