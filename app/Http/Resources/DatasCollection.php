<?php

namespace App\Http\Resources;

use App\Perusahaanbinaan;
use App\Potensi;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DatasCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $a = Perusahaanbinaan::all();
        $b = Potensi::all();
        // $a = App\Http\Resource\DatasCollection;
        // $b = App\Http\Resource\PotensiCollection;
        // $a = DatasItem::collection($this->collection);
        // // console.log($a);
        // $b = PotensiItem::collection($this->collection);
        $obj = $a->merge($b);
        //PotensiItem::collection($this->collection);
        // $obj = $data1->merge($data2);
        return [

            $obj
            // 'data' => DatasItem::collection($this->collection),
            //'data' => $data1->merge($data2)
            //'potensi' =>  PotensiItem:collection($this->collection)
            
        ];
    }

    
}
