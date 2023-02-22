@extends('layouts.index')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/plugin/dropify/css/dropify.min.css') }}">
@endpush
@section('content')
    <form action="{{ route('materi.update', $materi->id) }}" method="POST" id="frm-materi" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-lg-6 col-xs-12">
            <div class="box-content card white">
                <h4 class="box-title">Tambah</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <input type="hidden" name="old_dokumen" value="{{ $materi->path }}">
                    <div class="form-group @error('judul') has-error @enderror">
                        <label for="judul">judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            placeholder="Masukkan judul" value="{{ old('judul', $materi->judul) }}">
                        @error('judul')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('deskripsi') has-error @enderror">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" placeholder="Tuliskan deskripsi" name="deskripsi" id="deskripsi">{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('tipe') has-error @enderror">
                        <label for="tipe">Tipe</label>
                        <select class="form-control" name="tipe">
                            <option value="">Pilih tipe materi</option>
                            <option value="Beginner" @if (old('tipe', $materi->level) == 'Beginner') selected @endif>Beginner</option>
                            <option value="Intermediate" @if (old('tipe', $materi->level) == 'Intermediate') selected @endif>Intermediate
                            </option>
                            <option value="Advanced" @if (old('tipe', $materi->level) == 'Advanced') selected @endif>Advanced</option>
                        </select>
                        @error('tipe')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class=" form-group @error('dokumen_materi') has-error @enderror">
                        <label for="dokumen_materi">Dokumen</label>
                        <div class="box-content">
                            <input type="file" id="input-file-now" name="dokumen_materi" class="dropify"
                                accept=".pdf,.docx,.doc" />
                            @error('dokumen_materi')
                                <div class="invalid-feedback text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="checkbox margin-bottom-20">
                        <input type="checkbox" @if ($materi->is_show == 1) checked @endif name="is_show"
                            value="1" id="is_show"><label for="is_show">Tampilkan
                            materi</label>
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
    <script src="{{ asset('assets/plugin/dropify/js/dropify.min.js') }}"></script>

    <script src="{{ asset('assets/scripts/fileUpload.demo.min.js') }}"></script>
@endpush
