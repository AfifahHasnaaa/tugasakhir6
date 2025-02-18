<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user_alumni', function (Blueprint $table) {
            $table->integer('reset_code')->nullable();
            $table->timestamp('reset_code_expiry')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user_alumni', function (Blueprint $table) {
            $table->dropColumn(['reset_code', 'reset_code_expiry']);
        });
    }
};
