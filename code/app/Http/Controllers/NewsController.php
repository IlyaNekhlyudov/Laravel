<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param Request $request
     * @param string $categoryId
     * @return string
     */
    public function allByCategory(string $categoryId)
    {
        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->where('category_id', $categoryId)
            ->get([
                'news.*',
                'categories.name AS category_name',
            ]);

        return view('category_news', compact('news'));
    }

    /**
    *   @return object
    */
    public function all()  {
        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->orderBy('news.id', 'desc')
            ->get([
                'news.*',
                'categories.name AS category_name',
            ]);
        
        return view('all-news', compact('news'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return string
     */
    public function one(string $id)
    {
        $news = DB::table('news')->find($id);

        if (!$news) {
            return redirect('category');
        }

        return view('news', compact('news'));
    }
}
