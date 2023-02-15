<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriAksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_akses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_id');
            $table->foreign('materi_id')->references('id')->on('materi');
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('user_role');
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
        Schema::dropIfExists('materi_akses');
    }
}
