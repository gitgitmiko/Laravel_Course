@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">All the Users</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($users as $user)
                                <li class="list-group-item">
                                    <a title="Show Details" href="/user/{{ $user->id }}">{{ $user->name }}</a>
                                    <span class="mx-2">{{ $user->email }}</span>
                                    <span class="mx-2">{{ $user->created_at }}</span>
                                    <span class="mx-2">{{ $user->update_at }}</span>
                                    @auth
                                    <a class="btn btn-sm btn-light ml-2" href="/user/{{ $user->id }}/edit"><i class="fas fa-edit"></i> Edit User</a>
                                    @endauth
                                    @auth
                                    <form class="float-right" style="display: inline" action="/user/{{ $user->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                    @endauth
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>

                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection