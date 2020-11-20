<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    private $sources = [
        'Яндекс.Москва'     => 'https://news.yandex.ru/Moscow/index.rss',
        'Яндекс.Спорт'      => 'https://news.yandex.ru/sport.rss',
        'Яндекс.Интернет'   =>'https://news.yandex.ru/internet.rss'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->sources as $key => $value) {
            DB::table('categories')->insert([
                'title'     => $key,
                'link'      => $value
            ]);
        }
    }
}
