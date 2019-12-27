<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaanbinaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaanbinaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('npp',);
            $table->integer('div');
            $table->string('alamat',);
            $table->integer('jum_tk_aktif',);
            $table->string('status_keps');
            $table->integer('pembina_id')->unsigned();
            $table->integer('kantor_id');
            $table->string('foto');
            $table->decimal('latx', 8, 5);
            $table->decimal('laty', 8, 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaanbinaan');
    }
}
