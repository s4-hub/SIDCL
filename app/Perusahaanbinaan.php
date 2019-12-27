<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Perusahaanbinaan extends Model
{
    protected $guarded = ['id_perusahaan'];
    protected $table = 'perusahaanbinaan';

    public static function rules($update = false, $id = null)
    {
        $rules = [
            'id'    => 'required',
            'nama'  => 'required',
            'npp'   => 'required',
            'div'   => 'required',
            'alamat'    => 'required',
            'jum_tk_aktif'  => 'required',
            'status_keps'   => 'required',
            'pembina_id'    => 'required',
            'kantor_id'         => 'required',
            'foto'  => 'required',
            'status_tagging'  => 'required',
            'latx'         => ['required', Rule::unique('perusahaanbinaan')->ignore($id, 'id')],
            'laty'        => ['required', Rule::unique('perusahaanbinaan')->ignore($id, 'id')],
            'created_at'    => 'required',
            'updated_at'    => 'required'
        ];
        if ($update) {
            return $rules;
        }
        return array_merge($rules, [
            'kantor_id'         => 'required|unique:perusahaanbinaan,kantor_id',
        ]);
    }

    public function pembina()
    {
        return $this->belongsTo(Pembina::class);
    }

    public function potensi()
    {
        return $this->hasOne(Potensi::class);
    }

    public function checkPhoto()
    {
        if($this->foto){
            return asset('admin/img_perusahaan/'.$this->foto);
        }
        return asset('admin/img_perusahaan/default.jpg');
    }          

    public function datapotensi()
    {
        return $this->hasMany('App\Potensi');
    }
}


