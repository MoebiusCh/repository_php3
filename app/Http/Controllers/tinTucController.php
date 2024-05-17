<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tinTuc;
use App\Models\tinTucCategory;

class tinTucController extends Controller
{
    public function index()
    {
        $tin = tinTuc::get(['tieuDe', 'noiDung', 'created_at'])->sortByDesc('created_at')->take(10);

        return view("tintuc", compact('tin'));
    }

    public function tintrongloai(String $idCategory)
    {
        $tintuc = tinTuc::where('category_id', $idCategory)->get();
        $tintuc_category = tinTucCategory::findOrFail($idCategory);
        return view('tintrongloai', compact('tintuc', 'tintuc_category'));
    }

    public function detail(String $id)
    {
        $tintuc = tinTuc::findOrFail($id);
        return view('tindetail');
    }
}
