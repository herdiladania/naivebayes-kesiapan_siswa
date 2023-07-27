@extends('layouts.master')
@section('container')
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Nilai</h1>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        @if ($data->isEmpty())
            <div class="card shadow mb-4">
                <!-- /.card-header -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i> Daftar Data Nilai</h6>
                </div>

                <div class="card-body">
                    <div class="alert alert-info">
                        Data masih kosong.
                    </div>
                </div>
            </div>
        @endif

        @foreach ($data as $atribut)
            <div class="card shadow mb-4">
                <!-- /.card-header -->
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-table"></i>
                        {{ $atribut->nama_atribut }} ({{ $atribut->kode_atribut }})</h6>
                    <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addModal{{ $atribut->id }}"
                        role="button">+
                        Tambah
                        Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered data-table" width="100%" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Nilai Atribut</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atribut->nilais as $key => $nilai)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $nilai->nama_nilai }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info" data-toggle="modal"
                                                data-target="#showModal{{ $nilai->id }}"><i
                                                    class="fas fa-eye fa-xs"></i></a>
                                            <a href="#" class="btn btn-warning" data-toggle="modal"
                                                data-target="#editModal{{ $nilai->id }}"><i
                                                    class="fas fa-edit fa-xs"></i></a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $nilai->id }}"><i
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
            <div class="modal fade" id="addModal{{ $atribut->id }}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="{{ route('sdata-nilai') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <input type="text" class="form-control" id="atribut_id" name="atribut_id"
                                    value="{{ $atribut->id }}" hidden>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama_nilai" name="nama_nilai"
                                        autocomplete="off" required>
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

            <!-- EditModal -->
            @foreach ($atribut->nilais as $nilai)
                <div class="modal fade" id="editModal{{ $nilai->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Data Nilai
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <form action="{{ route('udata-nilai', $nilai->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama_nilai" name="nama_nilai"
                                            autocomplete="off" value="{{ $nilai->nama_nilai }}" required>
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



                <!-- showModal -->
                <div class="modal fade" id="showModal{{ $nilai->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i> Data Nilai
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama_nilai" name="nama_nilai"
                                        autocomplete="off" value="{{ $nilai->nama_nilai }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $nilai->id }}" tabindex="-1" role="dialog"
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
                                <form action="{{ route('ddata-nilai', $nilai->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

    </div>
@endsection
