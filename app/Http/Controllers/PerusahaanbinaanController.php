<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaanbinaan;
use App\Kantor;

class PerusahaanbinaanController extends Controller
{
    public function index()
    {
    	$data_perusahaanbinaan = Perusahaanbinaan::all();
    	$data_kantor = Kantor::orderBy('kode_kantor','ASC')->get();
    	return view('perusahaanbinaan.index',compact('data_perusahaanbinaan','data_kantor'));
    }

	public function add()
    {
    	$data_kantor = Kantor::orderBy('kode_kantor','ASC')->get();
    	return view('perusahaanbinaan.add',compact('data_kantor'));
    }

    public function create(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'nama' => 'required',
            'npp' => 'unique:perusahaanbinaan|min:8|max:8|required',
            'div' => 'max:3|required|numeric',
            'alamat' => 'required',
            'jum_tk_aktif' => 'required|numeric',
            'foto' => 'mimes:jpg,jpeg,png',
            'kantor_id' => 'required'
         ]);
        $perusahaanbinaan = new \App\Perusahaanbinaan;
        $perusahaanbinaan->nama = strtoupper($request->nama);
        $perusahaanbinaan->npp = strtoupper($request->npp);
        $perusahaanbinaan->div = $request->div;
        $perusahaanbinaan->alamat = strtoupper($request->alamat);
        $perusahaanbinaan->jum_tk_aktif = $request->jum_tk_aktif;
        $perusahaanbinaan->status_keps = "peserta";
        $perusahaanbinaan->pembina_id = "9";
        if($request->latx = " ")if($request->laty = " ") {
            $perusahaanbinaan->status_tagging = "N";
        }
        $perusahaanbinaan->kantor_id = $request->kantor_id;
        if($request->hasFile('foto')){
            $request->file('foto')->move('admin/img_perusahaan/',$request->file('foto')->getClientOriginalName());
            $perusahaanbinaan->foto = $request->file('foto')->getClientOriginalName();
        }
        $perusahaanbinaan->save();
        return redirect ('/perusahaanbinaan')->with('sukses','Data berhasil diinput');
    }


    public function edit(Perusahaanbinaan $perusahaanbinaan)
    {
        //dd($kantor);
        $kantor = Kantor::orderBy('kode_kantor','ASC')->get();
        return view('perusahaanbinaan/edit', ['perusahaanbinaan' => $perusahaanbinaan,'kantor' => $kantor]);
    }

    public function update(Request $request,Perusahaanbinaan $perusahaanbinaan)
    {
        $this->validate($request,[
            'foto' => 'mimes:jpg,jpeg,png',
        ]);
        // return $request->all();
        $perusahaanbinaan->update($request->all());     
        if($request->latx >= 0)if($request->laty >= 0) {
            $perusahaanbinaan->status_tagging = "Y";
            $perusahaanbinaan->save();
        }

        if($request->hasFile('foto')){
            $request->file('foto')->move('app/img_perusahaan/',$request->file('foto')->getClientOriginalName());
            $perusahaanbinaan->foto = $request->file('foto')->getClientOriginalName();
            $perusahaanbinaan->save();
        }

        return redirect('/perusahaanbinaan')->with('sukses','Data berhasil diupdate');
    }

    public function delete(Perusahaanbinaan $perusahaanbinaan)
    {
        $perusahaanbinaan->delete();
        return redirect('/perusahaanbinaan')->with('sukses','Data berhasil dihapus');
    }
       
}
