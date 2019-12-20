<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToplistsController extends Controller
{
    public function index($id){
        return view('welcome')->with('toplistid', $id);
    }
    public function top($id){
        // return view('top')->with('id', $id);
        return view('top')->with('id', $id);
    }
}
