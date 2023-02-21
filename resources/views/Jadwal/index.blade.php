@extends('layouts.index')
@section('content')
    <div class="col-xs-12">

        <div class="box-content">
            <div class="btn-group dropdown-btn-group pull-right mb-6"><a href="{{ route('jadwal.create') }}"
                    class="btn btn-primary btn-xs waves-effect waves-light">Tambah
                    Jadwal Instruktur</a>
            </div>
            <h4 class="box-title">{{ $title }}</h4>
            <table id="tbl-jadwal" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Instruktur</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kelas</th>
                        <th>Instruktur</th>
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
            e("#tbl-jadwal").DataTable({
                // scrollY: "200px",
                scrollCollapse: !0,
                paging: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel'
                ],
                processing: true,
                serverSide: true,
                responsive: true,
                pageLength: 10,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                ajax: '{!! route('jadwal.json') !!}',
                columns: [{
                        data: 'nama_kelas',
                        name: 'kls.nama'
                    },
                    {
                        data: 'nama_instruktur',
                        name: 'instruktur.name',
                    },
                    {
                        data: 'tgl_mulai',
                        name: 'kls.tgl_mulai',
                    },
                    {
                        data: 'tgl_akhir',
                        name: 'kls.tgl_akhir',
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
            $('#tbl-jadwal').delegate('a.delete', 'click', function(e) {
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
                            url: "{{ url('jadwal') }}/" + that.data('id'),
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            dataType: 'JSON',
                            data: {
                                _method: 'DELETE'
                            }
                        })
                        $('#tbl-jadwal').DataTable().ajax.reload();
                        // window.location.reload();
                        swal({
                            title: "Terhapus",
                            text: "Jadwal instruktur berhasil dihapus!",
                            type: "success",
                            confirmButtonColor: '#304ffe',
                        });
                    } else {
                        swal({
                            title: "Batal",
                            text: "Jadwal instruktur tidak dihapus!",
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
