<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Potensi;
use App\Kantor;

class PotensiController extends Controller
{
    public function index()
    {
    	$data_potensi = Potensi::all();
    	$data_kantor = Kantor::orderBy('kode_kantor','ASC')->get();
    	return view('potensi.index',compact('data_potensi','data_kantor'));
    }

	public function add()
    {
    	$data_kantor = Kantor::orderBy('kode_kantor','ASC')->get();
    	return view('potensi.add',compact('data_kantor'));
    }
    public function create(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'nama' => 'required|unique:potensi',
            'alamat' => 'required',
            'jum_tk_potensi' => 'required|numeric',
            'foto' => 'mimes:jpg,jpeg,png',
            'kantor_id' => 'required'
         ]);
        $potensi = new \App\Potensi;
        $potensi->nama = strtoupper($request->nama);
        $potensi->alamat = strtoupper($request->alamat);
        $potensi->jum_tk_potensi = $request->jum_tk_potensi;
        $potensi->status_potensi = "potensi";
        $potensi->pembina_id = "9";
        if($request->latx = " ")if($request->laty = " ") {
            $potensi->status_tagging = "N";
        }
        $potensi->kantor_id = $request->kantor_id;
        if($request->hasFile('foto')){
            $request->file('foto')->move('admin/img_potensi/',$request->file('foto')->getClientOriginalName());
            $potensi->foto = $request->file('foto')->getClientOriginalName();
        }
        $potensi->save();
        return redirect ('/potensi')->with('sukses','Data berhasil diinput');
    } 

    public function edit(Potensi $potensi)
    {
        //dd($kantor);
        $kantor = Kantor::orderBy('kode_kantor','ASC')->get();
        return view('potensi/edit', ['potensi' => $potensi,'kantor' => $kantor]);
    }

    public function update(Request $request,Potensi $potensi)
    {
        $this->validate($request,[
            'foto' => 'mimes:jpg,jpeg,png',
        ]);
        //dd($kantor);
        $potensi->update($request->all());
        if($request->latx >= 0)if($request->laty >= 0) {
            $potensi->status_tagging = "Y";
            $potensi->save();
        }

        if($request->hasFile('foto')){
            $request->file('foto')->move('app/img_potensi/',$request->file('foto')->getClientOriginalName());
            $potensi->foto = $request->file('foto')->getClientOriginalName();
            $potensi->save();
        }

        if($request->status_potensi == "peserta"){
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
	        $perusahaanbinaan->kantor_id = $potensi->kantor_id;
	        if($request->hasFile('foto')){
	            $request->file('foto')->move('admin/img_perusahaan/',$request->file('foto')->getClientOriginalName());
	            $perusahaanbinaan->foto = $request->file('foto')->getClientOriginalName();
	        }
	        $perusahaanbinaan->save();
        }
        return redirect('/potensi')->with('sukses','Data berhasil diupdate');
    }   
}
