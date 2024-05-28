<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/back-office/client/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Klien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Klien <span class="text-danger">*</span></label>
                                <input type="text"  name="client" class="form-control @if($errors->has('client')) is-invalid @endif" placeholder="Klien" value="{{ old('client') }}"
                                required oninvalid="this.setCustomValidity('Klien harus diisi')" oninput="this.setCustomValidity('')">
                                @if($errors->has('client'))
                                <small class="help-block" style="color: red">{{ $errors->first('client') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url"  name="link" class="form-control @if($errors->has('link')) is-invalid @endif" placeholder="Link" value="{{ old('link') }}"
                                >
                                @if($errors->has('link'))
                                <small class="help-block" style="color: red">{{ $errors->first('link') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <img class="foto img-fluid mb-3 col-sm-5">
                                <input type="file" name="image" class="form-control @if($errors->has('image')) is-invalid @endif" id="foto" onchange="preview()">
                                @if($errors->has('image'))
                                <small class="help-block" style="color: red">{{ $errors->first('image') }}</small>
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
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }
</script>
{{--  --}}