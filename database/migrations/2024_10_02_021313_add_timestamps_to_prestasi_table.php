<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToPrestasiTable extends Migration
{
    public function up()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->timestamps(); // Ini akan menambahkan created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->dropTimestamps(); // Menghapus created_at dan updated_at
        });
    }
}
