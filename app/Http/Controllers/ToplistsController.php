<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToplistsController extends Controller
{
    public function index($id){
        return view('welcome')->with('toplistid', $id);
    }
}
