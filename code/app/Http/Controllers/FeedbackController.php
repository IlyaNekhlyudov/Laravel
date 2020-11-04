<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;
use DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::view('feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->old()) {
            $data = $request->old();
            $result = DB::table('feedback')
                        ->insert([
                            "name"      => $data['name'],
                            "message"   => $data['comment'],
                        ]);
    
            return Response::view('feedback.create', [
                'result' => $result,
            ]);
        } else {
            return redirect(route('feedback.index'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('feedback.create')->withInput($request->except('_token'));
    }
}
