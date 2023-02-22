@extends('layouts.index')
@section('content')
    <div class="col-xs-12">
        <div class="btn-group dropdown-btn-group pull-right mb-6"><a href="{{ route('materi.create') }}"
                class="btn btn-primary btn-xs waves-effect waves-light" style="margin-bottom:10px">Tambah
                Materi</a>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="row small-spacing">
            @foreach ($materi as $item)
                <div class="col-md-3 col-xs-12">
                    <div class="box-content bordered primary margin-bottom-20">
                        <div class="profile-avatar">
                            <img src="{{ asset('assets/images/file.png') }}" alt="">
                            <h3><strong>{{ substr($item->judul, 0, 20) }}...</strong></h3>
                            <h4></h4>
                            <p>{{ substr($item->deskripsi, 0, 100) }}...</p>

                            @if (auth()->user()->role_id != 1)
                                <a href="{{ asset('/storage/' . $item->path) }}"
                                    class="btn btn-xs btn-primary waves-effect waves-light"><i
                                        class="ico ico-left fa fa-download"></i>Download</a>
                            @endif
                            @if (auth()->user()->role_id == 1)
                                <div class="btn-group margin-top-10">
                                    <button type="button" class="btn btn-primary dropdown-toggle " data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Aksi <span
                                            class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ asset('/storage/' . $item->path) }}">Download</a></li>
                                        <li><a href="{{ route('materi.edit', encrypt($item->id)) }}">Edit</a></li>
                                        <li><a href="#" class="hapus" data-id="{{ $item->id }}">Hapus</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-content bordered -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('script')
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
            $(".hapus").on("click", function(e) {
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
                            url: "{{ url('materi') }}/" + that.data('id'),
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            dataType: 'JSON',
                            data: {
                                _method: 'DELETE'
                            }
                        })
                        window.location.reload();
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

        })
    </script>
@endpush
