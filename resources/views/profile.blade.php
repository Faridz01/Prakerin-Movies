@extends('layouts.master')

@section('content')
<div class="container">
        <h4>Ini Halaman Profile</h4>
        <div class="card rounded rounded-3 shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/dist/img/_MG_0216.jpg') }}" alt=""
                            class="card-img-end img-responsive rounded rounded-3 mx-auto d-block" style="width: 70%">
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="25%" valign="top" class="textt">Nama</td>
                                        <td width="2%">:</td>
                                        <td><b>Muhammad Fariz</b></td>
                                    </tr>
                                    <tr>
                                        <td class="textt">Tempat/Tgl Lahir</td>
                                        <td>:</td>
                                        <td>Bandung, 04-04-2004</td>
                                    </tr>
                                    <tr>
                                        <td class="textt">Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>Laki-Laki</td>
                                    </tr>
                                    <tr>
                                        <td class="textt">Alamat</td>
                                        <td>:</td>
                                        <td>Jl Ciparay Tengah</td>
                                    </tr>
                                    <tr>
                                        <td class="textt">RT/RW</td>
                                        <td>:</td>
                                        <td>001/006</td>
                                    </tr>
                                    <tr>
                                        <td class="textt">No.Hp</td>
                                        <td>:</td>
                                        <td>088809584285</td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="textt">Sekolah</td>
                                        <td valign="top">:</td>
                                        <td>SMK Assalaam Bandung</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
