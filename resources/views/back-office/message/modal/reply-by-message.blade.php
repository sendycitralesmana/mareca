<div class="modal fade" id="reply-by-message-{{ $message->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Balasan pesan ke {{ $message->email }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($message->replyMessage as $key => $replyMessage)
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="card-comment">
                                <div class="d-flex jus">
                                    <div>

                                    </div>
                                    <div>

                                    </div>
                                </div>
                                <img class="img-circle img-sm mr-2" src="{{ asset('images/profile-default.jpg') }}" alt="User Image">
                                <div class="comment-text">
                                    <span class="username">
                                        Admin
                                        <span class="text-muted float-right">{{ $replyMessage->created_at }}</span>
                                    </span>
                                    <p>{{ $replyMessage->message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
