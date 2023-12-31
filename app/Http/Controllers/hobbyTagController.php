<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Hobby;
use Illuminate\Support\Facades\Gate;

class hobbyTagController extends Controller
{
    //
    public function getFilteredHobbies($tag_id){
        $tag = new Tag();
        $hobbies = $tag::findOrFail($tag_id)->filteredHobbies()->paginate(10);

        $filter = $tag::find($tag_id);
        //dd($filter);

        return view('hobby.index', [
            'hobbies' => $hobbies,
            'filter' => $filter
        ]); 
    }

    public function attachTag($hobby_id, $tag_id){
        $hobby = Hobby::find($hobby_id);

        if(Gate::denies('connect_hoobyTag', $hobby)){
            abort(403, 'Nonono this hobby is not yours!!!');
        }

        $tag = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);
        return back()->with([
            'message_success' => "The Tag <b>".$tag->name."</b> was added."
        ]);
    }
    public function detachTag($hobby_id, $tag_id){
        $hobby = Hobby::find($hobby_id); 

        if(Gate::denies('connect_hoobyTag', $hobby)){
            abort(403, 'Nonono this hobby is not yours!!!');
        }

        $tag = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);
        return back()->with([
            'message_success' => "The Tag <b>".$tag->name."</b> was removed."
        ]);
    }
}
