<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chendienthoai extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('dienthoai')->insert([
                ['tenDT' => 'Oppo A1', 'gia' => mt_rand(2000000, 7000000), 'ngayCapNhat' => now(), 'idLoai' => 2],
                ['tenDT' => 'Iphone XS Max', 'gia' => mt_rand(5000000, 20000000), 'ngayCapNhat' => now(), 'idLoai' => 1],
                ['tenDT' => 'Nokia Pro',  'gia' => mt_rand(1500000, 5500000),  'ngayCapNhat' => now(),  'idLoai' => 1],
            ]);
        } //for

    }
}
