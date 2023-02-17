@extends('layouts.index')
@section('content')
    <form action="{{ route('user.store') }}" method="POST" id="frm-user">
        @csrf
        <div class="col-lg-6 col-xs-12">
            <div class="box-content card white">
                <h4 class="box-title">Tambah</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group @error('nip') has-error @enderror">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP"
                            maxlength="18" value="{{ old('nip') }}">
                        @error('nip')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('unit_kerja') has-error @enderror">
                        <label for="unit_kerja">Unit Kerja</label>
                        <input type="text" class="form-control" id="unit_kerja" name="unit_kerja"
                            placeholder="Masukkan unit kerja" maxlength="18" value="{{ old('unit_kerja') }}">
                        @error('unit_kerja')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('jabatan') has-error @enderror">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan"
                            placeholder="Masukkan jabatan" value="{{ old('jabatan') }}">
                        @error('jabatan')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('no_telepon') has-error @enderror">
                        <label for="no_telepon">No Telepon</label>
                        <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                            placeholder="Masukkan no telepon" value="{{ old('no_telepon') }}">
                        @error('no_telepon')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box-content card white">
                <!-- /.box-title -->
                <div class="card-content">
                    <div class="form-group @error('instansi') has-error @enderror">
                        <label for="instansi">Instansi</label>
                        <select class="form-control" name="instansi">
                            <option value="">Pilih Instansi</option>
                            @foreach ($instansi as $item)
                                <option value="{{ $item->id }}" @if (old('instansi') == $item->id) selected @endif>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('instansi')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('role') has-error @enderror">
                        <label for="role">Role</label>
                        <select class="form-control" name="role">
                            <option value="">Pilih role user</option>
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}" @if (old('role') == $item->id) selected @endif>
                                    {{ $item->role }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Masukkan email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group @error('password') has-error @enderror">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan password">
                        @error('password')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" id="save"
                        class="btn btn-primary btn-sm waves-effect waves-light">Simpan</button>

                </div>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>
    </form>
@endsection
