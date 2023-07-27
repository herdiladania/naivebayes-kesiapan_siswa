@extends('layouts.master')
@section('container')
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Siswa</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Siswa</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addModal" role="button">+
                    Tambah
                    Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Usia</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Agama</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $keys)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keys->nama_lengkap }}</td>
                                    <td>{{ $keys->jenis_kelamin }}</td>
                                    <td>{{ $keys->usia }}</td>
                                    <td>{{ $keys->tmp_lahir }}, {{ $keys->tgl_lahir }}</td>
                                    <td>{{ $keys->agama }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info" data-toggle="modal"
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

        <!-- AddModal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="{{ route('sdata-siswa') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label><select class="form-control"
                                            name="jenis_kelamin" id="jenis_kelamin" required>
                                            <option>--Pilih Jenis Kelamin--</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="usia">Usia</label>
                                        <input type="number" class="form-control" id="usia" name="usia"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmp_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                            autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="agama">Agama</label><select class="form-control" name="agama"
                                            id="agama" required>
                                            <option>--Pilih Agama--</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" id="pekerjaan_ayah"
                                            name="pekerjaan_ayah" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="pekerjaan_ibu"
                                            name="pekerjaan_ibu" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                    class="fa fa-times"></i>
                                Batal</button>
                            <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (count($data) > 0)
            @foreach ($data as $key => $keys)
                <!-- EditModal -->
                <div class="modal fade" id="editModal{{ $key }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Data Siswa</h5>
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
                                                <label for="jenis_kelamin">Jenis Kelamin</label><select
                                                    class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                                    required>
                                                    <option>{{ $keys->jenis_kelamin }}</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="usia">Usia</label>
                                                <input type="number" class="form-control" id="usia" name="usia"
                                                    autocomplete="off" required value="{{ $keys->usia }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tmp_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tmp_lahir"
                                                    name="tmp_lahir" autocomplete="off" required
                                                    value="{{ $keys->tmp_lahir }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tgl_lahir"
                                                    name="tgl_lahir" autocomplete="off" required
                                                    value="{{ $keys->tgl_lahir }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="agama">Agama</label><select class="form-control"
                                                    name="agama" id="agama" required>
                                                    <option>{{ $keys->agama }}</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_ayah">Nama Ayah</label>
                                                <input type="text" class="form-control" id="nama_ayah"
                                                    name="nama_ayah" autocomplete="off" required
                                                    value="{{ $keys->nama_ayah }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_ibu">Nama Ibu</label>
                                                <input type="text" class="form-control" id="nama_ibu"
                                                    name="nama_ibu" autocomplete="off" required
                                                    value="{{ $keys->nama_ibu }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                <input type="text" class="form-control" id="pekerjaan_ayah"
                                                    name="pekerjaan_ayah" autocomplete="off" required
                                                    value="{{ $keys->pekerjaan_ayah }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                <input type="text" class="form-control" id="pekerjaan_ibu"
                                                    name="pekerjaan_ibu" autocomplete="off" required
                                                    value="{{ $keys->pekerjaan_ibu }}">
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
