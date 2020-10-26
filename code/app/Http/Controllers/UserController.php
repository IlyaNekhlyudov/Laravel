<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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

    public function auth(Request $request) : string {
        $link = route('auth');
        $html = <<<HTML
            <h2>Авторизация</h2>
            <form action=$link method='get' style='display: flex; flex-direction: column;'>
                <input name='email' type='email' placeholder='Введите email' style='margin-top: 20px; width: 200px;'>
                <input name='password' type='password' placeholder='Введите пароль' style='margin-top: 10px; width: 200px;'>
                <input type='submit' value='Войти' style='margin-top: 20px; width: 100px;'>
            </form>
        HTML;
        return $this->generateHTML($html);
    }

    public function hello(Request $request) : string {
        $html = <<<HTML
            <h2>Привет, пользователь!</h2>
        HTML;
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
