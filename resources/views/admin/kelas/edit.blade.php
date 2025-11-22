@extends('admin.template.app')

@section('title', 'Edit Kelas')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Kelas</h5>
                <a href="{{ route('kelas.index') }}">
                    <button type="button" class="btn btn-outline-danger">
                        <i class='bx bxs-chevron-left'></i>&nbsp;Kembali
                    </button>
                </a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kelas.update', $kelas->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="image">Image</label>
                                <input type="file" class="dropify form-control" id="file" name="file"
                                    data-default-file="{{ $kelas->image ? asset('storage/kelas/' . $kelas->image) : '' }}" />
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    placeholder="Judul Kelas" value="{{ old('judul', $kelas->judul) }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control" placeholder="0" id="harga" name="harga"
                                        value="{{ old('harga', $kelas->harga) }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault"
                                        name="isReady" {{ old('isReady', $kelas->isReady) == 'yes' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="switchCheckDefault">Aktif / Ready</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="editor" class="form-label">Deskripsi</label>
                            <textarea id="editor" name="deskripsi">{!! old('deskripsi', $kelas->deskripsi) !!}</textarea>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.dropify').dropify();

            if (document.querySelector('#editor')) {
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>
@endsection
