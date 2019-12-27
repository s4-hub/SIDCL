<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\User;
use App\Pembina;
use App\Kantor;

class UserController extends Controller
{
    public function index()
    {
    	$data_user = User::all();
    	$data_kantor = Kantor::orderBy('kode_kantor','ASC')->get();
    	return view('user.index',compact('data_user','data_kantor'));
    }

    public function create(Request $request)
    {
    	/* insert seluruh data tanpa melihat kondisi inputan seperti bcrypt password 
        \App\User::create($request->all());
        */
        //return $request;
        $this->validate($request,[
            'name' => 'min:3|required',
            'username' => 'min:8|max:8|unique:users|alpha_num|required',
            'email' => 'email|unique:users|required',
            'password' => 'required',
            'role' => 'required',
            'no_hp' => 'min:10|numeric|required',
            'kantor_id' => 'required',
         ]);

        $user = new \App\User;
		$user->name = strtoupper($request->name);
        $user->email = strtolower($request->email);
        $user->username = strtoupper($request->username);
        $user->password = bcrypt('$request->password');
        $user->role = $request->role;
        $user->aktif = $request->aktif;
        $user->kantor_id = $request->kantor_id;
        $user->remember_token = str_random(60);
        $user->save();

        if($user->role == "pembina"){
			$request->request->add(['user_id' => $user->id]);
			$pembina = \App\Pembina::create($request->all());
			return redirect('/user')->with('sukses','Data berhasil disimpan');
        }
        return redirect('/user')->with('sukses','Data berhasil disimpan');

     //    return $request->all();
     //    $user = new \App\User;
     //    $user->name = $request->name;
     //    $user->email = $request->email;
     //    $user->username = $request->username;
     //    $user->password = bcrypt('$request->password');
     //    $user->role = $request->role;
     //    $user->aktif = $request->aktif;
     //    $user->remember_token = str_random(60);
     //    $user->save();
     //    return redirect ('/user')->with('sukses','Data berhasil diinput');
    }

    public function edit(User $user)
    {
        //dd($user);
        $kantor = Kantor::orderBy('kode_kantor','ASC')->get();
        return view('user/edit', compact('user','kantor'));
    }

    public function update(Request $request,User $user)
    {
        $user->update($request->all());
        //     if($user->role == "pembina"){
        //     $request->request->add(['user_id' => $user->id]);
        //     $pembina = new \App\Pembina;
        //     $pembina->user_id = $request->user_id;
        //     $pembina->name = $request->name;
        //     $pembina->no_hp = 0;
        //     $pembina->kantor_id = $request->kantor_id;
        //     $pembina->save();
        //     return redirect('/user')->with('sukses','Data berhasil disimpan');
        // }
        if($user->role == "pembina"){
            $user->pembina->update($request->all());
            return redirect('/user')->with('sukses','Data user dan data pembina berhasil diupdate');
        }
        return redirect('/user')->with('sukses','Data berhasil diupdate');
    }

    public function delete(User $user)
    {
        $user->delete();
        if($user->role == "pembina"){
            $user->pembina->delete();
            return redirect('/user')->with('sukses','Data user dan data pembina berhasil dihapus');
        }
        return redirect('/user')->with('sukses','Data berhasil dihapus');
    }

    public function export()
    {
        $user = User::all();
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request) 
    {
        $this->validate($request,[
            'file' => 'mimes:xls,xlsx'
        ]);
        
        Excel::import(new \App\Imports\UsersImport,$request->file('file'));
        // dd($request->all());

    //     if($request->hasFile('file')){
    //         $path =  $request->file('file')->getRealPath();
    //         $data = Excel::load($path)->get();
    //             if($data->count() > 0){
    //                 foreach ($data as $key => $value) {
    //                     $user = new User();
    //                     $user->username = strtoupper($value->username);
    //                     $user->name = strtoupper($value->name);
    //                     $user->email = strtolower($value->email);
    //                     $user->password = bcrypt('$value->password');
    //                     $user->aktif = $value->aktif;
    //                     $user->role = $value->role;
    //                     $user->save();
    //             }
    //         }
    //     }
    //     return redirect('/user')->with('sukses','Data berhasil diimport');
    }
}