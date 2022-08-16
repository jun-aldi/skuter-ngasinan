@extends('layouts.admin')

@section('konten')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Surat Pindah</h4>
            <p class="card-description">
                Generate Surat Pindah Desa Ngasinan
            </p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="forms-sample" name="surat" id="surat" method="post"
                action="{{ URL::to('suratpindahform') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nik_kepala_keluarga">NIK Kepala Keluarga</label>
                    <input required onkeyup="isi_otomatis_kk()" type="text" class="form-control" name="nik_kepala_keluarga" id="nik_kepala_keluarga" placeholder="Masukan NIK Kepala Keluarga Pemohon">
                    @error('nik_kepala_keluarga')
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
                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                    <input required type="text" class="form-control" name="nama_kepala_keluarga" id="nama_kepala_keluarga" placeholder="Masukan Nama Kepala Keluarga">
                    @error('nama_kepala_keluarga')
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
                <br><br>
                <div class="form-group">
                    <label for="nik_pemohon">NIK Pemohon</label>
                    <input required onkeyup="isi_otomatis_pemohon()" type="text" class="form-control" name="nik_pemohon" id="nik_pemohon" placeholder="Masukan NIK Pemohon">
                    @error('nik_pemohon')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap Pemohon</label>
                    <input required type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan Nama Lengkap Pemohon">
                    @error('nama_lengkap')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input required type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukan Nomor Telepon">
                    @error('telepon')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_surat">Nomor Surat</label>
                    <input required name="no_surat" type="text" class="form-control" id="no_surat" placeholder="Masukan Nomor Surat">
                    @error('no_surat')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alasan">Alasan</label>
                    <textarea name="alasan" class="form-control" id="alasan" rows="8" placeholder="Alasan Pindah"></textarea>
                    @error('alasan')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_tujuan">Alamat Tujuan</label>
                    <textarea name="alamat_tujuan" class="form-control" id="alamat_tujuan" rows="8"></textarea>
                    @error('alamat_tujuan')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kepindahan">Jenis Kepindahan</label>
                    <select name="jenis_kepindahan" class="form-control" id="jenis_kepindahan">
                        <option value="pindah">Pindah</option>
                    </select>
                    @error('jenis_kepindahan')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_kk_tidak_pindah">Status KK Tidak Pindah</label>
                    <select name="status_kk_tidak_pindah" class="form-control" id="status_kk_tidak_pindah">
                        <option value="pindah">Pindah</option>
                    </select>
                    @error('status_kk_tidak_pindah')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_kk_pindah">Status KK Pindah</label>
                    <select name="status_kk_pindah" class="form-control" id="status_kk_pindah">
                        <option value="pindah">Pindah</option>
                    </select>
                    @error('status_kk_pindah')
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
    function isi_otomatis_kk(){
        var nik = $("#nik_kepala_keluarga").val();
        $.ajax({
            url: '/autofill/' + nik,
            data:"nik="+nik ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nik_kepala_keluarga').val(obj.nik);
            $('#nama_kepala_keluarga').val(obj.nama_lengkap);
            $('#no_kk').val(obj.no_kk);
            $('#alamat').val(obj.alamat);
            document.getElementById("nik-danger").style.visibility = "hidden";
            var result = confirm("Data berhasil ditemukan !");
        }).error(function(data){
            document.getElementById("nik-danger").style.visibility = "visible";
        });
    }
    function isi_otomatis_pemohon(){
        var nik = $("#nik_pemohon").val();
        $.ajax({
            url: '/autofill/' + nik,
            data:"nik="+nik ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nik_pemohon').val(obj.nik);
            $('#nama_lengkap').val(obj.nama_lengkap);
            document.getElementById("nik-danger").style.visibility = "hidden";
            var result = confirm("Data berhasil ditemukan !");
        }).error(function(data){
            document.getElementById("nik-danger").style.visibility = "visible";
        });
    }
</script>

@endsection
