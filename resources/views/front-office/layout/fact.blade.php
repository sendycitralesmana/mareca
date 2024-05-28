<div class="container-fluid bg-secondary py-5">
    <div class="container">
        <div class="row">
            <div class="col wow fadeIn" data-wow-delay=".1s">
                <div class="d-flex counter">
                    <h1 class="me-3 text-primary counter-value">{{ $services->count() }}</h1>
                    <h5 class="text-white mt-1">Layanan Untuk Bisnis Anda</h5>
                </div>
            </div>
            <div class="col wow fadeIn" data-wow-delay=".3s">
                <div class="d-flex counter">
                    <h1 class="me-3 text-primary counter-value">{{ $portfoliosC->count() }}</h1>
                    <h5 class="text-white mt-1">Proyek Sudah Diselesaikan</h5>
                </div>
            </div>
            <div class="col wow fadeIn" data-wow-delay=".5s">
                <div class="d-flex counter">
                    <h1 class="me-3 text-primary counter-value">{{ $blogsC->count() }}</h1>
                    <h5 class="text-white mt-1">Blog Sudah Ditulis</h5>
                </div>
            </div>
            <div class="col wow fadeIn" data-wow-delay=".7s">
                <div class="d-flex counter">
                    <h1 class="me-3 text-primary counter-value">{{ $users->count() }}</h1>
                    <h5 class="text-white mt-1">Tim Ahli Kami</h5>
                </div>
            </div>
            <div class="col wow fadeIn" data-wow-delay=".9s">
                <div class="d-flex counter">
                    <h1 class="me-3 text-primary counter-value">{{ $clients->count() }}</h1>
                    <h5 class="text-white mt-1">Klien Bekerja Sama Dengan Kami</h5>
                </div>
            </div>
        </div>
    </div>
</div>