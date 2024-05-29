<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Schema;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        OrderDetail::truncate();
        Schema::enableForeignKeyConstraints();
        OrderDetail::factory(1)->create();
    }
}
