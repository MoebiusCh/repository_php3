<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tin;
use Illuminate\Support\Facades\Schema;

class tinTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        tin::truncate();
        Schema::enableForeignKeyConstraints();
        tin::factory()->count(5)->create();
    }
}
