<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tinTuc;

class tinTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tinTuc::factory(10)->create();
    }
}
