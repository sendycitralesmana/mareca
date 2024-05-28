<div class="modal fade" id="edit-{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/back-office/service/{{ $service->id }}/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Layanan <span class="text-danger">*</span></label>
                                <input type="text"  name="title" class="form-control @if($errors->has('title')) is-invalid @endif" value="{{ $service->title }}"
                                required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Layanan harus diisi')">
                                @if($errors->has('title'))
                                <small class="help-block" style="color: red">{{ $errors->first('title') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Keterangan <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control @if($errors->has('description')) is-invalid @endif" rows="3"
                                    required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')">{{ $service->description }}</textarea>
                                @if($errors->has('description'))
                                <small class="help-block" style="color: red">{{ $errors->first('description') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url"  name="link" class="form-control @if($errors->has('link')) is-invalid @endif" placeholder="Link" value="{{ $service->link }}">
                                @if($errors->has('link'))
                                <small class="help-block" style="color: red">{{ $errors->first('link') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="icon">Ikon</label>
                                @if ($service->icon)
                                    <img src="{{ Storage::disk('s3')->url($service->icon) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"
                                    style="width: 150px; height: 150px">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input type="file" name="icon" class="form-control @if($errors->has('icon')) is-invalid @endif" id="img-preview" onchange="previewImg()">
                                @if($errors->has('icon'))
                                <small class="help-block" style="color: red">{{ $errors->first('icon') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-arrow-left"></span> Kembali</button>
                    <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewImg() {
        const image = document.querySelector('#img-preview')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'
        imgPreview.style.width = '150px'
        imgPreview.style.height = '150px'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>
{{--  --}}