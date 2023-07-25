@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                @isset($filter)
                    <div class="card-header">Filtered Hobbies by 
                        <span style="font-size:139%;" class="badge badge-{{ $filter->style }}">{{ $filter->name }}</span>
                        <span class="float-right"><a href="/hobby">Show All Hobbies</a></span>
                    </div>
                @else
                    <div class="card-header">All The Hobbies</div>
                @endisset

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($hobbies as $hobby)
                            <li class="list-group-item">
                                <a title="Show Detail" href="/hobby/{{ $hobby->id }}" >{{ $hobby->name }}</a>
                                @auth
                                <a class="btn btn-sm btn-light ml-2" href="/hobby/{{ $hobby->id }}/edit"><i class="fas fa-edit"></i>Edit Hobby</a>
                                @endauth
                                <span class="mx-2">Posted by: <a href="/user/{{ $hobby->user->id }}">{{ $hobby->user->name }}</a> ({{ $hobby->user->hobbies->count() }} Hobbies)</span>
                                @auth
                                <form class="float-right" style="display:inline" action="/hobby/{{$hobby->id}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" value="Delete" class="btn btn-sm btn-outline-danger">
                                </form>
                                @endauth
                                <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                <br>
                                @foreach($hobby->tags as $tag)
                                    <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                @endforeach
                                
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="mt-3">
                {{ $hobbies->links() }}
            </div>
            @auth
            <div class="mt-2">
                <a href="hobby/create" class="btn btn-success btn-sm" ><i class ="fas fa-plus-circle"></i> Create new Hobby</a>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection
