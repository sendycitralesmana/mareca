@extends('back-office.layout.main')

@section('content')
    
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Proyek</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Proyek</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Proyek</h3>

                    <div class="card-tools">
                        {{-- <a href="/backoffice/portfolio/tambah" class="btn btn-success btn-sm" title="Tambah">
                            <i class="fas fa-plus"></i> Tambah
                        </a> --}}
                        <button title="Tambah" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah">
                            <span class="fa fa-plus"></span> Tambah
                        </button>

                        {{-- @if ($errors->any())
                            <script>
                                jQuery(function() {
                                    $('#tambah').modal('show');
                                });
                            </script>
                        @endif --}}

                        {{-- Modal --}}
                        @include('back-office.project.modal.add')

                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
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

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Proyek</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($portfolios as $key => $portfolio)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if ($portfolio->image)
                                    <img src="{{ Storage::disk('s3')->url($portfolio->image) }}" class="img-fluid rounded" style="width: 100px; height: 100px">
                                    @else
                                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded" style="width: 100px; height: 100px">
                                    @endif
                                </td>
                                <td>{{ $portfolio->title }}</td>
                                <td>
                                    <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#description-{{ $portfolio->id }}" title="Deskripsi">
                                        <i class="fa fa-eye"></i> Lihat Keterangan
                                    </button>    
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $portfolio->id }}" title="Ubah">
                                        <i class="fa fa-edit"></i> Ubah
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $portfolio->id }}" title="Hapus">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($portfolios as $portfolio)
                        @include('back-office.project.modal.edit')
                        @include('back-office.project.modal.description')
                        @include('back-office.project.modal.delete')
                    @endforeach

                </div>

            </div>

        </div>
    </div>

</section>

@endsection