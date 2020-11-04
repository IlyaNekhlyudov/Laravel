<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;
use DB;

class DataOffloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         return Response::view('dataOffload.index');
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
            $result = DB::table('data_offload')
                        ->insert([
                            "name"          => $data['name'],
                            "phone_number"  => $data['tel'],
                            "email"         => $data['email'],
                            "message"       => $data['info'],
                        ]);
 
            return Response::view('dataOffload.create', [
                'result'   => $result,
            ]);
         } else {
             return redirect(route('request.index'));
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
         return redirect()->route('request.create')->withInput($request->except('_token'));
     }
}
