@extends('layouts.index')
@section('content')
    <div class="col-xs-12">

        <div class="box-content">
            <div class="btn-group dropdown-btn-group pull-right mb-6"><a href="{{ route('soal.create') }}"
                    class="btn btn-primary btn-xs waves-effect waves-light">Tambah
                    Soal</a>
            </div>
            <h4 class="box-title">Default</h4>
            <table id="tbl-soal" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                    <tr>
                        <th>Soal</th>
                        <th>Opsi 1</th>
                        <th>Opsi 2</th>
                        <th>Opsi 3</th>
                        <th>Opsi 4</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Soal</th>
                        <th>Opsi 1</th>
                        <th>Opsi 2</th>
                        <th>Opsi 3</th>
                        <th>Opsi 4</th>
                        <th>Jawaban</th>
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
            e("#tbl-soal").DataTable({
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
                ajax: '{!! route('soal.json') !!}',
                columns: [{
                        data: 'pertanyaan',
                        name: 'pertanyaan'
                    },
                    {
                        data: 'opsi1',
                        name: 'opsi1',
                    },
                    {
                        data: 'opsi2',
                        name: 'opsi2',
                    },
                    {
                        data: 'opsi3',
                        name: 'opsi3',
                    },
                    {
                        data: 'opsi4',
                        name: 'opsi4',
                    },
                    {
                        data: 'jawaban',
                        name: 'jawaban',
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
            $('#tbl-soal').delegate('a.delete', 'click', function(e) {
                e.preventDefault();
                let that = $(this);

                swal({
                    title: "Hapus",
                    text: "Apakah kamu yakin akan menghapus soal ini?",
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
                            url: "{{ url('soal') }}/" + that.data('id'),
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            dataType: 'JSON',
                            data: {
                                _method: 'DELETE'
                            }
                        })
                        $('#tbl-soal').DataTable().ajax.reload();
                        // window.location.reload();
                        swal({
                            title: "Terhapus",
                            text: "Soal berhasil dihapus!",
                            type: "success",
                            confirmButtonColor: '#304ffe',
                        });
                    } else {
                        swal({
                            title: "Batal",
                            text: "Soal tidak dihapus!",
                            type: "error",
                            confirmButtonColor: '#f60e0e',
                        });
                    }
                });
                return false;


            })

            function delete_data(id) {
                return new Promise(function(resolve, reject) {
                    $.ajax({
                        url: "{{ url('user') }}/" + id,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        // dataType: 'JSON',
                        data: {
                            _method: 'DELETE'
                        }
                    }).done(function(hasil) {
                        resolve(hasil);
                    }).fail(function() {
                        reject('Gagal menghapus data')
                    })
                });
            }
        })
    </script>
@endpush
