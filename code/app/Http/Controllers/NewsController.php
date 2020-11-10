<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Response;

class NewsController extends Controller
{
    /**
     * @param Request $request
     * @param string $categoryId
     * @return string
     */
    public function allByCategory(string $categoryId)
    {
        return Response::view('category_news', [
            'news'          => News::where('category_id', $categoryId)->get(),
            'category'      => Category::findOrFail($categoryId),
        ]);
    }

    /**
    *   @return object
    */
    public function all()  {
        return Response::view('all-news', [
            'news'       => News::query()->paginate(10),
            'categories' => Category::all()->keyBy('id'),
        ]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return string
     */
    public function one(string $id)
    {
        $news = News::query()->findOrFail($id);
        return view('news', compact('news'));
    }
}
