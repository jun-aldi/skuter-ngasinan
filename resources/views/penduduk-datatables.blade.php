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
                targets: [4,5],
                render: $.fn.dataTable.render.moment('YYYY-MM-DDTHH:mm:ss.SSSSSSZ',
                    'DD-MM-YYYY'),
            }],
        });



        // //edit
        // $('body').on('click', '.editPengantar', function() {
        //     var pengantars_id = $(this).data('id');
        //     $.get("{{ route('suratpengantar.index') }}" + '/' + pengantars_id + '/edit', function(
        //         data) {
        //         $('#modelHeading').html("Edit Surat Pengantar");
        //         $('#saveBtnEdit').val("edit-user");
        //         $('#ajaxEdit').modal('show');
        //         $('#id').val(data.id);
        //         $('#nik').val(data.nik);
        //         $('#nama_lengkap').val(data.nama_lengkap);
        //         $('#tempat_lahir').val(data.tempat_lahir);
        //         $('#tanggal_lahir').val(data.tanggal_lahir);
        //         $('#jenis_kelamin').val(data.jenis_kelamin);
        //         $('#kewarganegaraan').val(data.kewarganegaraan);
        //         $('#agama').val(data.agama);
        //         $('#pekerjaan').val(data.pekerjaan);
        //         $('#status_kawin').val(data.status_kawin);
        //         $('#alamat').val(data.alamat);
        //         $('#no_kk').val(data.no_kk);
        //         $('#no_surat').val(data.no_surat);
        //         $('#tujuan').val(data.tujuan);
        //         $('#keperluan').val(data.keperluan);
        //         $('#keterangan').val(data.keterangan);
        //         $('#tanggal_berlaku').val(data.tanggal_berlaku);
        //         $('#pejabat_penandatangan').val(data.pejabat_penandatangan);
        //     })
        // });
        // $('#saveBtnEdit').click(function(e) {
        //     e.preventDefault();
        //     $(this).html('Sending..');

        //     $.ajax({
        //         data: $('#editPengantarForm').serialize(),
        //         url: "{{ route('suratpengantar.store') }}",
        //         type: "POST",
        //         dataType: 'json',
        //         success: function(data) {
        //             $('#editPengantarForm').trigger("reset");
        //             $('#ajaxEdit').modal('hide');
        //             $('#saveBtnEdit').html('Simpan Perubahan');
        //             table.draw();
        //         },
        //         error: function(data) {
        //             console.log('Error:', data);
        //             $('#saveError').html('Error', data);
        //             $('#saveBtnEdit').html('Simpan Perubahan');
        //         }
        //     });
        // });

        // //hapus
        // $('body').on('click', '.deletePengantar', function() {
        //     var pengantar_id = $(this).data("id");
        //     var result = confirm("Anda Yakin Ingin Menghapus Data !");
        //     if (result) {
        //         $.ajax({
        //             type: "DELETE",
        //             url: "{{ route('suratpengantar.store') }}" + '/' + pengantar_id,
        //             success: function(data) {
        //                 table.draw();
        //             },
        //             error: function(data) {
        //                 console.log('Error:', data);
        //             }
        //         });
        //     } else {
        //         return false;
        //     }
        // });

    });
</script>

@endsection
