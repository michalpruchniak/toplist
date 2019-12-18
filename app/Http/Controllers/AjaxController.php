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

    public function addVote(Request $request){
        $id = 1;
        $element = ToplistElements::find($request->id);

        Validator::make($request->vote, [
            'element_id' => 'required',
        ])->validate();
            vote::create([
                'toplist_elements_id' => $request->vote['element_id']
            ]);
    }

    public function toplist(){
        $toplists = ToplistElements::with('vote')->get()->sortBy(function($toplist)
{
            return $toplist->vote->count();
        });
        return json_encode($toplists);


    }
}
