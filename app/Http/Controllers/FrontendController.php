<?php

namespace App\Http\Controllers;

use App\Toplist;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function allToplists(){
        $toplists = Toplist::all();

        return view('frontend.alltoplists')->with('toplists', $toplists);
    }
    public function latestToplist(){
        $latest = Toplist::orderBy('created_at', 'desc')->first();
        return redirect()->route('toplist.vote', ['slug' => $latest->slug]);
    }

}
