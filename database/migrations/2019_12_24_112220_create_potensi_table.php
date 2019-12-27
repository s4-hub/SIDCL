<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePotensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('potensi', function (Blueprint $table) {
            $table->dropPrimary('id');
            $table->integer('id')->unsigned()->change;
            // $table->bigIncrements('id');
            // $table->string('nama');
            // $table->string('alamat',);
            // $table->integer('jum_tk_potensi',);
            // $table->string('status_potensi');
            // $table->integer('pembina_id');
            // $table->integer('kantor_id');
            // $table->string('foto');
            // $table->decimal('latx', 8, 5);
            // $table->decimal('laty', 8, 5);
            // $table->timestamps();
            
            //  $table->foreign('pembina_id')->references('pembina_id')->on('perusahaanbinaan');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('potensi');
        // Schema::table('potensi', function(Blueprint $table){
        //     $table->dropPrimary('id');
        //     $table->integer('id')->unsigned()->change();
        // });
    }
}
