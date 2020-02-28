@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Menampilkan Data Wali
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Wali</label>
                        <input type="text" name="nama" value="{{$wali->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" name="id_dosen" value="{{$wali->mahasiswa->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection