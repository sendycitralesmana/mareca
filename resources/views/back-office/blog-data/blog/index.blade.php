@extends('back-office.layout.main')

@section('content')
    
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Blog</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            {{-- <div class="card card-outline card-primary" >
                <div class="card-header">
                    <form action="" class="">
                        <div class="row d-flex justify-content-between mt-">

                            <div class="d-flex">
                                <div class="pr-4" style="border-right: 3px solid #0d6efd">
                                    <h3 class="card-title">
                                        <b>Blog</b>
                                    </h3>
                                </div>

                                <div class="pl-4">

                                </div>

                                <div class="input-group input-group-sm">
                                    <label for="">Cari: </label>
                                    <select name="searchCategory" class="form-control ml-2" required
                                        oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Kategori harus dipilih')">
                                        <option value="">-- Penulis --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                    <select name="searchCategory" class="form-control ml-2" required
                                        oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Kategori harus dipilih')">
                                        <option value="">-- Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="input-group ml-2">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
    
                                    @if ($sCategory)
                                        <div class="input-group ml-2">
                                            <a href="/back-office/blog-data/blog" class="btn btn-primary btn-sm">
                                                <i class="fas fa-sync-alt"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="">
                                    <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                        <span class="fa fa-plus"></span> Tambah
                                    </button>
                                    @include('back-office.blog-data.blog.modal.add')
            
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div> --}}
            <div class="card card-outline card-primary" >
                <div class="card-header">
                    
                    <div class="row flex justify-content-between mt-">
                        <form action="" class="form-inline">
                            <div class="pr-4" style="border-right: 3px solid #0d6efd">
                                <h3 class="card-title">
                                    <b>Blog</b>
                                </h3>
                            </div>

                            <div class="pl-4">

                            </div>

                            <div class="input-group input-group-sm">
                                <label for="">Cari: </label>
                                <select name="searchUser" class="form-control ml-2">
                                    <option value="">-- Penulis --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <select name="searchCategory" class="form-control ml-2">
                                    <option value="">-- Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="input-group ml-2">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            @if ($sCategory || $sUser)
                                <div class="input-group ml-2">
                                    <a href="/back-office/blog-data/blog" class="btn btn-primary btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            @endif

                        </form>
    
                        <div class="card-tools">
                            <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                <span class="fa fa-plus"></span> Tambah
                            </button>
                            @include('back-office.blog-data.blog.modal.add')
    
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    @if ($sCategory || $sUser)
                        <hr>
                        <div class="search">
                            <div class="text-center">
                                <span class="fa fa-search"></span> Hasil Pencarian dari: 
                                <b>
                                    @if ($sUser)
                                        Penulis {{ $user->name }}
                                    @endif
                                </b>
                                <b>
                                    @if ($sCategory)
                                        Kategori {{ $category->category }}
                                    @endif
                                </b>
                            </div>
                            <hr>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

    @if ($blogs->count() == 0)
        <div class="card card-outline card-primary" >
            <div class="card-header">
                
                <div class="text-center">
                    <span class="fa fa-search"></span> Tidak ada data
                </div>

            </div>
        </div>
    @else
        <div class="row">

            @foreach ($blogs as $key => $blog)
                <div class="col-md-4">
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
                            <div class="img text-center p-2">
                                @if ($blog->image)
                                    <img class="img-fluid pad rounded" src="{{ Storage::disk('s3')->url($blog->image) }}" alt="Photo"
                                    style="width: 90%; height: 250px">
                                @else
                                    <img class="img-fluid pad rounded" src="{{ asset('images/no-image.png') }}" alt="Photo"
                                    style="width: 90%; height: 250px">
                                @endif
                            </div>
                            <div>
                                <h5 style="
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 1;
                                    -webkit-box-orient: vertical;
                                    line-height: 1.5;
                                    max-height: 1.4em;
                                    min-height: 1.4em;
                                    height: 1.4em;
                                "><b>{{ $blog->title }}</b></h5>
                                <p class="py-2" style="
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 3;
                                    -webkit-box-orient: vertical;
                                    line-height: 1.5;
                                    max-height: 4.7em;
                                    min-height: 4.7em;
                                    height: 4.7em;
                                ">{{ $blog->content }}</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <a href="/back-office/blog-data/blog/{{ $blog->id }}/detail" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <button class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#edit-{{ $blog->id }}" title="Ubah">
                                    <i class="fa fa-edit"></i> Ubah
                                </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $blog->id }}" title="Hapus">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- modal --}}
            @foreach ($blogs as $blog)
                @include('back-office.blog-data.blog.modal.edit')
                @include('back-office.blog-data.blog.modal.delete')
            @endforeach

        </div>
    @endif

    {{-- <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header">

                    <div class="row">
                        <h3 class="card-title">Blog</h3>
                    </div>

                    <div class="row flex justify-content-between mt-2">
                        <form action="" class="form-inline">
                            <div class="input-group input-group-sm">
                                <label for="">Cari: </label>
                                <select name="searchCategory" class="form-control ml-2" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Kategori harus dipilih')">
                                    <option value="">-- Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="input-group ml-2">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                            @if ($sCategory)
                                <div class="input-group ml-2">
                                    <a href="/back-office/blog-data/blog" class="btn btn-primary btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            @endif

                        </form>
    
                        <div class="card-tools">
                            
                            <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                                <span class="fa fa-plus"></span> Tambah
                            </button>
                            
                            @include('back-office.blog-data.blog.modal.add')
    
                            @if (session('failAdd'))
    
                            <script>
                                jQuery(function() {
                                    $('#tambah').modal('show');
                                });
                            </script>
    
                            @endif
    
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil </strong>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if ($sCategory)
                        <div class="search">
                            <div class="text-center">
                                <span class="fa fa-search"></span> Hasil Pencarian dari: <b>
                                    @if ($sCategory)
                                        Kategori
                                    @endif
                                    {{ $category->category }}
                                </b>
                            </div>
                            <hr>
                        </div>
                    @endif

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($blogs as $key => $blog)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if ($blog->image)
                                        <img src="{{ Storage::disk('s3')->url($blog->image) }}" alt="" class="img-fluid rounded"
                                        style="width: 100px; height: 100px">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="" class="img-fluid rounded"
                                        style="width: 100px; height: 100px">
                                    @endif
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->content }}</td>
                                <td>{{ $blog->blogCategory->category }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $blog->id }}" title="Ubah">
                                        <i class="fa fa-edit"></i> Ubah
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $blog->id }}" title="Hapus">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @foreach ($blogs as $blog)
                        @include('back-office.blog-data.blog.modal.edit')
                        @include('back-office.blog-data.blog.modal.delete')
                    @endforeach

                </div>

            </div>

        </div>
    </div> --}}

</section>

@endsection