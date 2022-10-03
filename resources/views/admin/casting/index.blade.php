@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Cast Film
                        <a href="{{ route('casting.create') }}" class="btn btn-primary" style="float: right">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @php $no =1; @endphp
                                    @foreach ($castings as $casting)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $casting->nama }}</td>
                                            <td><img src="{{ $casting->image() }}" style="height:50px; width: 45px"
                                                    alt=""></td>
                                            <td>{{ $casting->jenis_kelamin }}</td>
                                            <td>{{ $casting->tanggal_lahir }}</td>
                                            <td class="text-nowrap">
                                                <form action="{{ route('casting.destroy', $casting->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('casting.edit', $casting->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('casting.show', $casting->id) }}"
                                                        class="btn btn-sm btn-outline-info">
                                                        Show
                                                    </a>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('apakah anda yakin?')"> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
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
