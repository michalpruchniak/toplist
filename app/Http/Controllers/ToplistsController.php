<?php

namespace App\Http\Controllers;
use App\ToplistElements;
use App\Toplist;
use Illuminate\Http\Request;

class ToplistsController extends Controller
{
    public function index($slug){
        $toplist = Toplist::where('slug', $slug)->first();
        if(!$toplist){
            return view('layouts.error')->with('alert', 'This toplist doesn\'t exist');
            exit;
        }
        $countElements =ToplistElements::where('toplist_id', $toplist->id)->count();
        return view('welcome')->with('toplistid', $toplist->id)
                              ->with('countElements', $countElements);
    }
    public function top($slug){
        $toplist = Toplist::where('slug', $slug)->first();
        if(!$toplist){
            return view('layouts.error')->with('alert', 'This toplist doesn\'t exist');
            exit;
        }
        return view('top')->with('id', $toplist->id);
    }
}
