<?php

use Illuminate\Database\Seeder;

class PotensiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Colleague::class, 20)->create();
    }
}
