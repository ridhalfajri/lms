@extends('layouts.index')
@section('content')
    <form action="{{ route('soal.update', $soal->id) }}" method="POST" id="frm-soal">
        @csrf
        @method('PUT')
        <div class="col-lg-6 col-xs-12">
            <div class="box-content card white">
                <h4 class="box-title">Tambah</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <div class="form-group @error('pertanyaan') has-error @enderror">
                        <label for="pertanyaan">Soal</label>
                        <textarea class="form-control" placeholder="Tuliskan pertanyaan" name="pertanyaan" id="pertanyaan">{{ old('pertanyaan', $soal->pertanyaan) }}</textarea>
                        @error('pertanyaan')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('opsi1') has-error @enderror">
                        <label for="opsi1">Opsi 1</label>
                        <input type="text" class="form-control" id="opsi1" name="opsi1"
                            placeholder="Tuliskan opsi 1" value="{{ old('opsi1', $soal->opsi1) }}">
                        @error('opsi1')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('opsi2') has-error @enderror">
                        <label for="opsi2">Opsi 2</label>
                        <input type="text" class="form-control" id="opsi2" name="opsi2"
                            placeholder="Tuliskan opsi 2" value="{{ old('opsi2', $soal->opsi2) }}">
                        @error('opsi2')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('opsi2') has-error @enderror">
                        <label for="opsi3">Opsi 3</label>
                        <input type="text" class="form-control" id="opsi3" name="opsi3"
                            placeholder="Tuliskan opsi 3" value="{{ old('opsi3', $soal->opsi3) }}">
                        @error('opsi3')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('opsi2') has-error @enderror">
                        <label for="opsi4">Opsi 4</label>
                        <input type="text" class="form-control" id="opsi4" name="opsi4"
                            placeholder="Tuliskan opsi 4" value="{{ old('opsi4', $soal->opsi4) }}">
                        @error('opsi4')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('jawaban') has-error @enderror">
                        <label for="jawaban">jawaban</label>
                        <select class="form-control" name="jawaban">
                            <option value="">Pilih jawaban soal</option>
                            <option value="1" @if (old('role', $soal->jawaban) == 1) selected @endif>Opsi 1</option>
                            <option value="2" @if (old('role', $soal->jawaban) == 2) selected @endif>Opsi 2</option>
                            <option value="3" @if (old('role', $soal->jawaban) == 3) selected @endif>Opsi 3</option>
                            <option value="4" @if (old('role', $soal->jawaban) == 4) selected @endif>Opsi 4</option>
                        </select>
                        @error('jawaban')
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
