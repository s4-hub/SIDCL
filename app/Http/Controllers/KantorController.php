<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\Kantor;

class KantorController extends Controller
{
    public function index()
    {
    	$data_kantor = Kantor::all();
    	return view('kantor.index',compact('data_kantor'));
    }

    public function create(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'kci' => 'required',
            'kode_kantor' => 'unique:kantor|min:3|max:3|required',
            'nama' => 'unique:kantor|required'
         ]);
        $kantor = new \App\Kantor;
        $kantor->kci = $request->kci;
        $kantor->kode_kantor = strtoupper($request->kode_kantor);
        $kantor->nama = strtoupper($request->nama);
        $kantor->alamat = strtoupper($request->alamat);
        $kantor->save();
        return redirect ('/kantor')->with('sukses','Data berhasil diinput');
    }

    public function edit(Kantor $kantor)
    {
        //dd($kantor);
        return view('kantor/edit', ['kantor' => $kantor]);
    }

    public function update(Request $request,Kantor $kantor)
    {
        //dd($kantor);
        $kantor->update($request->all());
        return redirect('/kantor')->with('sukses','Data berhasil diupdate');
    }

    public function delete(Kantor $kantor)
    {
        $kantor->delete();
        return redirect('/kantor')->with('sukses','Data berhasil dihapus');
    }

    public function import(Request $request) 
    {
        $this->validate($request,[
            'file' => 'mimes:xls,xlsx'
        ]);
        
        Excel::import(new \App\Imports\KantorImport,$request->file('file'));
        // dd($request->all());
        return redirect('/kantor')->with('sukses','Data berhasil diimport');
    }      

}
