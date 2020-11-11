<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Response;

class CategoryController extends Controller
{
    public function all()
    {
        return Response::view('category', [
            'categories' => Category::all(),
        ]);
    }
}
