@extends('layouts.index')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/plugin/daterangepicker/daterangepicker.css') }}">
@endpush
@section('content')
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" id="frm-jadwal">
        @csrf
        @method('PUT')
        <div class="col-lg-6 col-xs-12">
            <div class="box-content card white">
                <h4 class="box-title">Edit</h4>
                <!-- /.box-title -->
                <div class="card-content">

                    <div class="form-group @error('kelas') has-error @enderror">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas">
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}" @if (old('kelas', $jadwal->kelas_id) == $item->id) selected @endif>
                                    {{ $item->nama . ' [' . $item->tgl_mulai . ' - ' . $item->tgl_akhir . ']' }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('instruktur') has-error @enderror">
                        <label for="instruktur">Instruktur</label>
                        <select class="form-control" name="instruktur">
                            <option value="{{ $jadwal->instruktur_id }}">{{ $jadwal->instruktur->name }}</option>
                        </select>
                        @error('instruktur')
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
