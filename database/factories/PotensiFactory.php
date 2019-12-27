<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'id'    =>  $faker->Id,
        'nama'  => $faker->Nama,
        'alamat'   => $faker->Alamat,
        'jum_tk_potensi'    => $faker->JumTkPotensi,
        'status_potensi'    => $faker->StatusPotensi,
        'pembina_id'    => $faker->PembinaId,
        'kantor_id' => $faker->KantorId,
        'foto'  => $faker->Foto,
        'status_tagging'    => $faker->StatusTagging,
        'latx'  =>  $faker->LatX,
        'laty'  => $faker->LatY,
    ];
});
