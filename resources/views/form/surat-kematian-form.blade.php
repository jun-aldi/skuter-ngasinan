@extends('layouts.admin')

@section('konten')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Surat Kematian</h4>
                <p class="card-description">
                    Generate Surat Kematian Desa Ngasinan
                </p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-sample" name="surat" id="surat" method="post"
                    action="{{ URL::to('suratkematianform') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="no_surat">Nomor Surat</label>
                        <input required type="text" class="form-control" name="no_surat" id="no_surat"
                            placeholder="Masukan Nomor Surat">
                        @error('no_surat')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_kk">Nomor KK</label>
                        <input required type="text" class="form-control" name="no_kk" id="no_kk"
                            placeholder="Masukan Nomor Surat">
                        @error('no_kk')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_kk">Nama Kepala Keluarga</label>
                        <input required type="text" class="form-control" name="nama_kk" id="nama_kk"
                            placeholder="Masukan Nomor Surat">
                        @error('nama_kk')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik_meninggal">NIK Warga Meninggal</label>
                        <input required onkeyup="isi_otomatis_meninggal()" type="text" class="form-control" name="nik_meninggal"
                            id="nik_meninggal" placeholder="Masukan NIK Meninggal">
                        @error('nik_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap_meninggal">Nama Lengkap</label>
                        <input required type="text" class="form-control" name="nama_lengkap_meninggal" id="nama_lengkap_meninggal"
                            placeholder="Masukan Nama Lengkap">
                        @error('nama_lengkap_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin_meninggal">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin_meninggal" id="jenis_kelamin_meninggal">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir_meninggal">Tempat Lahir</label>
                        <input required type="text" class="form-control" name="tempat_lahir_meninggal" id="tempat_lahir_meninggal"
                            placeholder="Masukan Tempat Lahir">
                        @error('tempat_lahir_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir_meninggal">Tanggal Lahir</label>
                        <input required type="date" class="form-control" name="tanggal_lahir_meninggal"
                            id="tanggal_lahir_meninggal" placeholder="31-12-1969">
                        @error('tanggal_lahir_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="agama_meninggal">Agama</label>
                        <select class="form-control" name="agama_meninggal" id="agama_meninggal">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                        @error('agama_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan_meninggal">Pekerjaan</label>
                        <input required type="text" name="pekerjaan_meninggal" class="form-control" id="pekerjaan_meninggal"
                            placeholder="Masukan Pekerjaan">
                        @error('pekerjaan_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_meninggal">Alamat</label>
                        <textarea required name="alamat_meninggal" class="form-control" id="alamat_meninggal" rows="8"></textarea>
                        @error('alamat_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_kk_meninggal">No KK</label>
                        <input required name="no_kk_meninggal" type="text" class="form-control" id="no_kk_meninggal"
                            placeholder="Masukan Nomor KK">
                        @error('no_kk_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_anak_meninggal">Anak Ke</label>
                        <input required type="text" class="form-control" name="status_anak_meninggal" id="status_anak_meninggal"
                            placeholder="Status Anak Ke..">
                        @error('status_anak_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_meninggal">Tanggal Meninggal</label>
                        <input required type="date" class="form-control" name="tanggal_meninggal" id="tanggal_meninggal"
                            placeholder="31-12-1969">
                        @error('tanggal_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pukul_meninggal">Pukul Meninggal</label>
                        <input required type="time" class="form-control" name="pukul_meninggal" id="pukul_meninggal"
                            placeholder="31-12-1969">
                        @error('pukul_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sebab_meninggal">Sebab Meninggal</label>
                        <select class="form-control" name="sebab_meninggal" id="sebab_meninggal">
                            <option value="sakit biasa / tua">Sakit Biasa / Tua</option>
                            <option value="wabah penyakit">Wabah Penyakit</option>
                            <option value="kecelakaan">Kecelakaan</option>
                            <option value="kriminalisasi">Kriminalisasi</option>
                            <option value="bunuh diri">Bunuh Diri</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        @error('sebab_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_meninggal">Tempat Meninggal</label>
                        <input required type="text" class="form-control" name="tempat_meninggal" id="tempat_meninggal"
                            placeholder="Tempat Meninggal">
                        @error('tempat_meninggal')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="yang_menerangkan">Yang Menerangkan</label>
                        <select class="form-control" name="yang_menerangkan" id="yang_menerangkan">
                            <option value="dokter">Dokter</option>
                            <option value="tenaga kesehatan">Tenaga Kesehatan</option>
                            <option value="kepolisian">Kepolisian</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        @error('yang_menerangkan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bukti_kematian">Bukti Kematian</label>
                        <input required type="text" class="form-control" name="bukti_kematian" id="bukti_kematian"
                            placeholder="Bukti Meninggal">
                        @error('bukti_kematian')
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
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description">
                    Data Ayah
                </p>
                <div class="form-group">
                    <label for="nik_ayah">NIK Ayah</label>
                    <input onkeyup="isi_otomatis_ayah()" type="text" class="form-control" name="nik_ayah"
                        id="nik_ayah" placeholder="Masukan NIK Ayah">
                    @error('nik_ayah')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah" id="nama_ayah"
                        placeholder="Masukan Nama Lengkap Ayah">
                    @error('nama_ayah')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_ayah">Tgl Lahir Ayah</label>
                    <input type="date" class="form-control" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah"
                        placeholder="31-12-1969">
                    @error('tanggal_lahir_ayah')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaan_ayah" class="form-control" id="pekerjaan_ayah"
                        placeholder="Masukan Pekerjaan Ayah">
                    @error('pekerjaan_ayah')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_ayah">Alamat Ayah</label>
                    <textarea required name="alamat_ayah" class="form-control" id="alamat_ayah" rows="8"></textarea>
                    @error('alamat_ayah')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description">
                    Data Ibu
                </p>
                <div class="form-group">
                    <label for="nik_ibu">NIK Ibu</label>
                    <input onkeyup="isi_otomatis_ibu()" type="text" class="form-control" name="nik_ibu"
                        id="nik_ibu" placeholder="Masukan NIK ibu">
                    @error('nik_ibu')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu"
                        placeholder="Masukan Nama Lengkap ibu">
                    @error('nama_ibu')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_ibu">Tgl Lahir Ibu</label>
                    <input type="date" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu"
                        placeholder="31-12-1969">
                    @error('tanggal_lahir_ibu')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaan_ibu" class="form-control" id="pekerjaan_ibu"
                        placeholder="Masukan Pekerjaan ibu">
                    @error('pekerjaan_ibu')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_ibu">Alamat Ibu</label>
                    <textarea required name="alamat_ibu" class="form-control" id="alamat_ibu" rows="8"></textarea>
                    @error('alamat_ibu')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description">
                    Data Pelapor Kematian
                <div class="form-group">
                    <label for="nik_pelapor">NIK Pelapor</label>
                    <input onkeyup="isi_otomatis_pelapor()" type="text" class="form-control" name="nik_pelapor"
                        id="nik_pelapor" placeholder="Masukan NIK pelapor">
                    @error('nik_pelapor')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_pelapor">Nama Pelapor</label>
                    <input type="text" class="form-control" name="nama_pelapor" id="nama_pelapor"
                        placeholder="Masukan Nama Lengkap pelapor">
                    @error('nama_pelapor')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_pelapor">Tgl Lahir Pelapor</label>
                    <input type="date" class="form-control" name="tanggal_lahir_pelapor" id="tanggal_lahir_pelapor"
                        placeholder="31-12-1969">
                    @error('tanggal_lahir_pelapor')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pekerjaan_pelapor">Pekerjaan Pelapor</label>
                    <input type="text" name="pekerjaan_pelapor" class="form-control" id="pekerjaan_pelapor"
                        placeholder="Masukan Pekerjaan pelapor">
                    @error('pekerjaan_pelapor')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hubungan_pelapor">Hubungan Pelapor</label>
                    <input type="text" name="hubungan_pelapor" class="form-control" id="hubungan_pelapor"
                        placeholder="Masukan Pekerjaan pelapor">
                    @error('hubungan_pelapor')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_pelapor">Alamat Pelapor</label>
                    <textarea required name="alamat_pelapor" class="form-control" id="alamat_pelapor" rows="8"></textarea>
                    @error('alamat_pelapor')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description">
                    Data Saksi 1 Kematian
                </p>
                <div class="form-group">
                    <label for="nik_saksi_1">NIK Saksi 1</label>
                    <input onkeyup="isi_otomatis_saksi_1()" type="text" class="form-control" name="nik_saksi_1"
                        id="nik_saksi_1" placeholder="Masukan NIK saksi 1">
                    @error('nik_saksi_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_saksi_1">Nama Saksi 1</label>
                    <input type="text" class="form-control" name="nama_saksi_1" id="nama_saksi_1"
                        placeholder="Masukan Nama Lengkap saksi 1">
                    @error('nama_saksi_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_saksi_1">Tgl Lahir Saksi 1</label>
                    <input type="date" class="form-control" name="tanggal_lahir_saksi_1" id="tanggal_lahir_saksi_1"
                        placeholder="31-12-1969">
                    @error('tanggal_lahir_saksi_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pekerjaan_saksi_1">Pekerjaan Saksi 1</label>
                    <input type="text" name="pekerjaan_saksi_1" class="form-control" id="pekerjaan_saksi_1"
                        placeholder="Masukan Pekerjaan saksi 1">
                    @error('pekerjaan_saksi_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_saksi_1">Alamat Saksi 1</label>
                    <textarea required name="alamat_saksi_1" class="form-control" id="alamat_saksi_1" rows="8"></textarea>
                    @error('alamat_saksi_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description">
                    Data Saksi 2 Kematian
                </p>
                <div class="form-group">
                    <label for="nik_saksi_2">NIK Saksi 2</label>
                    <input onkeyup="isi_otomatis_saksi_2()" type="text" class="form-control" name="nik_saksi_2"
                        id="nik_saksi_2" placeholder="Masukan NIK saksi 2">
                    @error('nik_saksi_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_saksi_2">Nama Saksi 2</label>
                    <input type="text" class="form-control" name="nama_saksi_2" id="nama_saksi_2"
                        placeholder="Masukan Nama Lengkap saksi 2">
                    @error('nama_saksi_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir_saksi_2">Tgl Lahir Saksi_2</label>
                    <input type="date" class="form-control" name="tanggal_lahir_saksi_2" id="tanggal_lahir_saksi_2"
                        placeholder="31-12-1969">
                    @error('tanggal_lahir_saksi_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pekerjaan_saksi_2">Pekerjaan Saksi_2</label>
                    <input type="text" name="pekerjaan_saksi_2" class="form-control" id="pekerjaan_saksi_2"
                        placeholder="Masukan Pekerjaan saksi 2">
                    @error('pekerjaan_saksi_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_saksi_2">Alamat Saksi 2</label>
                    <textarea required name="alamat_saksi_2" class="form-control" id="alamat_saksi_2" rows="8"></textarea>
                    @error('alamat_saksi_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
            </div>
        </div>
    </div>
    </form>

    <script type="text/javascript">
        function isi_otomatis_meninggal() {
            var nik = $("#nik_meninggal").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nik_meninggal').val(obj.nik);
                $('#nama_lengkap_meninggal').val(obj.nama_lengkap);
                $('#tempat_lahir_meninggal').val(obj.tempat_lahir);
                $('#tanggal_lahir_meninggal').val(obj.tanggal_lahir);
                $('#jenis_kelamin_meninggal').val(obj.jenis_kelamin);
                $('#no_kk_meninggal').val(obj.no_kk);
                $('#alamat_meninggal').val(obj.alamat);
                $('#pekerjaan_meninggal').val(obj.pekerjaan);
                $('#agama_meninggal').val(obj.agama);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            })
        }

        function isi_otomatis_ayah() {
            var nik = $("#nik_ayah").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nik_ayah').val(obj.nik);
                $('#nama_ayah').val(obj.nama_lengkap);
                $('#tanggal_lahir_ayah').val(obj.tanggal_lahir);
                $('#alamat_ayah').val(obj.alamat);
                $('#pekerjaan_ayah').val(obj.pekerjaan);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            })
        }

        function isi_otomatis_ibu() {
            var nik = $("#nik_ibu").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nik_ibu').val(obj.nik);
                $('#nama_ibu').val(obj.nama_lengkap);
                $('#tanggal_lahir_ibu').val(obj.tanggal_lahir);
                $('#alamat_ibu').val(obj.alamat);
                $('#pekerjaan_ibu').val(obj.pekerjaan);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            })
        }

        function isi_otomatis_pelapor() {
            var nik = $("#nik_pelapor").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nik_pelapor').val(obj.nik);
                $('#nama_pelapor').val(obj.nama_lengkap);
                $('#tanggal_lahir_pelapor').val(obj.tanggal_lahir);
                $('#alamat_pelapor').val(obj.alamat);
                $('#pekerjaan_pelapor').val(obj.pekerjaan);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            })
        }

        function isi_otomatis_saksi_1() {
            var nik = $("#nik_saksi_1").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nik_saksi_1').val(obj.nik);
                $('#nama_saksi_1').val(obj.nama_lengkap);
                $('#tanggal_lahir_saksi_1').val(obj.tanggal_lahir);
                $('#alamat_saksi_1').val(obj.alamat);
                $('#pekerjaan_saksi_1').val(obj.pekerjaan);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            })
        }

        function isi_otomatis_saksi_2() {
            var nik = $("#nik_saksi_2").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nik_saksi_2').val(obj.nik);
                $('#nama_saksi_2').val(obj.nama_lengkap);
                $('#tanggal_lahir_saksi_2').val(obj.tanggal_lahir);
                $('#alamat_saksi_2').val(obj.alamat);
                $('#pekerjaan_saksi_2').val(obj.pekerjaan);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            })
        }
    </script>
@endsection
