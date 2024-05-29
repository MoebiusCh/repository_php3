<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tinTucCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class tinCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('tin_category')->count() > 0) {
            Schema::disableForeignKeyConstraints();
            tinTucCategory::truncate();
            Schema::enableForeignKeyConstraints();
        }
        tinTucCategory::factory()->count(1)->create();
    }
}
