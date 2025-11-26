@extends('admin.template.app')

@section('title')
    Materi Subject - {{ $subject->judul }}
@endsection

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-4 text-gray-800">Tambah Materi Subject - {{ $subject->judul }}
                </h5>
                <a href="{{ route('admin.subject.material.index', $subject->id) }}">
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
                <form action="{{ route('admin.subject.material.store', $subject->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="image">Image</label>
                                <input type="file" class="dropify form-control" id="image" name="image" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="judul">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Judul" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="judul">Link Video</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="link_video" name="link_video"
                                        placeholder="Link" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea id="editor" name="deskripsi"></textarea>
                        </div>
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
