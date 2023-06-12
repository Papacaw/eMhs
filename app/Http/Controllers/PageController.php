<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class PageController extends Controller
{
    public function home(){
        return view('home' , ['key' => 'home'] );
    }

    public function profile(){
        return view('profile', ['key' => 'profile']);
    }

    public function mahasiswa(){
        $mhs = Mahasiswa::orderBy('id', 'desc')->paginate(10);
        return view('mahasiswa', ['key' => 'mahasiswa' , 'mhs' => $mhs]);
    }

    public function pencarian(Request $req){
        $cari = $req->q;
        $mhs = Mahasiswa::where('nama', 'like' , '%'.$cari.'%')->paginate(10);
        $mhs->appends($req -> all());
        return view('mahasiswa' , ['key' => 'mahasiswa' , 'mhs'=> $mhs]);
        //return redirect()->back();
    }

    public function tambah(){
        return view('formtambah' , ['key' => 'mahasiswa']);
    }

    public function simpan(Request $req){
        $minat = implode(',' , $req->get('minat'));
        Mahasiswa::create([
            'nim' => $req -> nim,
            'nama' => $req -> nama,
            'gender' => $req -> gender,
            'prodi' => $req -> prodi,
            'minat' => $minat
        ]);
        return redirect('mahasiswa')->with('flash', 'Data Berhasil di Simpan');
    }

    public function edit($id){
        $mhs=Mahasiswa::find($id);
        return view('formedit', ['key'=>'mahasiswa', 'mhs'=>$mhs]);
    }

    public function update($id, Request $request){
        $mhs = Mahasiswa::find($id);
        $minat = implode(',', $mhs->get('minat'));
        $mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->gender = $request->gender;
        $mhs->prodi = $request->prodi;
        $mhs->minat = $minat;
        $mhs->save();

        return redirect('mahasiswa')->with('flash', 'Data Berhenti di Ubah');
    }

    public function delete($id){
        $mhs = Mahasiswa::find($id);
        $mhs -> delete();
        return redirect('mahasiswa')->with('flash', 'Sudah Terhapus!');
    }

    public function contact(){
        return view('contact' , ['key' => 'contact']);
    }
}