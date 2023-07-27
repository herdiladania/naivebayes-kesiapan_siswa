@extends('layouts.master')
@section('container')
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Atribut</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <!-- /.card-header -->
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Atribut</h6>
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
                                <th>Kode Atribut</th>
                                <th>Nama Atribut</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $keys)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keys->kode_atribut }}</td>
                                    <td>{{ $keys->nama_atribut }}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-success"><i class="fas fa-plus fa-xs"></i></a> --}}
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
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="{{ route('sdata-atribut') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kode">Kode Atribut</label>
                                <input type="text" class="form-control" id="kode_atribut" name="kode_atribut"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Atribut</label>
                                <input type="text" class="form-control" id="nama_atribut" name="nama_atribut"
                                    autocomplete="off" required>
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
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <form action="{{ route('udata-atribut', $keys->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="kode">Kode Atribut</label>
                                        <input type="text" class="form-control" id="kode_atribut" name="kode_atribut"
                                            autocomplete="off" required value="{{ $keys->kode_atribut }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Atribut</label>
                                        <input type="text" class="form-control" id="nama_atribut" name="nama_atribut"
                                            autocomplete="off" required value="{{ $keys->nama_atribut }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                            class="fa fa-times"></i>
                                        Batal</button>
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i>
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
                                <p>Yakin ingin menghapus data?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <form action="{{ route('ddata-atribut', $keys->id) }}" method="POST">
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
