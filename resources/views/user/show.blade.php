@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{$user->name}}</div>

                <div class="card-body">
                   <p><b>My Motto: </b><br>{{$user->motto}}</p>
                   <p class="mt-2"><b>About me: </b><br>{{$user->about_me}}</p>

                    <h5 style="font-size: 150%;">Hobbies of {{$user->name}}</h5>
                        @if($user->hobbies->count() > 0)
                            <ul class="list-group">
                                @foreach($user->hobbies as $hobby)
                                    <li class="list-group-item">
                                        <a title="Show Detail" href="/hobby/{{ $hobby->id}}" >{{ $hobby->name }}</a>
                                        <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                        <br>
                                        @foreach($hobby->tags as $tag)
                                            <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                        @endforeach
                                        
                                    </li>
                                @endforeach
                            </ul>
                        @else
                        <p>
                            {{ $user->name }} has not created any hobbies yet
                        </p>
                            
                        @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm" ><i class ="fas fa-arrow-circle-up"></i> Back to Overview</a>
            </div>
        </div>
    </div>
</div>
@endsection
