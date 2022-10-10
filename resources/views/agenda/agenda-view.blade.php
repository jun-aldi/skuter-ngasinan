@extends('layouts.admin')

@section('konten')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table Agenda Desa</h4>
                <p class="card-description">
                    Generate Agenda Desa
                </p>
                <a href="{{ URL::to('agendaform') }}" class="btn btn-primary text-white me-0">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered data-table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Agenda</th>
                                <th>Jam Agenda</th>
                                <th>Isi</th>
                                <th>Tempat</th>
                                <th>Keterangan</th>
                                <th>Tanggal Diubah</th>
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
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-sample" name="editAgendaForm" id="editAgendaForm" method="post">
                        <input required type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="tanggal_agenda">Tanggal Agenda</label>
                            <input required type="datetime-local" class="form-control" name="tanggal_agenda"
                                id="tanggal_agenda">
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Agenda</label>
                            <textarea name="isi" class="form-control" id="isi" rows="8" placeholder="Isi Agenda"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tempat">Tempat</label>
                            <input name="tempat" type="text" class="form-control" id="tempat"
                                placeholder="Masukan Tempat Agenda">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Ket Lainnya</label>
                            <textarea name="keterangan" class="form-control" id="keterangan" rows="8" placeholder="Keterangan Tambahan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 text-white" id="saveBtnEdit"
                            value="create">Submit</button>
                </div>
                </form>
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
                ajax: "{{ route('agenda.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: 'tanggal_agenda',
                        name: 'tanggal_agenda',

                    },
                    {
                        data: 'tanggal_agenda',
                        name: 'tanggal_agenda',
                        // render: $.fn.dataTable.render.moment('YYYY-MM-DDTHH:mm:ss.SSSSSSZ',
                        //     'DD-MM-YYYY'),

                    },
                    {
                        data: 'isi',
                        name: 'isi'
                    },
                    {
                        data: 'tempat',
                        name: 'tempat',

                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',

                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        render: $.fn.dataTable.render.moment('YYYY-MM-DDTHH:mm:ss.SSSSSSZ',
                            'DD-MM-YYYY'),

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
            $('body').on('click', '.editAgenda', function() {
                var agendas_id = $(this).data('id');
                $.get("{{ route('agenda.index') }}" + '/' + agendas_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("Edit Data Agenda");
                    $('#saveBtnEdit').show();
                    $('#saveBtnEdit').val("edit-user");
                    $('#ajaxEdit').modal('show');
                    $('#id').val(data.id);
                    $('#tanggal_agenda').val(data.tanggal_agenda);
                    $('#isi').val(data.isi);
                    $('#tempat').val(data.tempat);
                    $('#keterangan').val(data.keterangan);
                })
            });
            $('#saveBtnEdit').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#editAgendaForm').serialize(),
                    url: "{{ route('agenda.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#editAgendaForm').trigger("reset");
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
            $('body').on('click', '.deleteAgenda', function() {
                var agenda_id = $(this).data("id");
                var result = confirm("Anda Yakin Ingin Menghapus Data !");
                if (result) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('agenda.store') }}" + '/' + agenda_id,
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

            //view
            $('body').on('click', '.viewAgenda', function() {
                var agendas_id = $(this).data('id');
                $.get("{{ route('agenda.index') }}" + '/' + agendas_id + '/edit', function(
                    data) {
                    $('#modelHeading').html("View Data Agenda");
                    $('#ajaxEdit').modal('show');
                    $('#id').val(data.id);
                    $('#tanggal_agenda').val(data.tanggal_agenda);
                    $('#isi').val(data.isi);
                    $('#tempat').val(data.tempat);
                    $('#keterangan').val(data.keterangan);
                    $('#tanggal_agenda').attr('readonly', true);
                    $('#isi').attr('readonly', true);
                    $('#tempat').attr('readonly', true);
                    $('#keterangan').attr('readonly', true);
                    $('#saveBtnEdit').hide();
                })
            });

        });
    </script>
@endsection
