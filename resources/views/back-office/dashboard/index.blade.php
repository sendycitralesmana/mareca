@extends('back-office.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Beranda</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Beranda</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $users->count() }}</h3>

          <p>Pengguna</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="/back-office/user-data/user" class="small-box-footer">
          Lihat Lebih <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $services->count() }}</h3>

          <p>Layanan</p>
        </div>
        <div class="icon">
          <i class="fas fa-file-signature"></i>
        </div>
        <a href="/back-office/service" class="small-box-footer">
          Lihat Lebih <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $portfolios->count() }}</h3>

          <p>Projek</p>
        </div>
        <div class="icon">
          <i class="fas fa-tasks"></i>
        </div>
        <a href="/back-office/portfolio" class="small-box-footer">
          Lihat Lebih <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $blogs->count() }}</h3>

          <p>Blog</p>
        </div>
        <div class="icon">
          <i class="fas fa-newspaper"></i>
        </div>
        <a href="/back-office/blog-data/blog" class="small-box-footer">
          Lihat Lebih <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $clients->count() }}</h3>

          <p>Klien</p>
        </div>
        <div class="icon">
          <i class="fas fa-users-rectangle"></i>
        </div>
        <a href="/back-office/client" class="small-box-footer">
          Lihat Lebih <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
  </div>

</section>

@endsection