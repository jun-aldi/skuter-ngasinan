@extends('layouts.app')

@section('konten')
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mx-auto my-4">
                    @if (!empty($filter)&&!empty($filter2))
                    <h2 style="color: #173D7A" class="fw-bolder">AGENDA TANGGAL : {{$hari}} {{$header}}  - {{$hari2}} {{$header2}} </h2>
                    @else
                    <h2 style="color: #173D7A" class="fw-bolder">AGENDA TANGGAL : {{$hari}} {{$header}}  </h2>
                    @endif

                </div>
                <div class="col-12 my-1">
                    <div class=" py-3 px-3">
                        <form class="form-horizontal border py-3 px-3" method="GET">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="filter" class="form-label">Dari Tanggal / Pilih Hari : </label>
                                    <input type="date" class="form-control" id="filter" name="filter"
                                        placeholder="Tanggal" value="{{ $filter }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="filter" class="form-label">Sampai Tanggal : </label>
                                    <input type="date" class="form-control" id="filter2" name="filter2"
                                        placeholder="Tanggal" value="{{ $filter2 }}">
                                </div>
                                <div class="form-group col-12 mt-4">
                                    <button type="submit" class="btn btn-success mb-2">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <div id="tableAgenda" class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead">
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 fw-bold">
                                        <h5 class="fw-bold">Hari / Tanggal</h5>
                                    </th>

                                    <th class="px-4 py-2">
                                        <h5 class="fw-bold">Jam Agenda</h5>
                                    </th>
                                    <th class="px-4 py-2">
                                        <h5 class="fw-bold">Isi</h5>
                                    </th>
                                    <th class="px-4 py-2">
                                        <h5 class="fw-bold">Tempat</h5>
                                    </th>
                                    <th class="px-4 py-2">
                                        <h5 class="fw-bold">Keterangan</h5>
                                    </th>



                                </tr>
                            </thead>
                            <tbody>
                                @if ($agendas->count())
                                    @foreach ($agendas as $agenda)
                                        <tr>
                                            @php
                                                $hari_hari = $agenda->tanggal_agenda;
                                                $day = date('D', strtotime($hari_hari));
                                                $dayList = [
                                                    'Sun' => 'Minggu',
                                                    'Mon' => 'Senin',
                                                    'Tue' => 'Selasa',
                                                    'Wed' => 'Rabu',
                                                    'Thu' => 'Kamis',
                                                    'Fri' => 'Jumat',
                                                    'Sat' => 'Sabtu',
                                                ];
                                                $hari = $dayList[$day];

                                            @endphp
                                            <td class="border py-2" width="200">{{ $hari }} /
                                                {{ date('d-M-Y', strtotime($agenda->tanggal_agenda)) }}</td>
                                            {{-- <td class="border px-4 py-2">{{ $agenda->id }}</td> --}}
                                            {{-- <td class="border px-4 py-2">{{ $agenda->disposisi_id }}</td> --}}
                                            {{-- <td class="border px-4 py-2">{{ $agenda->id }}</td> --}}
                                            <td class="border px-4 py-2" width="200">
                                                {{ date('H:i', strtotime($agenda->tanggal_agenda)) }}</td>
                                            <td class="border px-4 py-2" width="700">{{ $agenda->isi }}</td>
                                            <td class="border px-4 py-2" width="300">{{ $agenda->tempat }}</td>
                                            <td class="border px-4 py-2" width="400">{{ $agenda->keterangan }}</td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
