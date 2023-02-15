<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('instansi_id')->nullable();
            // $table->foreign('instansi_id')->references('id')->on('instansi');
            $table->string('unit_kerja')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            // $table->foreign('role_id')->references('id')->on('user_role');
            $table->tinyInteger('is_active')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
