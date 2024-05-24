<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class chenthanhvien extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $ho = ['Nguyễn', 'Lê', 'Phan', 'Đỗ', 'Hồ', 'Võ', 'Bùi'];
        $ten = ['Tâm', 'Thảo', 'Dược', 'Ngọc', 'Hoàng', 'Minh', 'Hải', 'Kim'];
        $lot = ['Thị','Văn','Đức','Hải','Hoa','Hoàng','Thanh','Tuấn','Hương'];
    
        for($i=0; $i<100; $i++)
        {
            $ht = Arr::random($ho).' '.Arr::random($lot).' '.Arr::random($ten);
            DB::table('thanhvien')->insert([
                "hoten" => $ht,
                "email" => Str::random(5).'@gmail.com',
                "password" => bcrypt('hehe')
            ]);
        }
    }
    
}
