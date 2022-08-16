@extends('layouts.admin')

@section('konten')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Surat Pengantar</h4>
                <p class="card-description">
                    Generate Surat Pengantar Desa Ngasinan
                </p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="forms-sample" name="surat" id="surat" method="post"
                    action="{{ URL::to('suratpengantarform') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nik">NIK Pemohon</label>
                        <input required onkeyup="isi_otomatis()" type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK Pemohon">
                        @error('nik')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input required type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan Nama Lengkap">
                        @error('nama_lengkap')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input required type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                        @error('tempat_lahir')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input required type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="31-12-1969">
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
                        <label for="Kewarganegaraan">Kewarganegaraan</label>
                        <select class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                            <option value="indonesia">Indonesia</option>
                        </select>
                        @error('kewarganegaraan')
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
                        <label for="pekerjaan">Pekerjaan</label>
                        <input required type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Masukan Pekerjaan">
                        @error('pekerjaan')
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
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="8"></textarea>
                        @error('alamat')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                        <input required name="no_kk" type="text" class="form-control" id="no_kk" placeholder="Masukan Nomor KK">
                        @error('no_kk')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_surat">Nomor Surat</label>
                        <input name="no_surat" type="text" class="form-control" id="no_surat" placeholder="Masukan Nomor Surat">
                        @error('no_surat')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <textarea name="tujuan" class="form-control" id="tujuan" rows="8" placeholder="Tujuan Surat"></textarea>
                        @error('tujuan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <textarea name="keperluan" class="form-control" id="keperluan" rows="8" placeholder="Keperluan Surat"></textarea>
                        @error('keperluan')
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
                    <div class="form-group">
                        <label for="pejabat_penandatangan">Pejabat Penandatangan</label>
                        <select name="pejabat_penandatangan" class="form-control" id="pejabat_penandatangan">
                            <option value="kepala desa">Kepala Desa</option>
                            <option value="sekretaris desa">Sekretaris Desa</option>
                        </select>
                        @error('pejabat_penandatangan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function isi_otomatis(){
            var nik = $("#nik").val();
            $.ajax({
                url: '/autofill/' + nik,
                data:"nik="+nik ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#nik').val(obj.nik);
                $('#nama_lengkap').val(obj.nama_lengkap);
                $('#tempat_lahir').val(obj.tempat_lahir);
                $('#tanggal_lahir').val(obj.tanggal_lahir);
                $('#jenis_kelamin').val(obj.jenis_kelamin);
                $('#status_kawin').val(obj.status_kawin);
                $('#no_kk').val(obj.no_kk);
                $('#alamat').val(obj.alamat);
                $('#pekerjaan').val(obj.pekerjaan);
                $('#agama').val(obj.agama);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            }).error(function(data){
                document.getElementById("nik-danger").style.visibility = "visible";
            });
        }
    </script>
@endsection
