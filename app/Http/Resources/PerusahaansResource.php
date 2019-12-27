<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PerusahaansResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //  $s = DatasItem::collection($this->collection);
        //  $d = PotensiItem::collection($this->colleciton);
        // $obj = $s->merge($d);
        return [
            'datas' => DatasItem::colleciton($this->collection),
                    
                       
            
        ];

        return $this->toArray();
        
    }

    // public function with($request){

    //     return [
    //         'potensi' => PotensiItem::collection($this->collection)
    //     ];
    // }

   
}
