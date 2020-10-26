<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private array $categories = [
        1 => 'Первая категория',
        2 => 'Вторая категория'
    ];

    private array $news = [
        1 => [
            'id' => 1,
            'title' => 'Новости Москвы',
            'description' => 'Последние новости прямиком из Москвы',
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Новости Тулы',
            'description' => 'Последние новости прямиком из Тулы',
            'category_id' => 1
        ],
        3 => [
            'id' => 3,
            'title' => 'Новости Волгограда',
            'description' => 'Последние новости прямиком из Волгограда',
            'category_id' => 2
        ],
        4 => [
            'id' => 4,
            'title' => 'Новости Саранска',
            'description' => 'Последние новости прямиком из Саранска',
            'category_id' => 2
        ],
    ];

    private array $menu = [
        1 => [
            'title' => 'Новости',
            'route' => 'news',
            'is_active' => true
        ],
        
        2 => [
            'title' => 'Категории',
            'route' => 'categories',
            'is_active' => false
        ],

        3 => [
            'title' => 'Страница приветствия',
            'route' => 'hello',
            'is_active' => true
        ],

        4 => [
            'title' => 'Авторизация',
            'route' => 'auth',
            'is_active' => false
        ],

        5 => [
            'title' => 'Добавить новость',
            'route' => 'news.add',
            'is_active' => false
        ]
    ];
        
    public function all(Request $request) : string {
        $html = "<h1 style='text-align: center;'> Все новости </h1>";
        foreach ($this->news as $key => $value) {
            $link = route('news.id', ['id' => $value['id']]);
            $html .= <<<HTML
                <a href={$link} style="text-decoration: none; color: black;">
                    <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                        <div style="width: 300px; border: 1px solid black; padding: 1px 20px;">
                            <h3>{$value['title']}</h3>
                            <p>{$value['description']}</p>
                        </div>
                    </div>
                </a>
            HTML;
        }
        return $this->generateHTML($html);
    }

    public function one(Request $request, int $id) : string {
        if (empty($this->news[$id])) {
            return redirect('news');
        }

        $news =& $this->news[$id];
        $link = route('news');
        $html = <<<HTML
            <h1>{$news['title']}</h1>
            <p>{$news['description']}</p>
            <a href=$link>Ко всем новостям</a>
        HTML;
        return $this->generateHTML($html);
    }

    public function add(Request $request) : string {
        $link = route('news');
        $html = <<<HTML
            <h2>Добавить новость</h2>
            <form action=$link method='get' style='display: flex; flex-direction: column;'>
                <input name='title' type='text' placeholder='Введите название новости' style='margin-top: 20px; width: 200px;'>
                <textarea name='description' placeholder='Введите описание новости' style='margin-top: 10px; height: 74px; width: 261px;'></textarea>
                <input type='submit' value='Добавить новость' style='margin-top: 20px; width: 150px;'>
            </form>
        HTML;
        return $this->generateHTML($html);
    }

    public function categories(Request $request) : string {
        $html = '<h2>Категории новостей</h2>';

        foreach ($this->categories as $key => $value) {
            $link = route('category.id', ['id' => $key]);
            $html .= <<<HTML
                <p><a href=$link>$value</a></p>
            HTML;
        }
        return $this->generateHTML($html);
    }

    public function newsByCategory(Request $request, int $id) {
        $html = <<<HTML
            <h2>Новости по категории - {$this->categories[$id]}</h2>
        HTML;

        foreach ($this->news as $key => $value) {
            if ($value['category_id'] == $id) {
                $link = route('news.id', ['id' => $value['id']]);
                $html .= <<<HTML
                    <a href={$link} style="text-decoration: none; color: black;">
                        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                            <div style="width: 300px; border: 1px solid black; padding: 1px 20px;">
                                <h3>{$value['title']}</h3>
                                <p>{$value['description']}</p>
                            </div>
                        </div>
                    </a>
                HTML;
            }
        }
        return $this->generateHTML($html);
    }

    private function generateHTML(string $content) : string {
        $route = [];
        $links = '';

        foreach ($this->menu as $key => $value) {
            $link = route($value['route']);
            $links .= <<<HTML
                <a href=$link style='text-decoration: none; color: white; padding: 10px 20px; border: 1px solid white;'>{$value['title']}</a>
            HTML;
        }
        
        $html = <<<HTML
            <header style="text-align: center; background-color: cornflowerblue; padding: 10px;">
                <h1 style="color: white; font-family: monospace;">Новостной портал<h1>
            </header>
            <div style='background-color: cornflowerblue; display: flex; justify-content: space-around; padding-bottom: 10px;'>
                $links
            </div>
            {$content}
            <footer style='margin-top: 61px;
                height: 43px;
                background-color: cornflowerblue;
                padding-left: 20px;
                padding-top: 20px;
                color: white;'> 
                Подвал сайта
            </footer>
        HTML;

        return $html;
    }
}
