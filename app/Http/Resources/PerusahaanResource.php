<?php

namespace App\Http\Resources;

use App\Resources\DatasItem;
use App\Resources\PotensiItem;
use Illuminate\Http\Resources\Json\JsonResource;

class PerusahaanResource extends JsonResource
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
            'alamat'    =>  $this->alamat,
            'jum_tk'    =>  $this->jum_tk,
            'status'    => $this->status,
            'pembina'   => $this->pembina_id,
        ];
    }
}
