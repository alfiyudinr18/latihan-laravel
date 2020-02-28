@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{route('mahasiswa.update',$mhs->id)}}" method="post">
                     <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" name="nama" value="{{$mhs->nama}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Induk Mahasiswa</label>
                            <input type="text" name="nim" value="{{$mhs->nim}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" name="id_dosen" id="exampleFormControlSelect1">
                                @foreach($dosen as $data)
                                    <option value="{{$data->id}}"
                                    @if($data->nama == $mhs->dosen->nama)
                                        selected
                                    @endif
                                    >{{$data->nama}}</option>
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