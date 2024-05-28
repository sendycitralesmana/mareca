@extends('back-office.layout.main')

@section('content')
    
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Layanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Layanan</li>
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
                    <h3 class="card-title">Layanan</h3>

                    <div class="card-tools">
                        {{-- <a href="/backoffice/service/tambah" class="btn btn-success btn-sm" title="Tambah">
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
                        @include('back-office.service.modal.add')

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
                                <th>Ikon</th>
                                <th>Layanan</th>
                                <th>Keterangan</th>
                                <th>Link</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($services as $key => $service)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if ($service->icon)
                                    <img src="{{ Storage::disk('s3')->url($service->icon) }}" class="img-fluid rounded" style="width: 100px; height: 100px">
                                    @else
                                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded" style="width: 100px; height: 100px">
                                    @endif
                                </td>
                                <td>{{ $service->title }}</td>
                                <td>
                                    <button type="button" class="badge badge-light pl-2 pr-2" data-toggle="modal" data-target="#description-{{ $service->id }}" title="Deskripsi">
                                        <i class="fa fa-eye"></i> Lihat Keterangan
                                    </button>    
                                </td>
                                <td>
                                    <a href="{{ $service->link }}" target="_blank">{{ $service->link }}</a>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-{{ $service->id }}" title="Ubah">
                                        <i class="fa fa-edit"></i> Ubah
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $service->id }}" title="Hapus">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($services as $service)
                        @include('back-office.service.modal.edit')
                        @include('back-office.service.modal.description')
                        @include('back-office.service.modal.delete')
                    @endforeach

                </div>

            </div>

        </div>
    </div>

</section>

@endsection