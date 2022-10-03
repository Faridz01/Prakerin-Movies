@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Show Data
                        <a href="{{ route('movie.index') }}" class="btn btn-sm btn-outline-primary" style="float: right">
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Judul Movie</label>
                            <input type="text" name="tahun" value="{{ $movie->judul_film }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Durasi Film</label>
                            <input type="text" name="tahun" value="{{ $movie->durasi }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Genre</label>
                            <input type="text" name="tahun" value="{{ $movie->genre_film->kategori }}"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Rilis</label>
                            <input type="text" name="tahun" value="{{ $movie->tahun_rilis->tahun_rilis }}"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Sinopsis</label>
                            <input type="text" name="tahun" value="{{ $movie->sinopsis}}"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Cast Film</label>
                            <ol>
                                @foreach ($movie->casting as $item)
                                    <li> {{ $item->nama }}</li>
                                @endforeach
                            </ol>
                        </div>
                        <div class="form-group">
                            <label for="">Cover</label>
                            <p>
                                <img src="{{ asset('images/movies/' . $movie->cover) }}" class="img-rounded img-responsive"
                                    style="width: 175px; height:175px;" alt="">
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="">Background</label>
                            <p>
                                <img src="{{ asset('images/movies/' . $movie->background) }}"
                                    class="img-rounded img-responsive" style="width: 175px; height:175px;" alt="">
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
