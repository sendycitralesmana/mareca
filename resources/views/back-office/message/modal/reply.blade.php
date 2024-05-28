<div class="modal fade" id="reply-{{ $message->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Balas pesan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Pesan dari: <b>{{ $message->email }}</b>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <form role="form" method="POST" action="/back-office/message/{{ $message->id }}/reply-message/store" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Pesan <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="message" rows="3" placeholder="Pesan" required oninvalid="this.setCustomValidity('Pesan harus diisi')" oninput="this.setCustomValidity('')"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-paper-plane"></i> Balas
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
