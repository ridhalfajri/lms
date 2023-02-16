@extends('layouts.index')
@section('content')
    <div class="col-xs-12">

        <div class="box-content">
            <div class="btn-group dropdown-btn-group pull-right mb-6"><a href="#"
                    class="btn btn-primary btn-xs waves-effect waves-light">Tambah
                    Pengguna</a>
            </div>
            <h4 class="box-title">Default</h4>
            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Jabatan</th>
                        <th>No Telepon</th>
                        <th>Instansi</th>
                        <th>Unit Kerja</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Jabatan</th>
                        <th>No Telepon</th>
                        <th>Instansi</th>
                        <th>Unit Kerja</th>
                        <th>Role</th>
                    </tr>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.box-content -->
    </div>
@endsection
