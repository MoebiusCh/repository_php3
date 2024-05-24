<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.w
     */
    public function up(): void
    {
        if (!Schema::hasTable('tin')) {
            Schema::create('tin', function (Blueprint $table) {
                $table->increments('id');
                $table->string('tieuDe');
                $table->text('noiDung');
                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('id')
                    ->on('tin_category')->onDelete('cascade')->onUpdate('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin');
    }
};
