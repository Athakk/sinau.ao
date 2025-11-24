@extends('admin.template.app')

@section('title')
    Materi Kelas - {{ $kelas->judul }}
@endsection

@section('content')
    <div class="col-xxl">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="fw-bold m-0"> Materi Kelas - {{ $kelas->judul }}</h4>
                <div class="d-flex gap-2 justify-content-end align-items-center">
                    <a href="{{ route('admin.kelas.index') }}">
                        <button type="button" class="btn btn btn-outline-danger" fdprocessedid="g81fsj"><i
                                class='bx bxs-chevron-left'></i>&nbsp;Kembali</button>
                    </a>
                    <a href="{{ route('admin.kelas.materi.create', $kelas->id) }}">
                        <button type="button" class="btn btn-primary">
                            <span class="tf-icons bx bx-plus"></span>&nbsp;Tambah Materi</button>
                    </a>
                </div>
            </div>
            <hr class="m-0 " />
            <div class="card-body">
                <div class="table-responsive text-nowrap mb-4">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Link Video</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="table-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            loadData();

            function loadData() {
                url = '/admin/kelas/{{ $kelas->id }}/materi'

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function(response) {

                        $('#myTable').DataTable({
                            data: response.materis,
                            columns: [{
                                    data: null,
                                    render: function(data, type, row, meta) {
                                        return meta.row + 1;
                                    }
                                },
                                {
                                    data: 'judul'
                                },
                                {
                                    data: 'link_video',
                                    orderable: false,
                                    searchable: false,
                                    render: function(data) {
                                        return `<a href="${data}">
                                        ${data}
                                        </a>`
                                    }
                                },
                                {
                                    data: 'id',
                                    orderable: false,
                                    searchable: false,
                                    render: function(data, type, row) {

                                        var editUrl =
                                            "{{ route('admin.kelas.materi.edit', [':idKelas', ':idMateri']) }}";
                                        var deleteUrl =
                                            "{{ route('admin.kelas.materi.destroy', [':idKelas', ':idMateri']) }}";


                                        editUrl = editUrl.replace(':idKelas', response
                                            .kelas.id);
                                        editUrl = editUrl.replace(':idMateri', data);
                                        deleteUrl = deleteUrl.replace(':idKelas',
                                            response
                                            .kelas.id);
                                        deleteUrl = deleteUrl.replace(':idMateri',
                                            data);

                                        return `
                                        <a href="${editUrl}">
                                            <button type="button" class="btn btn-icon btn-warning">
                                                <span class="tf-icons bx bx-edit"></span>
                                            </button>
                                        </a>
                                        <button onclick="deleteKelas('${deleteUrl}')"
                                        type="submit" class="btn btn-icon btn-danger btn-delete">
                                        <span class="tf-icons bx bx-trash"></span>
                                        </button>
                                        `
                                    }
                                }
                            ]
                        });
                    }
                });
            }


        });

        function deleteKelas(deleteurl) {
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                type: "DELETE",
                                url: deleteurl,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        }
    </script>
@endsection
