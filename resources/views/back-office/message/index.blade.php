@extends('back-office.layout.main')

@section('content')
    
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pesan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Pesan</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pesan</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
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
                    
                    {{-- if error any --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <table class="table table-bordered table-hover text-center" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pesan</th>
                                <th>Balasan</th>
                                <th>Tanggal & Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $key => $message)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>
                                    @if (strlen($message->message) > 48)
                                    {{ substr($message->message, 0, 48) }}
                                    <span class="" style="cursor: pointer" data-toggle="modal" data-target="#more-message-{{ $message->id }}" title="selengkapnya">...</span>
                                    @else
                                    {{ $message->message }}
                                    @endif
                                </td>
                                <td>
                                    @if ($message->replyMessage->count() > 0)
                                        <button class="badge badge-light" data-toggle="modal" data-target="#reply-by-message-{{ $message->id }}" title="Lihat balasan">
                                            <i class="fa fa-eye"></i> {{ $message->replyMessage->count() }} Balasan
                                        </button>
                                    @else
                                        Tidak ada
                                    @endif
                                </td>
                                <td>{{ $message->created_at }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reply-{{ $message->id }}" title="Ubah">
                                        <i class="fa fa-reply"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-{{ $message->id }}" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- modal --}}
                    @foreach ($messages as $message)
                        @include('back-office.message.modal.reply')
                        @include('back-office.message.modal.reply-by-message')
                        @include('back-office.message.modal.more-message')
                        @include('back-office.message.modal.delete')
                    @endforeach

                </div>

            </div>

        </div>
    </div>

</section>

@endsection