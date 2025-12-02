@extends('admin.template.app')

@section('title')
    User
@endsection

@section('content')
    <div class="col-xxl">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="fw-bold m-0">User</h4>
                <div class="d-flex gap-1 justify-content-end align-items-center">
                    <a href="{{ route('admin.user.create') }}">
                        <button type="button" class="btn btn-primary">
                            <span class="tf-icons bx bx-plus"></span>&nbsp;Tambah User</button>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Whatsapp</th>
                                <th>Level</th>
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
                url = '/admin/user'

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        $('#myTable').DataTable({
                            data: response,
                            columns: [{
                                    data: null,
                                    render: function(data, type, row, meta) {
                                        return meta.row + 1;
                                    }
                                },
                                {
                                    data: 'name'
                                },
                                {
                                    data: 'email'
                                },
                                {
                                    data: 'whatsapp'
                                },
                                {
                                    data: 'level',
                                    render: function(data) {
                                        return data.charAt(0).toUpperCase() + data
                                            .slice(1);
                                    }
                                },
                                {
                                    data: 'id',
                                    orderable: false,
                                    searchable: false,
                                    render: function(data) {

                                        var editUrl =
                                            "{{ route('admin.user.edit', ':id') }}";
                                        var deleteUrl =
                                            "{{ route('admin.user.destroy', ':id') }}";

                                        editUrl = editUrl.replace(':id', data);
                                        deleteUrl = deleteUrl.replace(':id', data);

                                        return `
                                        <a href="${editUrl}">
                                            <button type="button" class="btn btn-icon btn-warning">
                                                <span class="tf-icons bx bx-edit"></span>
                                            </button>
                                        </a>
                                        <button onclick="deleteUser('${deleteUrl}')"
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

        function deleteUser(deleteurl) {
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
                                },
                                error: function(response) {
                                    swal(response.status, {
                                            icon: "error",
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
