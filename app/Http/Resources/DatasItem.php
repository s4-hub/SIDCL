<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class DatasItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'nama'  => $this->nama,
            'npp'   => $this->npp,
            // 'div'   => $this->div,
            'alamat'    => $this->alamat,
            'jum_tk'  => $this->jum_tk,
            'status'   => $this->status,
            'pembina_id'    => $this->pembina_id,
            'kantor_id'         => $this->kantor_id,
            'foto'  => $this->foto,
            'latx'         => $this->latx,
            'laty'        => $this->laty,
            //'potensi'   => PotensiItem::collection($this->collection)
            //     $this->potensi
            //     // $this->alamat,
            //     // $this->jum_tk,
            //     // $this->status,
            //     // $this->latx,
            //     // $this->laty,
            //     // $this->pembina_id,
            //     // $this->foto
            // ),
            // 'created_at'    => $this->created_at,
            // 'updated_at'    => $this->updated_at
        ];
        
    }
}
