<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usahas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->string('deskripsi_usaha');
            $table->string('nama_pemilik');
            $table->string('alamat_usaha');
            $table->string('perizinan');
            $table->string('koordinat');
            $table->string('nohp');
            $table->foreignId('desa_id');
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
        Schema::dropIfExists('usahas');
    }
};
