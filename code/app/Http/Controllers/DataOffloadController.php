<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;
use App\Models\DataOffload;

class DataOffloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         return redirect(route('request.create'));
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create(Request $request, $result = false)
     {
        if ($request->get('result')) {
            $result = true;
        }

        return Response::view('dataOffload.create', [
            'result'   => $result,
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
        DataOffload::query()->create($request->except('_token'));

        return Response::view('dataOffload.create', ['result' => true]);
     }
}
