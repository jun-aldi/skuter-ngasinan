@extends('layouts.admin')

@section('konten')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Agenda Desa</h4>
                <p class="card-description">
                    Formulir Agenda Desa Ngasinan Bulu Sukoharjo
                </p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="forms-sample" name="surat" id="surat" method="post"
                    action="{{ URL::to('agendaform') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="tanggal_agenda">Tanggal Agenda</label>
                        <input type="datetime-local" class="form-control" name="tanggal_agenda" id="tanggal_agenda" placeholder="31-12-1969">
                        @error('tanggal_agenda')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Kegiatan</label>
                        <textarea name="isi" class="form-control" id="isi" rows="8" placeholder="Isi Agenda atau Kegiatan Desa"></textarea>
                        @error('isi')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input name="tempat" type="text" class="form-control" id="tempat" placeholder="Masukan Tempat Kegiatan Agenda">
                        @error('tempat')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="8" placeholder="Keterangan Tambahan"></textarea>
                        @error('keterangan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>



@endsection
