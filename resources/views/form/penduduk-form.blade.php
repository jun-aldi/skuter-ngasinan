@extends('layouts.admin')

@section('konten')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Data Penduduk</h4>
                <p class="card-description">
                    Formulir Data Penduduk Desa Ngasinan
                </p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="forms-sample" name="surat" id="surat" method="post"
                    action="{{ URL::to('pendudukform') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input  type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK Pemohon">
                        @error('nik')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                        <input name="no_kk" type="text" class="form-control" id="no_kk" placeholder="Masukan Nomor KK">
                        @error('no_kk')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan Nama Lengkap">
                        @error('nama_lengkap')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                        @error('tempat_lahir')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="31-12-1969">
                        @error('tanggal_lahir')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama" id="agama">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                        @error('agama')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_kawin">Status Kawin</label>
                        <select name="status_kawin" class="form-control" id="status_kawin">
                            <option value="Sudah">Kawin</option>
                            <option value="Belum">Belum Kawin</option>
                            <option value="Pernah">Pernah</option>
                        </select>
                        @error('status_kawin')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input name="pekerjaan" type="text" class="form-control" id="pekerjaan" placeholder="Masukan Pekerjaan">
                        @error('pekerjaan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dukuh">Dukuh</label>
                        <input name="dukuh" type="text" class="form-control" id="dukuh" placeholder="Masukan Alamat Dukuh">
                        @error('dukuh')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input name="rt" type="number" class="form-control" id="rt" placeholder="Masukan Alamat RT">
                        @error('rt')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input name="rw" type="number" class="form-control" id="rw" placeholder="Masukan Alamat Rw">
                        @error('rw')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Ket Lainnya</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="8" placeholder="Keterangan Tambahan"></textarea>
                        @error('keterangan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>


@endsection
