@extends('admin.template.app')

@section('title', 'Kelas')

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-4 text-gray-800">Tambah Kelas</h5>
                <a href="{{ route('admin.kelas.index') }}">
                    <button type="button" class="btn btn btn-outline-danger" fdprocessedid="g81fsj"><i
                            class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                </a>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $item)
                                <li> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.kelas.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="file">Image</label>
                                <input type="file" class="dropify form-control" id="file" name="file" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-3">
                                <label class="form-label" for="judul">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Judul" required />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="harga" class="form-label">Harga</label>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" class="form-control" placeholder="0" aria-label="harga"
                                            aria-describedby="basic-addon1" id="harga" name="harga">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="switchCheckDefault" name="isReady">
                                        <label class="form-check-label" for="switchCheckDefault">status</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea id="editor" name="deskripsi"></textarea>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" value="Save" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.dropify').dropify();

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then((editor) => {}).catch(error => {
                console.error(error);
            });
    </script>

@endsection
