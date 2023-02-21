@extends('layouts.index')
@section('content')
    <div class="col-xs-12">

        <div class="box-content">
            <div class="btn-group dropdown-btn-group pull-right mb-6"><a href="{{ route('kelas.create') }}"
                    class="btn btn-primary btn-xs waves-effect waves-light">Tambah
                    Soal</a>
            </div>
            <h4 class="box-title">Default</h4>
            <table id="tbl-kelas" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Ruang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Ruang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
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
            e("#tbl-kelas").DataTable({
                // scrollY: "200px",
                scrollCollapse: !0,
                paging: true,
                processing: true,
                serverSide: true,
                responsive: true,
                pageLength: 10,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                ajax: '{!! route('kelas.json') !!}',
                columns: [{
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'tipe',
                        name: 'tipe',
                    },
                    {
                        data: 'ruang',
                        name: 'ruang',
                    },
                    {
                        data: 'tgl_mulai',
                        name: 'tgl_mulai',
                    },
                    {
                        data: 'tgl_akhir',
                        name: 'tgl_akhir',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                    },
                ],
            })

        });
    </script>
    @if (session()->has('save'))
        <script>
            $(function() {
                swal({
                    title: "Tersimpan!",
                    text: "Berhasil menyimpan data",
                    type: 'success',
                    confirmButtonColor: '#304ffe'
                });
                return false;
            })
        </script>
    @endif
    <script>
        'use strict';
        $(function() {
            $('#tbl-kelas').delegate('a.delete', 'click', function(e) {
                e.preventDefault();
                let that = $(this);

                swal({
                    title: "Hapus",
                    text: "Apakah kamu yakin akan menghapus Kelas ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    confirmButtonColor: '#f60e0e',
                }, function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "{{ url('kelas') }}/" + that.data('id'),
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            dataType: 'JSON',
                            data: {
                                _method: 'DELETE'
                            }
                        })
                        $('#tbl-kelas').DataTable().ajax.reload();
                        // window.location.reload();
                        swal({
                            title: "Terhapus",
                            text: "Kelas berhasil dihapus!",
                            type: "success",
                            confirmButtonColor: '#304ffe',
                        });
                    } else {
                        swal({
                            title: "Batal",
                            text: "Kelas tidak dihapus!",
                            type: "error",
                            confirmButtonColor: '#f60e0e',
                        });
                    }
                });
                return false;


            })

        })
    </script>
@endpush
