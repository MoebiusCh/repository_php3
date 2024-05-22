<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tin;
use App\Models\tinTucCategory;
use Illuminate\Support\Facades\DB;

class tinTucController extends Controller
{
    public function index()
    {
        // $tin = tin::get(['tieuDe', 'noiDung', 'created_at'])
        //     ->sortByDesc('created_at')->take(10);

        $tin = DB::table('tin')
            ->select('tieuDe', 'noiDung', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view("tintuc", compact('tin'));
    }

    public function tintrongloai(String $idCategory)
    {
        // $tintuc = tinTuc::where('category_id', $idCategory)->get();
        // $tintuc_category = tinTucCategory::findOrFail($idCategory);

        // Fetch tin_tuc items by category_id
        $tintuc = DB::table('tin')
            ->where('category_id', '=', $idCategory)
            ->get();

        // Fetch the category by id and handle not found
        $tintuc_category = DB::table('tin_category')
            ->where('id', $idCategory)
            ->first();

        return view('tintrongloai', compact('tintuc', 'tintuc_category'));
    }

    public function detail(String $id)
    {
        // $tintuc = tinTuc::findOrFail($id);
        $tintuc = DB::table('tin')->where('id', $id)->first();
        return view('tindetail', compact('tintuc'));
    }
}
