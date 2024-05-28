<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form role="form" method="POST" action="/back-office/blog-data/blog/create" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul <span class="text-danger">*</span></label>
                                <input type="text"  name="title" class="form-control @if($errors->has('title')) is-invalid @endif" placeholder="Judul" value="{{ old('title') }}"
                                required oninvalid="this.setCustomValidity('Jasa harus diisi')" oninput="this.setCustomValidity('')">
                                @if($errors->has('title'))
                                <small class="help-block" style="color: red">{{ $errors->first('title') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="content">Keterangan <span class="text-danger">*</span></label>
                                <textarea name="content" id="content" class="form-control @if($errors->has('content')) is-invalid @endif" required id="editor"
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Keterangan harus diisi')">{{ old('content') }}</textarea>
                                @if($errors->has('content'))
                                <small class="help-block" style="color: red">{{ $errors->first('content') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">Kategori <span class="text-danger">*</span></label>
                                <select name="category" id="category" class="form-control @if($errors->has('category')) is-invalid @endif" required
                                    oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Kategori harus dipilih')">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                <small class="help-block" style="color: red">{{ $errors->first('category') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar <span class="text-danger">*</span></label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input type="file" name="image" class="form-control @if($errors->has('image')) is-invalid @endif" id="img-preview" onchange="previewImg()">
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