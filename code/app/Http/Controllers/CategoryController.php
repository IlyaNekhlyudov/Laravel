<?php

namespace App\Http\Controllers;

use DB;

class CategoryController extends Controller
{
    public function all()
    {
        $categories = DB::table('categories')->get();
        return view('category', [
            'categories' => $categories,
        ]);
    }
}
