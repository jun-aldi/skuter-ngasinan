@extends('layouts.admin')

@section('konten')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table Surat Pengantar</h4>
                <p class="card-description">
                    Generate Surat Pengantar Desa Ngasinan
                </p>
                <a href="{{ URL::to('suratpengantarform') }}" class="btn btn-primary text-white me-0">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered data-table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Dibuat</th>
                                <th>No Surat</th>
                                <th>NIK</th>
                                <th>Keterangan</th>
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
                    <form class="form-horizontal" name="editPengantarForm" id="editPengantarForm" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nik">NIK Pemohon</label>
                            <input required onkeyup="isi_otomatis()" type="text" class="form-control" name="nik"
                                id="nik" placeholder="Masukan NIK Pemohon">
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input required type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                placeholder="Masukan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input required type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                placeholder="31-12-1969">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Kewarganegaraan">Kewarganegaraan</label>
                            <select class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                                <option value="indonesia">Indonesia</option>
                            </select>
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
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input required type="text" name="pekerjaan" class="form-control" id="pekerjaan"
                                placeholder="Masukan Pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="status_kawin">Status Kawin</label>
                            <select name="status_kawin" class="form-control" id="status_kawin">
                                <option value="Sudah">Kawin</option>
                                <option value="Belum">Belum Kawin</option>
                                <option value="Pernah">Pernah Kawin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea required name="alamat" class="form-control" id="alamat" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input required name="no_kk" type="text" class="form-control" id="no_kk"
                                placeholder="Masukan Nomor KK">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_berlaku">Tanggal Berlaku</label>
                            <input required type="date" class="form-control" name="tanggal_berlaku" id="tanggal_berlaku">
                        </div>
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input required name="no_surat" type="text" class="form-control" id="no_surat"
                                placeholder="Masukan Nomor Surat">
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <textarea required name="tujuan" class="form-control" id="tujuan" rows="8" placeholder="Tujuan Surat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <textarea required name="keperluan" class="form-control" id="keperluan" rows="8" placeholder="Keperluan Surat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Ket Lainnya</label>
                            <textarea required name="keterangan" class="form-control" id="keterangan" rows="8" placeholder="Keterangan Tambahan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pejabat_penandatangan">Pejabat Penandatangan</label>
                            <select name="pejabat_penandatangan" class="form-control" id="pejabat_penandatangan">
                                <option value="kepala desa">Kepala Desa</option>
                                <option value="sekretaris desa">Sekretaris Desa</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 text-white" id="saveBtnEdit"
                            value="create">Submit</button>
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
                ajax: "{{ route('suratpengantar.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',

                    },
                    {
                        data: 'no_surat',
                        name: 'no_surat'
                    },
                    {
                        data: 'nik',
                        name: 'nik',

                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
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
                columnDefs: [{
                    targets: [1],
                    render: $.fn.dataTable.render.moment('YYYY-MM-DDTHH:mm:ss.SSSSSSZ',
                        'DD-MM-YYYY'),
                }],
                order: [
                    [1, 'desc']
                ],
            });



            //edit
            $('body').on('click', '.editPengantar', function() {
                var pengantars_id = $(this).data('id');
                $.get("{{ route('suratpengantar.index') }}" + '/' + pengantars_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Surat Pengantar");
                    $('#saveBtnEdit').val("edit-user");
                    $('#ajaxEdit').modal('show');
                    $('#id').val(data.id);
                    $('#nik').val(data.nik);
                    $('#nama_lengkap').val(data.nama_lengkap);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tanggal_lahir').val(data.tanggal_lahir);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#kewarganegaraan').val(data.kewarganegaraan);
                    $('#agama').val(data.agama);
                    $('#pekerjaan').val(data.pekerjaan);
                    $('#status_kawin').val(data.status_kawin);
                    $('#alamat').val(data.alamat);
                    $('#no_kk').val(data.no_kk);
                    $('#no_surat').val(data.no_surat);
                    $('#tujuan').val(data.tujuan);
                    $('#keperluan').val(data.keperluan);
                    $('#keterangan').val(data.keterangan);
                    $('#tanggal_berlaku').val(data.tanggal_berlaku);
                    $('#pejabat_penandatangan').val(data.pejabat_penandatangan);
                })
            });
            $('#saveBtnEdit').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#editPengantarForm').serialize(),
                    url: "{{ route('suratpengantar.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#editPengantarForm').trigger("reset");
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
            $('body').on('click', '.deletePengantar', function() {
                var pengantar_id = $(this).data("id");
                var result = confirm("Anda Yakin Ingin Menghapus Data !");
                if (result) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('suratpengantar.store') }}" + '/' + pengantar_id,
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
        function isi_otomatis() {
            var nik = $("#nik").val();
            $.ajax({
                url: '/autofill/' + nik,
                data: "nik=" + nik,
            }).success(function(data) {
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
            }).error(function(data) {
                document.getElementById("nik-danger").style.visibility = "visible";
            });
        }
    </script>
@endsection
