<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thanhvien', function (Blueprint $table) {
            $table->id(); // id (integer , primary key, increament)
            $table->string('hoTen', 100); // hoTen (string, 100)
            $table->string('password', 100); // password (string, 100)
            $table->string('email', 200); // email (string , 200)
            $table->string('randomKey', 100)->nullable(); // randomKey (string, 100, nullable)
            $table->boolean('active')->default(0); // active (boolean, default = 0)
            $table->integer('idGroup')->default(0); // idGroup (integer, default =0)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanhvien');
    }
};
