<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Kantor;

class KantorImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $row) {
        	if ($key >= 1) {
	        	Kantor::create([
	        		'id' => $row[0],
	        		'kci' => $row[0],
	        		'kode_kantor' => $row[1],
	        		'nama' => $row[2],
	        		'alamat' => $row[3],
	        	]);
        	}
        }
		return back()->with('sukses','Data berhasil diimport');
    }
}
