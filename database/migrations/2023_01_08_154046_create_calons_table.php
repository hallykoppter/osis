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
        Schema::create('calons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama1');
            $table->string('nama2');
            $table->integer('nomor');
            $table->text('visi');
            $table->text('misi');
            $table->string('foto');
            $table->string('warna');
            $table->integer('jumlah_suara');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calons');
    }
};
