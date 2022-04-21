<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa = Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->orwhere('jenis_kelamin','LIKE','%'.$request->cari.'%')->paginate(5)->withQueryString();                                
        }else{
            $data_siswa = Siswa::all();
            $data_siswa = DB::table('siswa')->paginate(5);
        }
        return view('siswa.index',compact(['data_siswa']));
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required|min:5',
            'email' => 'required|email|unique:siswa',
            'no_hp' => 'required|unique:siswa',
            'agama' => 'required',
            'alamat' => 'required'
        ]);

        Siswa::create($request->except('_token'));
        return redirect('/siswa')->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function edit($id, Request $request)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit',compact(['siswa']));
    }
    public function update($id, Request $request)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->except('_token'));
        return redirect('/siswa')->with('sukses', 'Data Berhasil Diubah');
    }
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus');        
    }
}
