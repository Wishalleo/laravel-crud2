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
    <div class="col-3 mt-2">
        <form method="GET">
            <div id="sample-table-3">
                <label>Display as Category</label>
                <select name="cari">
                    <option value="all">Show All</option>
                    <option value="Laki-Laki"{{ ('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan"{{ ('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
    </div>
    <div class="col-3">
        <!-- Button trigger modal -->        
        <button type="button" class="btn btn-primary btn-sm float-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data Siswa</button>
    </div>
    <table class="table table-hover">
        <tr>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data_siswa as $ds)
        <tr>
            <td>{{ $ds->nama_depan }}</td>
            <td>{{ $ds->nama_belakang }}</td>
            <td>{{ $ds->jenis_kelamin }}</td>
            <td>{{ $ds->email }}</td>
            <td>{{ $ds->no_hp }}</td>
            <td>{{ $ds->agama }}</td>
            <td>{{ $ds->alamat }}</td>
            <td>
                <a href="/siswa/{{ $ds->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <a href="/siswa/{{ $ds->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data_siswa->links() }}
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/siswa/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                    <input name="nama_depan" type="text" class="form-control {{ $errors->has('nama_depan') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                    @if ($errors->has('nama_depan'))
                        <span class="text-danger">{{ $errors->first('nama_depan') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control {{ $errors->has('nama_belakang') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                    @if ($errors->has('nama_belakang'))
                        <span class="text-danger">{{ $errors->first('nama_belakang') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                        <option value="Laki-Laki"{{ (old('jenis_kelamin') == 'Laki-Laki') ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan"{{ (old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Google" value="{{old('email')}}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No HP</label>            
                    <input  name="no_hp" type="number" class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No HandPhone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" value="{{old('no_hp')}}">
                    @if ($errors->has('no_hp'))
                        <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Agama</label>
                    <input name="agama" type="text" class="form-control {{ $errors->has('agama') ? 'is-invalid' : ''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
                    @if ($errors->has('agama'))
                        <span class="text-danger">{{ $errors->first('agama') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                    @if ($errors->has('alamat'))
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    @endif
                </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
    </div>
    </div>
</div> 

@endsection