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
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#importModal" role="button">+
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
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $keys)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keys->nama_lengkap }}</td>
                                    <td>{{ $keys->usia }}</td>
                                    <td>{{ $keys->motorik_kasar }}</td>
                                    <td>{{ $keys->motorik_halus }}</td>
                                    <td>{{ $keys->kognitif_anak }}</td>
                                    <td>{{ $keys->kemandirian }}</td>
                                    <td>{{ $keys->kompetensi_dasar_akhlak_perilaku_sosial_emosi }}</td>
                                    <td>{{ $keys->kompetensi_dasar_umum }}</td>
                                    <td>{{ $keys->kesiapan }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#showModal{{ $key }}"><i
                                                class="fas fa-eye fa-xs"></i></a>
                                        <a href="#" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editModal{{ $key }}"><i
                                                class="fas fa-edit fa-xs"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $key }}"><i
                                                class="fas fa-trash-alt fa-xs"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ImportModal -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

        @if (count($data) > 0)
            @foreach ($data as $key => $keys)
                <!-- showmodal -->
                <div class="modal fade" id="showModal{{ $key }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i> Data Latih</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                                autocomplete="off" disabled value="{{ $keys->nama_lengkap }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="usia">Usia</label>
                                            <input type="text" class="form-control" id="usia" name="usia"
                                                autocomplete="off" disabled value="{{ $keys->usia }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="motorik_kasar">Motorik Kasar</label>
                                            <input type="text" class="form-control" id="motorik_kasar"
                                                name="motorik_kasar" autocomplete="off" disabled
                                                value="{{ $keys->motorik_kasar }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="mototik_halus">Motorik Halus</label>
                                            <input type="text" class="form-control" id="mototik_halus"
                                                name="mototik_halus" autocomplete="off" disabled
                                                value="{{ $keys->motorik_halus }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="kemandirian">Kemandirian</label>
                                            <input type="text" class="form-control" id="kemandirian"
                                                name="kemandirian" autocomplete="off" disabled
                                                value="{{ $keys->kemandirian }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="kognitif_anak">Kognitif Anak</label>
                                            <input type="text" class="form-control" id="kognitif_anak"
                                                name="kognitif_anak" autocomplete="off" disabled
                                                value="{{ $keys->kognitif_anak }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="kompetensi_dasar_akhlak_perilaku_sosial_emosi">Kempotensi Dasar
                                                Akhlak</label>
                                            <input type="text" class="form-control"
                                                id="kompetensi_dasar_akhlak_perilaku_sosial_emosi"
                                                name="kompetensi_dasar_akhlak_perilaku_sosial_emosi" autocomplete="off"
                                                disabled
                                                value="{{ $keys->kompetensi_dasar_akhlak_perilaku_sosial_emosi }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="kompetensi_dasar_umum">Kompetensi Dasar Umum</label>
                                            <input type="text" class="form-control" id="kompetensi_dasar_umum"
                                                name="kompetensi_dasar_umum" autocomplete="off" disabled
                                                value="{{ $keys->kompetensi_dasar_umum }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="kesiapan">Kesiapan</label>
                                            <input type="text" class="form-control" id="kesiapan" name="kesiapan"
                                                autocomplete="off" disabled value="{{ $keys->kesiapan }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- EditModal -->
                <div class="modal fade" id="editModal{{ $key }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Data Latih</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <form action="{{ route('udata-siswa', $keys->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap"
                                                    name="nama_lengkap" autocomplete="off" required
                                                    value="{{ $keys->nama_lengkap }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="usia">Usia</label>
                                                <input type="number" class="form-control" id="usia" name="usia"
                                                    autocomplete="off" required value="{{ $keys->usia }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="motorik_kasar">Motorik Kasar</label><select
                                                    class="form-control" name="motorik_kasar" id="motorik_kasar"
                                                    required>
                                                    <option>{{ $keys->motorik_kasar }}</option>
                                                    <option value="Belum Dievaluasi (BD)">Belum Dievaluasi (BD)</option>
                                                    <option value="Belum Muncul (BM)">Belum Muncul (BM)</option>
                                                    <option value="Mulai Muncul (MM)">Mulai Muncul (MM)</option>
                                                    <option value="Berkembang Sesuai Harapan (BSH)">Berkembang Sesuai
                                                        Harapan (BSH)</option>
                                                    <option value="Berkembang Sangat Baik (BSB)">Berkembang Sangat Baik
                                                        (BSB)
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="motorik_halus">Motorik Halus</label><select
                                                    class="form-control" name="motorik_halus" id="motorik_halus"
                                                    required>
                                                    <option>{{ $keys->motorik_halus }}</option>
                                                    <option value="Belum Dievaluasi (BD)">Belum Dievaluasi (BD)</option>
                                                    <option value="Belum Muncul (BM)">Belum Muncul (BM)</option>
                                                    <option value="Mulai Muncul (MM)">Mulai Muncul (MM)</option>
                                                    <option value="Berkembang Sesuai Harapan (BSH)">Berkembang Sesuai
                                                        Harapan (BSH)</option>
                                                    <option value="Berkembang Sangat Baik (BSB)">Berkembang Sangat Baik
                                                        (BSB)
                                                    </option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="kognitif_anak">Kognitif Anak</label><select
                                                    class="form-control" name="kognitif_anak" id="kognitif_anak"
                                                    required>
                                                    <option>{{ $keys->kognitif_anak }}</option>
                                                    <option value="Belum Dievaluasi (BD)">Belum Dievaluasi (BD)</option>
                                                    <option value="Belum Muncul (BM)">Belum Muncul (BM)</option>
                                                    <option value="Mulai Muncul (MM)">Mulai Muncul (MM)</option>
                                                    <option value="Berkembang Sesuai Harapan (BSH)">Berkembang Sesuai
                                                        Harapan (BSH)</option>
                                                    <option value="Berkembang Sangat Baik (BSB)">Berkembang Sangat Baik
                                                        (BSB)
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="kemandirian">Kemandirian</label><select class="form-control"
                                                    name="kemandirian" id="kemandirian" required>
                                                    <option>{{ $keys->kemandirian }}</option>
                                                    <option value="Belum Dievaluasi (BD)">Belum Dievaluasi (BD)</option>
                                                    <option value="Belum Muncul (BM)">Belum Muncul (BM)</option>
                                                    <option value="Mulai Muncul (MM)">Mulai Muncul (MM)</option>
                                                    <option value="Berkembang Sesuai Harapan (BSH)">Berkembang Sesuai
                                                        Harapan (BSH)</option>
                                                    <option value="Berkembang Sangat Baik (BSB)">Berkembang Sangat Baik
                                                        (BSB)
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="kompetensi_dasar_akhlak_perilaku_sosial_emosi">Kompetensi Dasar
                                                    Akhlak</label><select class="form-control"
                                                    name="kompetensi_dasar_akhlak_perilaku_sosial_emosi"
                                                    id="kompetensi_dasar_akhlak_perilaku_sosial_emosi" required>
                                                    <option>{{ $keys->kompetensi_dasar_akhlak_perilaku_sosial_emosi }}
                                                    </option>
                                                    <option value="Belum Dievaluasi (BD)">Belum Dievaluasi (BD)</option>
                                                    <option value="Belum Muncul (BM)">Belum Muncul (BM)</option>
                                                    <option value="Mulai Muncul (MM)">Mulai Muncul (MM)</option>
                                                    <option value="Berkembang Sesuai Harapan (BSH)">Berkembang Sesuai
                                                        Harapan (BSH)</option>
                                                    <option value="Berkembang Sangat Baik (BSB)">Berkembang Sangat Baik
                                                        (BSB)
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="kompetensi_dasar_umum">Kompetensi Dasar
                                                    Umum</label><select class="form-control" name="kompetensi_dasar_umum"
                                                    id="kompetensi_dasar_umum" required>
                                                    <option>{{ $keys->kompetensi_dasar_umum }}
                                                    </option>
                                                    <option value="Belum Dievaluasi (BD)">Belum Dievaluasi (BD)</option>
                                                    <option value="Belum Muncul (BM)">Belum Muncul (BM)</option>
                                                    <option value="Mulai Muncul (MM)">Mulai Muncul (MM)</option>
                                                    <option value="Berkembang Sesuai Harapan (BSH)">Berkembang Sesuai
                                                        Harapan (BSH)</option>
                                                    <option value="Berkembang Sangat Baik (BSB)">Berkembang Sangat Baik
                                                        (BSB)
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="kesiapan">Kesiapan</label><select class="form-control"
                                                    name="kesiapan" id="kesiapan" required>
                                                    <option>{{ $keys->kesiapan }}</option>
                                                    <option value="Siap">Siap</option>
                                                    <option value="Belum Siap">Belum Siap</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                            class="fa fa-times"></i>
                                        Batal</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                        Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $key }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fas fa-trash-alt"></i> Konfirmasi
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Yakin ingin menghapus data {{ $keys->nama }}?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <form action="{{ route('ddata-siswa', $keys->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
