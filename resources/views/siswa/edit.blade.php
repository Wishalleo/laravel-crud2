@extends('layouts.master')
@section('content')

@if(session('sukses'))
<div class="alert alert-success" role="alert">
{{session('sukses')}}
</div>            
@endif
<div class="row">
    <div class="col-6">
        <h1>Data Siswa</h1>
    </div>
        <form action="/siswa/{{ $siswa->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{ $siswa->nama_belakang }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                <option value="Laki-Laki" @if($siswa->jenis_kelamin == 'Laki-laki') selected @endif>Laki-Laki</option>
                <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Google" value="{{ $siswa->email }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No HP</label>            
            <input  name="no_hp" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No HandPhone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" value="{{ $siswa->no_hp }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Agama</label>
            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{ $siswa->agama }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $siswa->alamat }}</textarea>
        </div>
    </div>
<div class="modal-footer">
    <a href="/siswa/" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-warning">Edit</button>
        </form>
</div>

@endsection