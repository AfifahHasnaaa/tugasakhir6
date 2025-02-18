<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->id('id_user'); // auto incrementing id
            $table->string('username')->unique();
            $table->string('password'); // will store SHA1 hashed password
            $table->string('email')->unique();
            $table->datetime('tanggal_login')->nullable(); // datetime for last login
            $table->date('tanggal_pembuatan'); // date for account creation
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logins');
    }
}