<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembina;
use App\Kantor;

class PembinaController extends Controller
{
    public function index()
    {
	    $data_pembina = Pembina::all();
	    return view('pembina.index',compact('data_pembina'));
    }

    public function edit(Pembina $pembina, Kantor $kantor)
    {
        //dd($pembina);
        $kantor = Kantor::orderBy('kode_kantor','ASC')->get();
        return view('pembina/edit', ['pembina' => $pembina,'kantor' => $kantor]);
    }

    public function update(Request $request,Pembina $pembina)
    {
        //dd($pembina);
        $pembina->update($request->all());
        $pembina->user->update($request->all());
        return redirect('/pembina')->with('sukses','Data berhasil diupdate');
    }    
}
