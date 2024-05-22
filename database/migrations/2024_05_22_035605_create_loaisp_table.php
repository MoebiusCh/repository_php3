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
        Schema::create('loaiSP', function (Blueprint $table) {
            $table->id(); // id (integer , primary key, increament)
            $table->string('tenLoai', 30)->unique(); // tenLoai (string, 30, unique)
            $table->integer('thuTu')->default(0); // thuTu (integer, default = 0)
            $table->boolean('anHien')->default(1); // anHien (boolean, default = 1)
            $table->string('urlHinh', 200)->nullable(); // urlHinh (string, 200, nullable)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loaisp');
    }
};
