@extends('layouts.index')
@section('content')
    <div class="col-xs-12">
        <div class="box-content">
            <div class="btn-group dropdown-btn-group pull-right mb-6"><a href="{{ route('user.create') }}"
                    class="btn btn-primary btn-xs waves-effect waves-light">Tambah
                    Pengguna</a>
            </div>
            <h4 class="box-title">Daftar Pengguna</h4>
            <table id="tbl-pengguna" class="table table-striped table-bordered display" style="width:100%">
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
            e("#tbl-pengguna").DataTable({
                // scrollY: "200px",
                scrollCollapse: !0,
                paging: true,
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
                        name: 'i.nama'
                    },
                    {
                        data: 'unit_kerja',
                        name: 'unit_kerja'
                    },
                    {
                        data: 'role',
                        name: 'ur.role'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ]
            })

        })
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
        $('#tbl-penggunas+').delegate('a.delete', 'click', function(e) {
            e.preventDefault();
            let that = $(this);

            swal({
                    title: "Hapus",
                    text: "Apakah kamu yakin akan menghapus user ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    confirmButtonColor: '#f60e0e',
                })
                .then((willDelete) => {
                    if (willDelete) {
                        delete_data(that.data('id')).then(function(hasil) {
                            if (hasil.error == false) {
                                swal({
                                    title: "Terhapus!",
                                    text: "User berhasil dihapus",
                                    type: 'success',
                                    confirmButtonColor: '#304ffe'
                                });
                            } else {
                                table.ajax.reload();
                                swal("Data tidak dihapus", {
                                    icon: "error"
                                })
                            }
                        }).catch(function(err) {
                            console.log(err);
                        })
                    } else {
                        swal("File anda aman")
                    }
                })
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
    </script>
@endpush
