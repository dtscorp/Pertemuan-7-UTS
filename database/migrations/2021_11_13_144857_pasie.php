<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pasie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function(blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('noHP', 15);
            $table->text('alamat');
            $table->integer('id_status');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('patient');
    }
}
