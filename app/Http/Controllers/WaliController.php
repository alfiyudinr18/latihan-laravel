<?php

namespace App\Http\Controllers;

use App\Wali;
use App\Mahasiswa;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $wali = Wali::with('mahasiswa')->get();
        return view('wali.index',compact('wali'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('wali.create',compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $wali = new Wali();
        $wali->nama = $request->nama;
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->save();
        return redirect()->route('wali.index')->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $wali = Wali::findOrFail($id);
        return view('wali.show',compact('wali'));
    }

    public function edit($id)
    {
        $wali = Wali::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        return view('wali.edit',compact('wali','mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $wali = Wali::findOrFail($id);
        $wali->nama = $request->nama;
        $wali->id_mahasiswa = $request->id_mahasiswa;
        $wali->save();
        return redirect()->route('wali.index')->with(['message'=>'Data berhasil diedit']);
    }

    public function destroy($id)
    {
        $wali = Wali::findOrFail($id)->delete();
        return redirect()->route('wali.index')->with(['message'=>'wali berhasil di hapus']);
    }
}
