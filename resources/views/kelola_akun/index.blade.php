@extends('layouts.master')
@section('container')
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Akun</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Akun</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addModal" role="button">+
                    Tambah
                    Akun</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $keys)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keys->name }}</td>
                                    <td>{{ $keys->email }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#showModal{{ $key }}"><i class="fas fa-eye fa-xs"></i></a>
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

        <!-- AddModal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="{{ route('skelola-akun') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="name">Nama Pengguna</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Kata Sandi</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            autocomplete="off" required>
                                    </div>

                                    <input type="number" class="form-control" id="level" name="level" value="1"
                                        autocomplete="off" hidden>
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
                <!-- EditModal -->
                <div class="modal fade" id="editModal{{ $key }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Data Akun</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <form action="{{ route('ukelola-akun', $keys->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name">Nama Pengguna</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    autocomplete="off" required value="{{ $keys->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                    autocomplete="off" required value="{{ $keys->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Kata Sandi</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" autocomplete="off" required
                                                    value="{{ $keys->password }}">
                                            </div>

                                            <input type="number" class="form-control" id="level" name="level"
                                                value="1" autocomplete="off" hidden>
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

                <!-- showmodal -->
                <div class="modal fade" id="showModal{{ $key }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Data Akun</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Nama Pengguna</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                autocomplete="off" disabled value="{{ $keys->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                autocomplete="off" disabled value="{{ $keys->email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <form action="{{ route('dkelola-akun', $keys->id) }}" method="POST">
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
