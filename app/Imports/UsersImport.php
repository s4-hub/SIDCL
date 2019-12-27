<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\User;

class UsersImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dd($collection);
        foreach ($collection as $key => $row) {
        	if ($key >= 1) {
	        	User::create([
	        		'username' => $row[0],
	        		'name' => $row[1],
	        		'email' => $row[2],
	        		'password' => $row[3],
	        		'aktif' => "Y",
	        		'role' => "pembina",
	        		'kantor_id' => $row[5],
	        		'remember_token' => str_random(60),
	        	]);
        	}
        }
		return back()->with('sukses','Data berhasil diimport');
    }
}
