@extends('back-office.layout.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/back-office/blog-data/blog" class="">Data Blog</a></li>
            <li class="breadcrumb-item active">Detail Blog</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

  <div class="row">
    <div class="col">
      <div class="card card-widget card-outline card-primary">
        <div class="card-header">
          <div class="user-block">
            @if ($blog->user_id)
                @if ($blog->user->foto)
                    <img class="img-circle img-fluid" src="{{ Storage::disk('s3')->url($blog->user->foto) }}" alt="User Image">
                @else
                    <img class="img-circle img-fluid" src="{{ asset('images/profile-default.jpg') }}" alt="User Image">
                @endif
                <span class="username">
                    <a href="#">{{ $blog->user->name }}</a>
                </span>
            @else
                <img class="img-circle img-fluid" src="{{ asset('images/profile-default.jpg') }}" alt="User Image">
                <span class="username" style="color: #0d6efd">
                    Admin
                </span>
            @endif
            <span class="description">Dibagikan secara publik - {{ $blog->created_at->diffForHumans() }}</span>
          </div>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-4">
              <div class="img text-center p-2">
                @if ($blog->image)
                    <img class="img-fluid pad rounded" src="{{ Storage::disk('s3')->url($blog->image) }}" alt="Photo"
                    style="width: 90%; height: 350px">
                @else
                    <img class="img-fluid pad rounded" src="{{ asset('images/no-image.png') }}" alt="Photo"
                    style="width: 90%; height: 350px">
                @endif
              </div>
            </div>
            <div class="col-md-8">
              <div class="blog">
                <h5>
                  <b>{{ $blog->title }}</b>
                </h5>
                <p>
                  {!! $blog->content !!}
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>

@endsection