@extends('layouts.admin')

@section('konten')
    <section id="minimal-statistics">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h4 style="font-weight:bolder" class="text-uppercase">Statistik Surat Keterangan Terpadu Desa Ngasinan</h4>
                <p>Info Statistik Pembuatan Surat dan Data Penduduk Di Desa Ngasinan.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 class="value" akhi="{{$countPengantar}}">0</h3>
                                    <span>Surat Pengantar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-speech warning font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 class="value" akhi="{{$countKelahiran}}">0</h3>
                                    <span>Surat Kelahiran</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 class="value" akhi="{{$countKematian}}">0</h3>
                                    <span>Surat Kematian</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pointer danger font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3 class="value" akhi="{{$countPindah}}">0</h3>
                                    <span>Surat Pindah</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger">278</h3>
                                <span>New Projects</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-rocket danger font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            {{-- <div class="col-xl-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$countPenduduk}}</h3>
                                <span>Data Penduduk</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-user success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

            {{-- <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning">64.89 %</h3>
                                <span>Conversion Rate</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-pie-chart warning font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="primary">423</h3>
                                <span>Support Tickets</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-support primary font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>
    </section>

    <section id="stats-subtitle">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h5 style="font-weight: bold" class="text-uppercase">Statistik Total</h5>
                <p>Statistik Total Surat dan Data Penduduk</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 mr-2"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Total Surat</h4>
                                    <span>Total Surat Yang Sudah Dibuat</span>
                                </div>
                                <div class="align-self-center">
                                    <h1 class="value" akhi="{{$countTotal}}">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <i class="icon-user success font-large-2 mr-2"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Data Penduduk</h4>
                                    <span>Total Penduduk Tercatat</span>
                                </div>
                                <div class="align-self-center">
                                    <h1 class="value" akhi="{{ $countPenduduk }}">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <script>
        const counters = document.querySelectorAll('.value');
        const speed = 200;

        counters.forEach(counter => {
            const animate = () => {
                const value = +counter.getAttribute('akhi');
                const data = +counter.innerText;

                const time = value / speed;
                if (data < value) {
                    counter.innerText = Math.ceil(data + time);
                    setTimeout(animate, 1);
                } else {
                    counter.innerText = value;
                }

            }

            animate();
        });
    </script>
@endsection
