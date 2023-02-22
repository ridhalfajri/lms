@extends('layouts.index')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/plugin/daterangepicker/daterangepicker.css') }}">
@endpush
@section('content')
    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" id="frm-kelas">
        @csrf
        @method('PUT')
        <div class="col-lg-6 col-xs-12">
            <div class="box-content card white">
                <h4 class="box-title">Edit</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <div class="form-group @error('nama') has-error @enderror">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama"
                            value="{{ old('nama', $kelas->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('tipe') has-error @enderror">
                        <label for="tipe">Tipe</label>
                        <select class="form-control" name="tipe">
                            <option value="">Pilih tipe kelas</option>
                            <option value="Beginner" @if (old('tipe', $kelas->tipe) == 'Beginner') selected @endif>Beginner</option>
                            <option value="Intermediate" @if (old('tipe', $kelas->tipe) == 'Intermediate') selected @endif>Intermediate
                            </option>
                            <option value="Advanced" @if (old('tipe', $kelas->tipe) == 'Advanced') selected @endif>Advanced</option>
                        </select>
                        @error('tipe')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('ruang') has-error @enderror">
                        <label for="ruang">Ruang</label>
                        <input type="text" class="form-control" id="ruang" name="ruang"
                            placeholder="Masukkan ruang" value="{{ old('ruang', $kelas->ruang) }}">
                        @error('ruang')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group @error('tgl') has-error @enderror">
                        <label for="tgl">Tanggal</label>
                        <input class="form-control input-daterange-datepicker" type="text" name="tgl"
                            value="{{ old('tgl', $kelas->tgl) }}">
                        @error('tgl')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" id="save"
                        class="btn btn-primary btn-sm waves-effect waves-light">Simpan</button>

                    <!-- /.card-content -->
                </div>
                <!-- /.box-content -->
            </div>
    </form>
@endsection

@push('script')
    <script src="{{ asset('assets/plugin/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugin/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        "use strict";
        $(function(e) {
            e(".input-daterange-datepicker").length && e(".input-daterange-datepicker").daterangepicker({
                buttonClasses: ["btn", "btn-sm"],
                applyClass: "btn-default",
                cancelClass: "btn-primary"
            })
        })
    </script>
@endpush
