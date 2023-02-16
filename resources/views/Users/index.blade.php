@extends('layouts.index')
@section('content')
    <div class="col-xs-12">

        <div class="box-content">
            <div class="btn-group dropdown-btn-group pull-right mb-6"><a href="#"
                    class="btn btn-primary btn-xs waves-effect waves-light">Tambah
                    Pengguna</a>
            </div>
            <h4 class="box-title">Default</h4>
            <table id="xx" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        {{-- <th>no</th> --}}
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Jabatan</th>
                        <th>No Telepon</th>
                        <th>Instansi</th>
                        <th>Unit Kerja</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        {{-- <th>no</th> --}}
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Jabatan</th>
                        <th>No Telepon</th>
                        <th>Instansi</th>
                        <th>Unit Kerja</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
@endsection
@push('script')
    <script>
        $(function(e) {
            e("#xx").DataTable({
                scrollY: "200px",
                scrollCollapse: !0,
                paging: !1,
                processing: true,
                serverSide: true,
                ajax: '{!! route('user.json') !!}',
                columns: [{
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan'
                    },
                    {
                        data: 'no_telepon',
                        name: 'no_telepon'
                    },
                    {
                        data: 'nama_instansi',
                        name: 'nama_instansi'
                    },
                    {
                        data: 'unit_kerja',
                        name: 'unit_kerja'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ]
            })

        })
    </script>
@endpush
