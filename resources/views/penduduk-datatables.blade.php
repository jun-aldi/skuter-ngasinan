@extends('layouts.admin')

@section('konten')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Penduduk</h4>
                <p class="card-description">
                    Table Penduduk Desa Ngasinan
                </p>
                <a href="{{ URL::to('pendudukform') }}" class="btn btn-primary text-white me-0">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered data-table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No KK</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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
                    <form class="forms-sample" name="pendudukEdit" id="pendudukEdit" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik"
                                placeholder="Masukan NIK Pemohon">
                        </div>
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input name="no_kk" type="text" class="form-control" id="no_kk"
                                placeholder="Masukan Nomor KK">
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                placeholder="Masukan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
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
                            <label for="status_kawin">Status Kawin</label>
                            <select name="status_kawin" class="form-control" id="status_kawin">
                                <option value="Sudah">Kawin</option>
                                <option value="Belum">Belum Kawin</option>
                                <option value="Pernah">Pernah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input name="pekerjaan" type="text" class="form-control" id="pekerjaan"
                                placeholder="Masukan Pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="dukuh">Dukuh</label>
                            <input name="dukuh" type="text" class="form-control" id="dukuh"
                                placeholder="Masukan Alamat Dukuh">
                        </div>
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input name="rt" type="number" class="form-control" id="rt"
                                placeholder="Masukan Alamat RT">
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input name="rw" type="number" class="form-control" id="rw"
                                placeholder="Masukan Alamat Rw">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Ket Lainnya</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" rows="8" placeholder="Keterangan Tambahan"></textarea>
                        </div>
                        <button type="submit" id="saveBtnEdit" class="btn btn-primary me-2 text-white">Simpan
                            Perubahan</button>
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
                ajax: "{{ route('lihatpenduduk.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk',

                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap',

                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    targets: [4, 5],
                    render: $.fn.dataTable.render.moment('YYYY-MM-DDTHH:mm:ss.SSSSSSZ',
                        'DD-MM-YYYY'),
                }],
            });



            // //edit
            $('body').on('click', '.editPenduduk', function() {
                var pengantars_id = $(this).data('id');
                $.get("{{ route('lihatpenduduk.index') }}" + '/' + pengantars_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Data Penduduk");
                    $('#saveBtnEdit').val("edit-user");
                    $('#ajaxEdit').modal('show');
                    $('#id').val(data.id);
                    $('#nik').val(data.nik);
                    $('#nama_lengkap').val(data.nama_lengkap);
                    $('#tempat_lahir').val(data.tempat_lahir);
                    $('#tanggal_lahir').val(data.tanggal_lahir);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#agama').val(data.agama);
                    $('#pekerjaan').val(data.pekerjaan);
                    $('#status_kawin').val(data.status_kawin);
                    $('#dukuh').val(data.dukuh);
                    $('#no_kk').val(data.no_kk);
                    $('#rt').val(data.rt);
                    $('#rw').val(data.rw);
                    $('#keterangan').val(data.keterangan);
                })
            });
            $('#saveBtnEdit').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#pendudukEdit').serialize(),
                    url: "{{ route('lihatpenduduk.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#pendudukEdit').trigger("reset");
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
            $('body').on('click', '.deletePenduduk', function() {
                var pengantar_id = $(this).data("id");
                var result = confirm("Anda Yakin Ingin Menghapus Data !");
                if (result) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('lihatpenduduk.store') }}" + '/' + pengantar_id,
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
@endsection
