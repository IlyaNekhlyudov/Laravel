<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParserRequest;
use App\Http\Requests\CreateParserRequest;
use App\Jobs\NewsParsing;
use App\Models\Source;
use Illuminate\Http\RedirectResponse;
use Response;

class AdminParserController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::view('admin.parser.index', [
            'sources' => Source::all(),
        ]);
    }

    public function create()
    {
        return Response::view('admin.parser.create');
    }

    public function store(CreateParserRequest $request)
    {
        $source = Source::query()->create($request->except(['_token']));

        return redirect()->route('parser')->with('success', "Источник {$source->title} успешно добавлен.");;
    }

    /**
     * @param ParserRequest $request
     * @return RedirectResponse
     */
    public function parse(ParserRequest $request)
    {
        $sources = Source::query()
            ->whereIn('id', $request->input('sources'))
            ->get();

        foreach ($sources as $source) {
            NewsParsing::dispatch($source);
        }
        
        return redirect()->route('parser')->with('success', 'Парсинг запущен');
    }
}
