<div class="modal fade" id="showTahunRilis-{{ $tahun->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Tahun Rilis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun Rilis</label>
                        <input type="text" name="tahun_rilis" class="form-control @error('tahun_rilis') @enderror"id=""
                        value="{{ $tahun->tahun_rilis }}" required>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
    </div>
</div>







































{{-- @extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Show Data
                        <a href="{{ route('tahun_rilis.index') }}" class="btn btn-sm btn-outline-primary" style="float: right">
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Tahun Rilis</label>
                            <input type="text" name="tahun" value="{{ $tahun->tahun }}" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
