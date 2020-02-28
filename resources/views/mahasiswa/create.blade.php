@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{route('mahasiswa.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Induk Mahasiswa</label>
                            <input type="text" name="nim" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" name="id_dosen" id="exampleFormControlSelect1">
                                @foreach($dosen as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection