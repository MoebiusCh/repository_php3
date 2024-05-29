<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->id();
            // $table->string('username');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->string('role');
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
