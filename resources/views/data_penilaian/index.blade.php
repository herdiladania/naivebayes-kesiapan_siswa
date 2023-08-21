@extends('layouts.master')
@section('container')
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Penilaian</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Siswa</th>
                                <th width="15%">Aksi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_siswa as $key => $keys)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keys->nama_lengkap }}</td>
                                    <td>
                                        @if ($counts[$keys->id] == 0)
                                            <a href="#" class="btn btn-info" data-toggle="modal"
                                                data-target="#setModal{{ $keys->id }}">
                                                <i class="fas fa-plus fa-xs"></i>
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $keys->id }}">
                                                <i class="fas fa-trash-alt fa-xs"></i>
                                            </a>
                                            <a href="#" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#showModal{{ $keys->id }}">
                                                <i class="fas fa-eye fa-xs"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $counts[$keys->id] == 0 ? 'warning' : 'success' }}">
                                            {{ $counts[$keys->id] == 0 ? 'Belum dinilai' : 'Sudah dinilai' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        @if (count($data_siswa) > 0)
            @foreach ($data_siswa as $keys)
                <!-- SetModal -->
                <div class="modal fade" id="setModal{{ $keys->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Penilaian
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <form action="{{ route('sdata-penilaian') }}" method="POST">
                                @csrf
                                @foreach ($data as $atribut)
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="siswa_id"
                                            value="{{ $keys->id }}">
                                        <div class="row align-items-center">
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="atribut_id[]"
                                                    value="{{ $atribut->id }}" hidden>
                                                <input type="text" class="form-control"
                                                    value="{{ $atribut->nama_atribut }}" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" name="nilai_id[]" required>
                                                    <option value="">Pilih</option>
                                                    @foreach ($atribut->nilais as $bobot)
                                                        <option value="{{ $bobot->id }}">
                                                            {{ $bobot->nama_nilai }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Batal</button>
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i>
                                        Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $keys->id }}" tabindex="-1" role="dialog"
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
                                <p>Yakin ingin menghapus data?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <form action="{{ route('ddata-penilaian', $keys->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Show Modal -->
                <div class="modal fade" id="showModal{{ $keys->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fas fa-eye"></i> Detail Penilaian
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h6>Nama Siswa: {{ $keys->nama_lengkap }}</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Atribut</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keys->penilaians as $penilaian)
                                            <tr>
                                                <td>{{ $penilaian->atributs->nama_atribut }}</td>
                                                <td>{{ $penilaian->nilais->nama_nilai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
