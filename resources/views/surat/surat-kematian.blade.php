@extends('layouts.admin')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Surat Kematian</h4>
            <p class="card-description">
                Generate Surat Kematian Desa Ngasinan
            </p>
            <a href="{{ URL::to('suratkematianform') }}" class="btn btn-primary text-white me-0">Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered data-table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Dibuat</th>
                            <th>No Surat</th>
                            <th>NIK</th>
                            <th>Tanggal Meninggal</th>
                            <th>Penyebab</th>
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
            ajax: "{{ route('suratkematian.index') }}",
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
                    data: 'nik_meninggal',
                    name: 'nik_meninggal',

                },
                {
                    data: 'tanggal_meninggal',
                    name: 'tanggal_meninggal',
                    render: $.fn.dataTable.render.moment('YYYY-MM-DD',
                    'DD-MM-YYYY'),
                },
                {
                    data: 'sebab_meninggal',
                    name: 'sebab_meninggal'
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
        // $('body').on('click', '.editkematian', function() {
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

        //hapus
        $('body').on('click', '.deleteKematian', function() {
            var kematian_id = $(this).data("id");
            var result = confirm("Anda Yakin Ingin Menghapus Data !");
            if (result) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('suratkematian.store') }}" + '/' + kematian_id,
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
