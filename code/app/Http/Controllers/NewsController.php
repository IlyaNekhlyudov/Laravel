<?php

namespace App\Http\Controllers;

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
        if (empty($this->categories[$categoryId])) {
            return  redirect('category');
        }

        $category = $this->categories[$categoryId];

        $news = array_filter($this->news, function ($item) use ($categoryId) {
            return $item['categoryId'] == $categoryId;
        });

        return view('category_news', compact('news', 'category'));
    }

    /**
    *   @return object
    */
    public function all()  {
        $news = [];
        foreach ($this->news as $oneNews) {
            $oneNews['categoryName'] = $this->categories[$oneNews['categoryId']]['name'];
            array_push($news, $oneNews);
        }
        return view('all-news', compact('news'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return string
     */
    public function one(string $id)
    {
        if (empty($this->news[$id])) {
            return redirect('category');
        }

        $news = $this->news[$id];

        return view('news', compact('news'));
    }
}
