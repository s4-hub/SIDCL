<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    protected $table = 'kantor';
    protected $fillable = ['id','kci','kode_kantor','nama','alamat'];

    public function pembina()
    {
    	return $this->hasMany(Pembina::class);
    }

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
