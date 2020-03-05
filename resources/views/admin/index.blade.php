@extends('layouts.app')
@section('title', 'Data Diri')
@section('content')

        <div class="datatables">
            <div class="col-lg-12">
            <div class="card" style="padding: 2%;">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nim</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>JK</th>
                                <th>Asal Sekolah</th>
                                <th>Jurusan</th>
                                <th>Semester</th>
                                <th>Admin?</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


@stop
@push('scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<!-- App scripts -->
<script>

    $(document).ready(function () {
        $(function () {
            var table = $('#user-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.user') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nim', name: 'nim' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'address', name: 'address' },
                    { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                    { data: 'asal_sekolah', name: 'asal_sekolah' },
                    { data: 'jurusan', name: 'jurusan' },
                    { data: 'semester', name: 'semester' },
                    { data: 'is_admin', name: 'is_admin' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'id', render: function (data, type, row){
                        let url = "{!! route('admins.edit', ':id') !!}";
                        url = url.replace(':id', data);
                        var url_hapus = "{{ route('admins.destroy', ':id') }}";
                        url_hapus = url_hapus.replace(':id', data);
                        return '<div class="btn-group">' +
                                    '<a href="'+url+'" class="btn btn-info btn-flat-border btn_edit">Edit</a>' +
                                    '<form action="'+url_hapus+'" method="POST" class="target">'+
                                        '@csrf'+
                                        '@method("DELETE")'+
                                        '<button type="submit" class="btn btn-danger btn-flat-border btn_hapus">Hapus</button>'+
                                    '</form>' +
                                '</div>';
                    }}]

            });
        });
        $("#user-table").on("click", ".btn_hapus", function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Yakin?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, delete!'
            }).then((result) => {
            if (result.value) {
                $( ".target" ).submit();
            }
            })
         });
    });

</script>
@endpush

