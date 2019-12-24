<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToplistElements;
use App\vote;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function getElements($id){
        $toplist = ToplistElements::where('toplist_id', $id)->orderByRaw('RAND()')->take(2)->get();
        return json_encode($toplist);
    }

    public function countElements($id){
        $countElements = ToplistElements::where('toplist_id', $id)->count();
        return $countElements;
    }

    public function addVote(Request $request){
        $id = 1;
        $element = ToplistElements::find( $request->vote['element_id']);

        Validator::make($request->vote, [
            'element_id' => 'required',
        ])->validate();
            vote::create([
                'toplist_elements_id' => $element->id,
                'toplist_id' => $element->toplist_id
            ]);
    }

    public function toplist($id){
        $toplists = ToplistElements::where('toplist_id', $id)->with('vote')->get()->sortByDesc(function($toplist)
        {
            return $toplist->vote->count();
        });
        return json_encode($toplists->values());


    }
    public function countVotes($id){
        $toplists = vote::where('toplist_id', $id)->count();
        return $toplists;


    }
}
