@extends('admin.template.app')

@section('title')
    Materi Kelas - {{ $kelas->judul }}
@endsection

@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Materi Kelas - {{ $kelas->judul }}
                </h5>
                <a href="{{ route('admin.kelas.materi.index', $kelas->id) }}">
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


                <form action="{{ route('admin.kelas.materi.update', [$kelas->id, $materi->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="image">Image</label>
                                <input type="file" class="dropify form-control" id="image" name="image"
                                    data-default-file="{{ $materi->image ? asset('storage/materi/' . $materi->image) : '' }}" />
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="judul">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Judul" value="{{ old('judul', $materi->judul) }}" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="judul">Link Video</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="link_video" name="link_video"
                                        placeholder="Link" value="{{ old('link_video', $materi->link_video) }}" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-12
                                            mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea id="editor" name="deskripsi"> {!! old('deskripsi', $kelas->deskripsi) !!}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" value="Save" class="btn btn-primary">Kirim</button>
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
