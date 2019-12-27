<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PotensiItem extends JsonResource
{
    /**
     * Transform the resource into an array.a
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'nama'  => $this->nama,
            'alamat'    => $this->alamat,
            'jum_tk'    => $this->jum_tk,
            'status'    => $this->status,
            'pembina_id'    => $this->pembina_id,
            'kantor_id' => $this->kantor_id,
            'foto'  => $this->foto,
            
            'latx'  => $this->latx,
            'laty'  => $this->laty,
        ];
    }
}
