<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    protected $table = "potensi";
    protected $fillable = ['nama','alamat','jum_tk_potensi','status_potensi','pembina_id','kantor_id','foto','latx','laty'];

    public function pembina()
    {
        return $this->belongsTo(Pembina::class);;
    }

    public function perusahaanbinaan()
    {
    	return $this->belongsTo(Perusahaanbinaan::class);
    }    

    public function checkPhoto()
    {
        if($this->foto){
            return asset('admin/img_potensi/'.$this->foto);
        }
        return asset('admin/img_potensi/default.jpg');
    }

    public static function rules($update = false, $id = null)
    {
        $rules  = [
            'id'    => 'required',
            'nama'  => 'required',
            'alamat'    => 'required',
            'jum_tk_potensi'    => 'required',
            'status_potensi'    => 'required',
            'pembina_id'    => 'required',
            'kantor_id' => 'required',
            'foto'  => 'required',
            'status_tagging' => 'required',
            'latx'  => ['required', Rule::unique('potensi')->ignore($id, 'id')],
            'laty'  => ['required', Rule::unique('potensi')->ignoer($id, 'id')],
        ];
        if($update){
            return $rules;
        }
        return array_merge($rules, [
            'kantor_id'  =>  'required|unique:potensi,kantor_id',
        ]);
    }
}
