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
                    render: $.fn.dataTable.render.moment('YYYY-MM-DD HH:mm:ss',
                        'DD-MM-YYYY'),
                },
                {
                    data: 'lihatpdf',
                    name: 'lihatpdf'
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



        // //edit
        // $('body').on('click', '.editKematian', function() {
        //     var kematians_id = $(this).data('id');
        //     $.get("{{ route('suratkematian.index') }}" + '/' + kematians_id + '/edit', function(
        //         data) {
        //         $('#modelHeading').html("Edit Surat Kematian");
        //         $('#saveBtnEdit').val("edit-user");
        //         $('#ajaxEdit').modal('show');
        //         $('#id').val(data.id);
        //         $('#nik_meninggal').val(data.nik_meninggal);
        //         $('#no_surat').val(data.no_surat);
        //         $('#tempat_meninggal').val(data.tempat_meninggal);
        //         $('#nama_lengkap_meninggal').val(data.nama_lengkap_meninggal);
        //         $('#jenis_kelamin_meninggal').val(data.jenis_kelamin_meninggal);
        //         $('#tempat_lahir_meninggal').val(data.tempat_lahir_meninggal);
        //         $('#tanggal_lahir_meninggal').val(data.tanggal_lahir_meninggal);
        //         $('#agama_meninggal').val(data.agama_meninggal);
        //         $('#pekerjaan_meninggal').val(data.pekerjaan_meninggal);
        //         $('#alamat_meninggal').val(data.alamat_meninggal);
        //         $('#no_kk_meninggal').val(data.no_kk_meninggal);
        //         $('#status_anak_meninggal').val(data.status_anak_meninggal);
        //         $('#tanggal_meninggal').val(data.tanggal_meninggal);
        //         $('#pukul_meninggal').val(data.pukul_meninggal);
        //         $('#sebab_meninggal').val(data.sebab_meninggal);
        //         $('#yang_menerangkan').val(data.yang_menerangkan);
        //         $('#bukti_kematian').val(data.bukti_kematian);
        //         $('#pejabat_penandatangan').val(data.pejabat_penandatangan);

        //         $('#nik_ibu').val(data.nik_ibu);
        //         $('#nama_ibu').val(data.nama_ibu);
        //         $('#tanggal_lahir_ibu').val(data.tanggal_lahir_ibu);
        //         $('#pekerjaan_ibu').val(data.pekerjaan_ibu);
        //         $('#alamat_ibu').val(data.alamat_ibu);

        //         $('#nik_ayah').val(data.nik_ayah);
        //         $('#nama_ayah').val(data.nama_ayah);
        //         $('#tanggal_lahir_ayah').val(data.tanggal_lahir_ayah);
        //         $('#pekerjaan_ayah').val(data.pekerjaan_ayah);
        //         $('#alamat_ayah').val(data.alamat_ayah);

        //         $('#nik_pelapor').val(data.nik_pelapor);
        //         $('#nama_pelapor').val(data.nama_pelapor);
        //         $('#tanggal_lahir_pelapor').val(data.tanggal_lahir_pelapor);
        //         $('#pekerjaan_pelapor').val(data.pekerjaan_pelapor);
        //         $('#alamat_pelapor').val(data.alamat_pelapor);
        //         $('#hubungan_pelapor').val(data.hubungan_pelapor);

        //         $('#nik_saksi_1').val(data.nik_saksi_1);
        //         $('#nama_saksi_1').val(data.nama_saksi_1);
        //         $('#tanggal_lahir_saksi_1').val(data.tanggal_lahir_saksi_1);
        //         $('#pekerjaan_saksi_1').val(data.pekerjaan_saksi_1);
        //         $('#alamat_saksi_1').val(data.alamat_saksi_1);


        //         $('#nik_saksi_2').val(data.nik_saksi_2);
        //         $('#nama_saksi_2').val(data.nama_saksi_2);
        //         $('#tanggal_lahir_saksi_2').val(data.tanggal_lahir_saksi_2);
        //         $('#pekerjaan_saksi_2').val(data.pekerjaan_saksi_2);
        //         $('#alamat_saksi_2').val(data.alamat_saksi_2);
        //     })
        // });

        // $('#saveBtnEdit').click(function(e) {
        //     e.preventDefault();
        //     $(this).html('Sending..');

        //     $.ajax({
        //         data: $('#editKematianForm').serialize(),
        //         url: "{{ route('suratkematian.store') }}",
        //         type: "POST",
        //         dataType: 'json',
        //         success: function(data) {
        //             $('#editKematianForm').trigger("reset");
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
        // $('body').on('click', '.deleteKematian', function() {
        //     var kematian_id = $(this).data("id");
        //     var result = confirm("Anda Yakin Ingin Menghapus Data !");
        //     if (result) {
        //         $.ajax({
        //             type: "DELETE",
        //             url: "{{ route('suratkematian.store') }}" + '/' + kematian_id,
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
