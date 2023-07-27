@extends('layouts.master')
@section('container')
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Latih</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Latih</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addModal" role="button">+
                    Import
                    Data</a>
            </div>
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
                            @foreach ($data as $key => $keys)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keys->nama_lengkap }}</td>
                                    <td>{{ $keys->usia }}</td>
                                    <td>{{ $keys->motorik_kasar }}</td>
                                    <td>{{ $keys->motorik_kasar }}</td>
                                    <td>{{ $keys->kognitif_anak }}</td>
                                    <td>{{ $keys->kemandirian }}</td>
                                    <td>{{ $keys->kompetensi_dasar_akhlak_perilaku_sosial_emosi }}</td>
                                    <td>{{ $keys->kompetensi_dasar_umum }}</td>
                                    <td>{{ $keys->kesiapan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- AddModal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Import Data Latih</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="{{ route('idata-latih') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="input-group">
                                    <label>Import data from excel&nbsp;&nbsp;&nbsp;</label>
                                    <input name="file_data_latih" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i>
                                Batal</button>
                            <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
