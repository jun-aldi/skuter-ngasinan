@extends('layouts.admin')

@section('konten')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Surat Pengantar</h4>
            <p class="card-description">
                Generate Surat Pengantar Desa Ngasinan
            </p>
            <a href="{{ URL::to('suratkelahiranform') }}" class="btn btn-primary text-white me-0">Tambah Data</a>
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
@endsection
