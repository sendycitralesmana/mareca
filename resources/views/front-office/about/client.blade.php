<!-- Client Start -->
<div class="container-fluid services py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h5 class="text-primary">Klien Kami</h5>
            <h1>Perusahaan Bekerjasama Dengan Kami</h1>
        </div>
        <div class="row g-5 services-inner justify-content-center">

            @foreach ($clients as $key => $client)
                <div class="col-md-6 col-lg-2 col-sm-6 wow fadeIn" data-wow-delay=".{{$key + 3}}s" title="{{ $client->client }}">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                @if ( $client->image )
                                    @if ($client->link)
                                        <a href="{{ $client->link }}" target="_blank">
                                            <img src="{{ Storage::disk('s3')->url($client->image) }}" alt="" class="img-fluid rounded"
                                            style="width: 100px; height: 100px">
                                        </a>
                                    @else
                                        <img src="{{ Storage::disk('s3')->url($client->image) }}" alt="" class="img-fluid rounded"
                                        style="width: 100px; height: 100px">
                                    @endif
                                @else
                                    @if ( $client->link )
                                        <a href="{{ $client->link }}" target="_blank">
                                            <img src="{{ asset('images/no-image.png') }}" alt="" class="img-fluid rounded"
                                            style="width: 100px; height: 100px">
                                        </a>
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="" class="img-fluid rounded"
                                        style="width: 100px; height: 100px">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Client End -->