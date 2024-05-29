<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('products')) return;
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2);
            $table->tinyIncrements('sale')->default(0);
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->tinyInteger('status')->default(1);
            // $table->enum('status', ['nonactive', 'active'])->default('Active');
            $table->tinyInteger('is_hot')->default(0);
            $table->integer('sale_rate')->default(0);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
