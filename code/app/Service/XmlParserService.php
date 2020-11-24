<?php

namespace App\Service;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XmlParserService
{
    /**
     * @param Source $source
     */
    public function parse(Source $source)
    {
        $xmlData = XmlParser::load($source->link);

        $parsedData = $xmlData->parse([
            'title'       => ['uses' => 'channel.title'],
            'link'        => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image'       => ['uses' => 'channel.image.url'],
            'news'        => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
        ]);

        $newsInSystem = News::query()
            ->whereIn('source_guid', array_column($parsedData['news'], 'guid'))
            ->where('source_id', $source->id)
            ->get()
            ->keyBy('source_guid')
            ->toArray();

        $categories = array_column(Category::query()->select('id')->get()->toArray(), 'id');

        $forInsert = [];

        foreach ($parsedData['news'] as $news) {
            if (!array_key_exists($news['guid'], $newsInSystem)) {
                $forInsert[] = [
                    'title'       => $news['title'],
                    'short_text'  => $news['description'],
                    'full_text'   => $news['description'],
                    'category_id' => $categories[array_rand($categories)],
                    'source_guid' => $news['guid'],
                    'source_id'   => $source->id,
                    'link'        => $news['link'],
                    'photo'       => 'https://dev.by/storage/images/11/19/60/46/derived/487334ba2fc1b64aca15ee29aab39967.jpg',
                ];
            }
        }

        News::query()->insert($forInsert);

        return count($forInsert);
    }
}
