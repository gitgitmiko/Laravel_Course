<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
        $this->middleware('admin')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd = die+dump
    
        $tags = Tag::all();

        return view('tag.index')->with([
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
            'name' => 'required|min:3',
            'style' => 'required|min:5'
        ]);

        $tag =  new Tag([
            'name' => $request['name'],
            'style' => $request['style']

        ]);
        $tag->save();
        return $this->index()->with([
            'message_success' => "The Tag <b>".$tag->name."</b> was created."
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        abort_unless(Gate::allows('update', $tag), 403);

        //
        return view('tag.edit')->with([
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        abort_unless(Gate::allows('update', $tag), 403);

        //
        $request -> validate([
            'name' => 'required|min:3',
            'style' => 'required|min:5'
        ]);

        $tag->update([
            'name' => $request['name'],
            'style' => $request['style']

        ]);
        
        return $this->index()->with([
            'message_success' => "The Tag <b>".$tag->name."</b> was updated."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        abort_unless(Gate::allows('delete', $tag), 403);

        //
        $oldName = $tag->name;
        $tag->delete();

        return redirect()->back()->with([
            'message_success' => "The Tag <b>".$oldName."</b> was deleted."
        ]);
    }
}
