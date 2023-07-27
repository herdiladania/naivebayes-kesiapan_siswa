@extends('layouts.master')
@section('container')
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Perhitungan</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <!-- Begin Data Latih -->
        <div class="card shadow mb-4">
            <!-- /.card-header -->

            <a href="#daftarDataLatih" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Latih</h6>
            </a>
            <div class="collapse hide" id="daftarDataLatih">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Usia</th>
                                    <th>Motorik Kasar</th>
                                    <th>Motorik Halus</th>
                                    <th>Kognitif Anak</th>
                                    <th>Kemandirian</th>
                                    <th>Kompetensi Dasar Ahlak</th>
                                    <th>Kompetensi Dasar Umum</th>
                                    <th>Kesiapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_latih as $key => $keys)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $keys->nama_lengkap }}</td>
                                        <td>{{ $keys->usia }}</td>
                                        <td>{{ $keys->motorik_kasar }}</td>
                                        <td>{{ $keys->motorik_kasar }}</td>
                                        <td>{{ $keys->kognitif_anak }}</td>
                                        <td>{{ $keys->kemandirian }}</td>
                                        <td>{{ $keys->kd_ahlak }}</td>
                                        <td>{{ $keys->kd_umum }}</td>
                                        <td>{{ $keys->kesiapan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Latih -->

        <!-- Data Uji -->
        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <a href="#daftarDataUji" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Uji</h6>
            </a>
            <div class="collapse hide" id="daftarDataUji">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Usia</th>
                                    <th>Motorik Kasar</th>
                                    <th>Motorik Halus</th>
                                    <th>Kognitif Anak</th>
                                    <th>Kemandirian</th>
                                    <th>Kompetensi Dasar Ahlak</th>
                                    <th>Kompetensi Dasar Umum</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_uji as $key => $keys)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $keys->nama }}</td>
                                        <td>{{ $keys->usia }}</td>
                                        <td>{{ $keys->motorik_kasar }}</td>
                                        <td>{{ $keys->motorik_kasar }}</td>
                                        <td>{{ $keys->kognitif_anak }}</td>
                                        <td>{{ $keys->kemandirian }}</td>
                                        <td>{{ $keys->kompetensi_dasar_akhlak_perilaku_sosial_emosi }}</td>
                                        <td>{{ $keys->kompetensi_dasar_umum }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Uji -->

        <!-- Data Probabilitas Kelas -->
        <div class="card shadow mb-4">
            <a href="#daftarProbabilitasKelas" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="daftarProbabilitasKelas">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Probabilitas Kelas (P(Ci))</h6>
            </a>
            <div class="collapse hide" id="daftarProbabilitasKelas">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Kelas</th>
                                    <th>Probabilitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classifier['classProbabilities'] as $classLabel => $probability)
                                    <tr>
                                        <td>{{ $classLabel }}</td>
                                        <td>{{ $probability }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Probabilitas Kelas -->

        <!-- Probabilitas Atribut -->
        <div class="card shadow mb-4">
            <a href="#daftarProbabilitasAtribut" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="daftarProbabilitasKelas">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Probabilitas Atribut P(X|Ci)</h6>
            </a>
            <div class="collapse hide" id="daftarProbabilitasAtribut">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Nilai Atribut</th>
                                    <th>Siap</th>
                                    <th>Belum Siap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classifier['likelihoodProbabilities'] as $attribute => $likelihoods)
                                    <tr>
                                        <td>{{ $attribute }}</td>
                                        <td>
                                            @foreach ($likelihoods['Siap'] as $attributeValue => $value)
                                                <span>{{ $attributeValue }} ({{ $value }})</span><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($likelihoods['Belum Siap'] as $attributeValue => $value)
                                                <span>{{ $attributeValue }} ({{ $value }})</span><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Probabilitas Atribut -->


        <!-- Perkalian Probabilitas -->
        <div class="card shadow mb-4">
            <a href="#perkalianProbabilitas" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="perkalianProbabilitas">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Perkalian Probabilitas</h6>
            </a>
            <div class="collapse hide" id="perkalianProbabilitas">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Siap</th>
                                    <th>Belum Siap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($predictions as $key => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['class_probabilities']['Siap']['posterior'] }}</td>
                                        <td>{{ $item['class_probabilities']['Belum Siap']['posterior'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Perkalian Probabilitas  -->
    </div>


    </div>
@endsection
