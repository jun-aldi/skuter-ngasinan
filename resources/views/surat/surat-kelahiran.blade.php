@extends('layouts.admin')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Surat Kelahiran</h4>
            <p class="card-description">
                Generate Surat Kelahiran Desa Ngasinan
            </p>
            <a href="{{ URL::to('suratkelahiranform') }}" class="btn btn-primary text-white me-0">Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered data-table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Dibuat</th>
                            <th>No Surat</th>
                            <th>Nama Anak</th>
                            <th>Tanggal Lahir</th>
                            <th>Print</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ajaxEdit" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form class="form-sample" name="editKelahiranForm" id="editKelahiranForm" method="post">
                    <input required type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="no_surat">Nomor Surat</label>
                        <input required type="text" class="form-control" name="no_surat" id="no_surat"
                            placeholder="Masukan Nomor Surat">
                    </div>
                    <div class="form-group">
                        <label for="no_kk">Nomor Kartu Keluarga</label>
                        <input required type="text" class="form-control" name="no_kk" id="no_kk"
                            placeholder="Masukan Nomor KK">
                    </div>
                    <div class="form-group">
                        <label for="nama_kk">Nama Kepala Keluarga</label>
                        <input required type="text" class="form-control" name="nama_kk" id="nama_kk"
                            placeholder="Masukan Nama Kepala Keluarga">
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap_anak">Nama Lengkap Anak</label>
                        <input required type="text" class="form-control" name="nama_lengkap_anak" id="nama_lengkap_anak"
                            placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin_anak">Jenis Kelamin Anak</label>
                        <select class="form-control" name="jenis_kelamin_anak" id="jenis_kelamin_anak">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_dilahirkan">Tempat Dilahirkan</label>
                        <select class="form-control" name="tempat_dilahirkan" id="tempat_dilahirkan">
                            <option value="rs/rb">RS/RB</option>
                            <option value="puskesmas">Puskesmas</option>
                            <option value="polindes">Polindes</option>
                            <option value="rumah">Rumah</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_kelahiran">Tempat Kelahiran</label>
                        <input required type="text" class="form-control" name="tempat_kelahiran" id="tempat_kelahiran"
                            placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir_anak">Tanggal Lahir Anak</label>
                        <input required type="date" class="form-control" name="tanggal_lahir_anak"
                            id="tanggal_lahir_anak" placeholder="31-12-1969">
                    </div>
                    <div class="form-group">
                        <label for="jam_lahir_anak">Jam Lahir</label>
                        <input required type="time" class="form-control" name="jam_lahir_anak"
                            id="jam_lahir_anak" placeholder="31-12-1969">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelahiran">Jenis Kelahiran</label>
                        <select class="form-control" name="jenis_kelahiran" id="jenis_kelahiran">
                            <option value="tunggal">Tunggal</option>
                            <option value="kembar 2">Kembar 2</option>
                            <option value="kembar 3">Kembar 3</option>
                            <option value="kembar 4">Kembar 4</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelahiran_ke">Kelahiran Ke</label>
                        <input required type="text" name="kelahiran_ke" class="form-control" id="kelahiran_ke"
                            placeholder="Kelahiran Ke..">
                    </div>
                    <div class="form-group">
                        <label for="berat_bayi">Berat Bayi (kg)</label>
                        <input required name="berat_bayi" type="number" class="form-control" id="berat_bayi"
                            placeholder="Berat Bayi ">
                    </div>
                    <div class="form-group">
                        <label for="panjang_bayi">Panjang Bayi (cm)</label>
                        <input required type="number" class="form-control" name="panjang_bayi" id="panjang_bayi"
                            placeholder="Panjang Bayi">
                    </div>
                    <div class="form-group">
                        <label for="pertolongan_kelahiran">Pertolongan Kelahiran</label>
                        <select class="form-control" name="pertolongan_kelahiran" id="pertolongan_kelahiran">
                            <option value="dokter">Dokter</option>
                            <option value="bidan/perawat">Bidan / Perawat</option>
                            <option value="dukun">Dukun</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pejabat_penandatangan">Pejabat Penandatangan</label>
                        <select name="pejabat_penandatangan" class="form-control" id="pejabat_penandatangan">
                            <option value="kepala desa">Kepala Desa</option>
                            <option value="sekretaris desa">Sekretaris Desa</option>
                        </select>
                        <div class="form-group">
                            <label for="nik_ibu">NIK Ibu</label>
                            <input required onkeyup="isi_otomatis_ibu()" type="text" class="form-control"
                                name="nik_ibu" id="nik_ibu" placeholder="Masukan NIK ibu">
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input required type="text" class="form-control" name="nama_ibu" id="nama_ibu"
                                placeholder="Masukan Nama Lengkap ibu">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir_ibu">Tgl Lahir Ibu</label>
                            <input required type="date" class="form-control" name="tanggal_lahir_ibu"
                                id="tanggal_lahir_ibu" placeholder="31-12-1969">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input required type="text" name="pekerjaan_ibu" class="form-control"
                                id="pekerjaan_ibu" placeholder="Masukan Pekerjaan ibu">
                        </div>
                        <div class="form-group">
                            <label for="alamat_ibu">Alamat Ibu</label>
                            <textarea required name="alamat_ibu" class="form-control" id="alamat_ibu" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nik_ayah">NIK Ayah</label>
                            <input required onkeyup="isi_otomatis_ayah()" type="text" class="form-control"
                                name="nik_ayah" id="nik_ayah" placeholder="Masukan NIK ayah">
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input required type="text" class="form-control" name="nama_ayah" id="nama_ayah"
                                placeholder="Masukan Nama Lengkap ayah">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir_ayah">Tgl Lahir Ayah</label>
                            <input required type="date" class="form-control" name="tanggal_lahir_ayah"
                                id="tanggal_lahir_ayah" placeholder="31-12-1969">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input required type="text" name="pekerjaan_ayah" class="form-control"
                                id="pekerjaan_ayah" placeholder="Masukan Pekerjaan ayah">
                        </div>
                        <div class="form-group">
                            <label for="alamat_ayah">Alamat Ayah</label>
                            <textarea required name="alamat_ayah" class="form-control" id="alamat_ayah" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nik_pelapor">NIK Pelapor</label>
                            <input required onkeyup="isi_otomatis_pelapor()" type="text" class="form-control"
                                name="nik_pelapor" id="nik_pelapor" placeholder="Masukan NIK pelapor">
                        </div>
                        <div class="form-group">
                            <label for="nama_pelapor">Nama Pelapor</label>
                            <input required type="text" class="form-control" name="nama_pelapor" id="nama_pelapor"
                                placeholder="Masukan Nama Lengkap pelapor">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir_pelapor">Tgl Lahir Pelapor</label>
                            <input required type="date" class="form-control" name="tanggal_lahir_pelapor"
                                id="tanggal_lahir_pelapor" placeholder="31-12-1969">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_pelapor">Pekerjaan Pelapor</label>
                            <input required type="text" name="pekerjaan_pelapor" class="form-control"
                                id="pekerjaan_pelapor" placeholder="Masukan Pekerjaan pelapor">
                        </div>
                        <div class="form-group">
                            <label for="alamat_pelapor">Alamat Pelapor</label>
                            <textarea required name="alamat_pelapor" class="form-control" id="alamat_pelapor" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nik_saksi_1">NIK Saksi 1</label>
                            <input required onkeyup="isi_otomatis_saksi_1()" type="text" class="form-control"
                                name="nik_saksi_1" id="nik_saksi_1" placeholder="Masukan NIK saksi 1">
                        </div>
                        <div class="form-group">
                            <label for="nama_saksi_1">Nama Saksi 1</label>
                            <input required type="text" class="form-control" name="nama_saksi_1" id="nama_saksi_1"
                                placeholder="Masukan Nama Lengkap saksi 1">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir_saksi_1">Tgl Lahir Saksi 1</label>
                            <input required type="date" class="form-control" name="tanggal_lahir_saksi_1"
                                id="tanggal_lahir_saksi_1" placeholder="31-12-1969">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_saksi_1">Pekerjaan Saksi 1</label>
                            <input required type="text" name="pekerjaan_saksi_1" class="form-control"
                                id="pekerjaan_saksi_1" placeholder="Masukan Pekerjaan saksi 1">
                        </div>
                        <div class="form-group">
                            <label for="alamat_saksi_1">Alamat Saksi 1</label>
                            <textarea required name="alamat_saksi_1" class="form-control" id="alamat_saksi_1" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nik_saksi_2">NIK Saksi 2</label>
                            <input required onkeyup="isi_otomatis_saksi_2()" type="text" class="form-control"
                                name="nik_saksi_2" id="nik_saksi_2" placeholder="Masukan NIK saksi 2">
                        </div>
                        <div class="form-group">
                            <label for="nama_saksi_2">Nama Saksi 2</label>
                            <input required type="text" class="form-control" name="nama_saksi_2" id="nama_saksi_2"
                                placeholder="Masukan Nama Lengkap saksi 2">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir_saksi_2">Tgl Lahir Saksi_2</label>
                            <input required type="date" class="form-control" name="tanggal_lahir_saksi_2"
                                id="tanggal_lahir_saksi_2" placeholder="31-12-1969">
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_saksi_2">Pekerjaan Saksi_2</label>
                            <input required type="text" name="pekerjaan_saksi_2" class="form-control"
                                id="pekerjaan_saksi_2" placeholder="Masukan Pekerjaan saksi 2">
                        </div>
                        <div class="form-group">
                            <label for="alamat_saksi_2">Alamat Saksi 2</label>
                            <textarea required name="alamat_saksi_2" class="form-control" id="alamat_saksi_2" rows="8"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 text-white" id="saveBtnEdit"
                        value="create">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'csv', 'print'
                ],
            processing: true,
            serverSide: true,
            ajax: "{{ route('suratkelahiran.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: $.fn.dataTable.render.moment('YYYY-MM-DDTHH:mm:ss.SSSSSSZ',
                        'DD-MM-YYYY'),

                },
                {
                    data: 'no_surat',
                    name: 'no_surat'
                },
                {
                    data: 'nama_lengkap_anak',
                    name: 'nama_lengkap_anak',

                },
                {
                    data: 'tanggal_lahir_anak',
                    name: 'tanggal_lahir_anak',
                    render: $.fn.dataTable.render.moment('YYYY-MM-DD',
                        'DD-MM-YYYY'),
                },
                {
                    data: 'lihatpdf',
                    name: 'lihatpdf',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [
                [1, 'desc']
            ],
        });



        //edit
        $('body').on('click', '.editKelahiran', function() {
            var kelahirans_id = $(this).data('id');
            $.get("{{ route('suratkelahiran.index') }}" + '/' + kelahirans_id + '/edit', function(
                data) {
                $('#modelHeading').html("Edit Surat Kelahiran");
                $('#saveBtnEdit').val("edit-user");
                $('#ajaxEdit').modal('show');
                $('#id').val(data.id);
                $('#no_kk').val(data.no_kk);
                $('#nama_kk').val(data.nama_kk);
                $('#no_surat').val(data.no_surat);
                $('#nama_lengkap_anak').val(data.nama_lengkap_anak);
                $('#jenis_kelamin_anak').val(data.jenis_kelamin_anak);
                $('#tempat_dilahirkan').val(data.tempat_dilahirkan);
                $('#tempat_kelahiran').val(data.tempat_kelahiran);
                $('#tanggal_lahir_anak').val(data.tanggal_lahir_anak);
                $('#jam_lahir_anak').val(data.jam_lahir_anak);
                $('#jenis_kelahiran').val(data.jenis_kelahiran);
                $('#kelahiran_ke').val(data.kelahiran_ke);
                $('#pertolongan_kelahiran').val(data.pertolongan_kelahiran);
                $('#berat_bayi').val(data.berat_bayi);
                $('#panjang_bayi').val(data.panjang_bayi);
                $('#pejabat_penandatangan').val(data.pejabat_penandatangan);

                $('#nik_ibu').val(data.nik_ibu);
                $('#nama_ibu').val(data.nama_ibu);
                $('#tanggal_lahir_ibu').val(data.tanggal_lahir_ibu);
                $('#pekerjaan_ibu').val(data.pekerjaan_ibu);
                $('#alamat_ibu').val(data.alamat_ibu);

                $('#nik_ayah').val(data.nik_ayah);
                $('#nama_ayah').val(data.nama_ayah);
                $('#tanggal_lahir_ayah').val(data.tanggal_lahir_ayah);
                $('#pekerjaan_ayah').val(data.pekerjaan_ayah);
                $('#alamat_ayah').val(data.alamat_ayah);

                $('#nik_pelapor').val(data.nik_pelapor);
                $('#nama_pelapor').val(data.nama_pelapor);
                $('#tanggal_lahir_pelapor').val(data.tanggal_lahir_pelapor);
                $('#pekerjaan_pelapor').val(data.pekerjaan_pelapor);
                $('#alamat_pelapor').val(data.alamat_pelapor);

                $('#nik_saksi_1').val(data.nik_saksi_1);
                $('#nama_saksi_1').val(data.nama_saksi_1);
                $('#tanggal_lahir_saksi_1').val(data.tanggal_lahir_saksi_1);
                $('#pekerjaan_saksi_1').val(data.pekerjaan_saksi_1);
                $('#alamat_saksi_1').val(data.alamat_saksi_1);


                $('#nik_saksi_2').val(data.nik_saksi_2);
                $('#nama_saksi_2').val(data.nama_saksi_2);
                $('#tanggal_lahir_saksi_2').val(data.tanggal_lahir_saksi_2);
                $('#pekerjaan_saksi_2').val(data.pekerjaan_saksi_2);
                $('#alamat_saksi_2').val(data.alamat_saksi_2);
            })
        });

        $('#saveBtnEdit').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#editKelahiranForm').serialize(),
                url: "{{ route('suratkelahiran.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#editKelahiranForm').trigger("reset");
                    $('#ajaxEdit').modal('hide');
                    $('#saveBtnEdit').html('Simpan Perubahan');
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveError').html('Error', data);
                    $('#saveBtnEdit').html('Simpan Perubahan');
                }
            });
        });

        //hapus
        $('body').on('click', '.deleteKelahiran', function() {
            var kelahiran_id = $(this).data("id");
            var result = confirm("Anda Yakin Ingin Menghapus Data !");
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('suratkelahiran.store') }}" + '/' + keLAHIRAN_id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                return false;
            }
        });

    });
</script>

<script type="text/javascript">


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
