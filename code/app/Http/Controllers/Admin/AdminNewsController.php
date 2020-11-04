<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Response;
use DB;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->orderBy('news.id')
            ->get([
                'news.*',
                'categories.name AS category_name',
            ]);

        return Response::view('admin.news.index', [
            'news'       => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $status = false)
    {
        $categories = DB::table('categories')->get();

        if (request()->get('status')) {
            $status = true;
        }

        return Response::view('admin.news.create', [
            'categories' => $categories,
            'status'     => $status,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        DB::table('news')
            ->insert([
                "title"         => $data['title'],
                "category_id"   => $data['category'],
                "photo"         => $data['photo'],
                "short_text"    => $data['short-text'],
                "full_text"     => $data['full-text'],
            ]);
        return redirect()->route('news.create', ['status' => true])->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response | RedirectResponse
     */
    public function edit($id, $status = false)
    {
        $news = DB::table('news')->find($id);
        $categories = DB::table('categories')->select('id', 'name')->get();

        if (request()->get('status')) {
            $status = true;
        }

        if ($news) {
            return Response::view('admin.news.edit', [
                'news'       => $news,
                'categories' => $categories,
                'status'     => $status,
            ]);
        }
        return redirect()->route('news.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        DB::table('news')
            ->where('id', $id)
            ->update([
                "title"     => $data['title'],
                "category_id"  => $data['category'],
                "photo"     => $data['photo'],
                "short_text"=> $data['short-text'],
                "full_text" => $data['full-text'],
            ]);

        return redirect()->route('news.edit', ['news' => $id, 'status' => true])->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
