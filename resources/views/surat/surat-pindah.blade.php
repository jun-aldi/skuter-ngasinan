@extends('layouts.admin')

@section('konten')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table Surat Pindah</h4>
                <p class="card-description">
                    Generate Surat Pindah Desa Ngasinan
                </p>
                <a href="{{ URL::to('suratpindahform') }}" class="btn btn-primary text-white me-0">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered data-table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>No KK Kepala</th>
                                <th>Nama Kepala KK</th>
                                <th>NIK Pemohon</th>
                                <th>Nama Pemohon</th>
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


        {{-- edit --}}
        <div class="modal fade" id="ajaxEdit" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="forms-horizontal" name="editPindahForm" id="editPindahForm" method="post">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="nik_kepala_keluarga">NIK Kepala Keluarga</label>
                                <input onkeyup="isi_otomatis_kk()" type="text" class="form-control"
                                    name="nik_kepala_keluarga" id="nik_kepala_keluarga"
                                    placeholder="Masukan NIK Kepala Keluarga Pemohon">
                            </div>
                            <div class="form-group">
                                <label for="no_kk">No KK</label>
                                <input name="no_kk" type="text" class="form-control" id="no_kk"
                                    placeholder="Masukan Nomor KK">
                            </div>
                            <div class="form-group">
                                <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                                <input type="text" class="form-control" name="nama_kepala_keluarga" id="nama_kepala_keluarga"
                                    placeholder="Masukan Nama Kepala Keluarga">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="8"></textarea>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <label for="nik_pemohon">NIK Pemohon</label>
                                <input onkeyup="isi_otomatis_pemohon()" type="text" class="form-control" name="nik_pemohon"
                                    id="nik_pemohon" placeholder="Masukan NIK Pemohon">
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap Pemohon</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                    placeholder="Masukan Nama Lengkap Pemohon">
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" name="telepon" id="telepon"
                                    placeholder="Masukan Nomor Telepon">
                            </div>
                            <div class="form-group">
                                <label for="no_surat">Nomor Surat</label>
                                <input name="no_surat" type="text" class="form-control" id="no_surat"
                                    placeholder="Masukan Nomor Surat">
                            </div>
                            <div class="form-group">
                                <label for="alasan">Alasan</label>
                                <textarea name="alasan" class="form-control" id="alasan" rows="8" placeholder="Alasan Pindah"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat_tujuan">Alamat Tujuan</label>
                                <textarea name="alamat_tujuan" class="form-control" id="alamat_tujuan" rows="8"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kepindahan">Jenis Kepindahan</label>
                                <select name="jenis_kepindahan" class="form-control" id="jenis_kepindahan">
                                    <option value="pindah">Pindah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_kk_tidak_pindah">Status KK Tidak Pindah</label>
                                <select name="status_kk_tidak_pindah" class="form-control" id="status_kk_tidak_pindah">
                                    <option value="pindah">Pindah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_kk_pindah">Status KK Pindah</label>
                                <select name="status_kk_pindah" class="form-control" id="status_kk_pindah">
                                    <option value="pindah">Pindah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pejabat_penandatangan">Pejabat Penandatangan</label>
                                <select name="pejabat_penandatangan" class="form-control" id="pejabat_penandatangan">
                                    <option value="kepala desa">Kepala Desa</option>
                                    <option value="sekretaris desa">Sekretaris Desa</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary me-2 text-white" id="saveBtnEdit"
                                value="create">Simpan Perubahan</button>
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
                processing: true,
                serverSide: true,
                ajax: "{{ route('suratpindah.index') }}",
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
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'nama_kepala_keluarga',
                        name: 'nama_kepala_keluarga',

                    },
                    {
                        data: 'nik_pemohon',
                        name: 'nik_pemohon',

                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap',

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
            $('body').on('click', '.editPindah', function() {
                var pindahs_id = $(this).data('id');
                $.get("{{ route('suratpindah.index') }}" + '/' + pindahs_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Surat Pindah");
                    $('#saveBtnEdit').val("edit-user");
                    $('#ajaxEdit').modal('show');
                    $('#id').val(data.id);
                    $('#nik_kepala_keluarga').val(data.nik_kepala_keluarga);
                    $('#no_kk').val(data.no_kk);
                    $('#nama_kepala_keluarga').val(data.nama_kepala_keluarga);
                    $('#alamat').val(data.alamat);
                    $('#nik_pemohon').val(data.nik_pemohon);
                    $('#nama_lengkap').val(data.nama_lengkap);
                    $('#telepon').val(data.telepon);
                    $('#no_surat').val(data.no_surat);
                    $('#alasan').val(data.alasan);
                    $('#alamat_tujuan').val(data.alamat_tujuan);
                    $('#jenis_kepindahan').val(data.jenis_kepindahan);
                    $('#status_kk_tidak_pindah').val(data.status_kk_tidak_pindah);
                    $('#status_kk_pindah').val(data.status_kk_pindah);
                    $('#pejabat_penandatangan').val(data.pejabat_penandatangan);
                })
            });

            $('#saveBtnEdit').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#editPindahForm').serialize(),
                    url: "{{ route('suratpindah.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#editPindahForm').trigger("reset");
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
            $('body').on('click', '.deletePindah', function() {
                var pindah_id = $(this).data("id");
                var result = confirm("Anda Yakin Ingin Menghapus Data !");
                if (result) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('suratpindah.store') }}" + '/' + pindah_id,
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
        function isi_otomatis_kk() {
            var nik = $("#nik_kepala_keluarga").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nik_kepala_keluarga').val(obj.nik);
                $('#nama_kepala_keluarga').val(obj.nama_lengkap);
                $('#no_kk').val(obj.no_kk);
                $('#alamat').val(obj.alamat);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            }).error(function(data) {
                document.getElementById("nik-danger").style.visibility = "visible";
            });
        }

        function isi_otomatis_pemohon() {
            var nik = $("#nik_pemohon").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nik_pemohon').val(obj.nik);
                $('#nama_lengkap').val(obj.nama_lengkap);
                document.getElementById("nik-danger").style.visibility = "hidden";
                var result = confirm("Data berhasil ditemukan !");
            }).error(function(data) {
                document.getElementById("nik-danger").style.visibility = "visible";
            });
        }
    </script>
@endsection
