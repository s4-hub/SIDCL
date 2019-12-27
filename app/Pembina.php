<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    protected $table = 'pembina';
    protected $fillable = ['name','no_hp','user_id','kantor_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function kantor()
    {
    	return $this->belongsTo(Kantor::class);
    }

    public function perusahaanbinaan()
    {
        return $this->hasMany(Perusahaanbinaan::class);
    }

    public function potensi()
    {
        return $this->hasMany(Potensi::class);
    }
}