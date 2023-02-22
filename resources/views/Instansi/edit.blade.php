@extends('layouts.index')

@section('content')
    <form action="{{ route('instansi.update', $instansi->id) }}" method="POST" id="frm-instansi">
        @csrf
        @method('PUT')
        <div class="col-lg-6 col-xs-12">
            <div class="box-content card white">
                <h4 class="box-title">Tambah</h4>
                <!-- /.box-title -->
                <div class="card-content">

                    <div class="form-group @error('nama') has-error @enderror">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama"
                            value="{{ old('nama', $instansi->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('jenis') has-error @enderror">
                        <label for="jenis">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis"
                            placeholder="Masukkan jenis" value="{{ old('jenis', $instansi->jenis) }}">
                        @error('jenis')
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
