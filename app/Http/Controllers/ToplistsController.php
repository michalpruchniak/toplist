<?php

namespace App\Http\Controllers;
use App\ToplistElements;
use Illuminate\Http\Request;

class ToplistsController extends Controller
{
    public function index($id){
        $countElements =ToplistElements::where('toplist_id', $id)->count();
        return view('welcome')->with('toplistid', $id)
                              ->with('countElements', $countElements);
    }
    public function top($id){
        return view('top')->with('id', $id);
    }
}
