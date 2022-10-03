@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Tahun Rilis
                        <button type="button" class="btn btn-sm btn-outline-primary" style="float:right" data-toggle="modal"
                            data-target="#addTahunRilis">
                            Tambah Data
                        </button>
                        @include('admin.tahun_rilis.create')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Tahun Rilis</th>
                                    <th>Jumlah Film</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php $no =1; @endphp
                                    @foreach ($tahun_rilis as $tahun)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $tahun->tahun_rilis }}</td>
                                            <td>{{ $tahun->movie->count() }}</td>
                                            <td>
                                                <form action="{{ route('tahun_rilis.destroy', $tahun->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-sm btn-outline-warning"
                                                        data-toggle="modal"
                                                        data-target="#editTahunRilis-{{ $tahun->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-toggle="modal"
                                                        data-target="#showTahunRilis-{{ $tahun->id }}">
                                                        Show
                                                    </button>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('apakah anda yakin?')"> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('admin.tahun_rilis.edit')
                                        @include('admin.tahun_rilis.show')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
