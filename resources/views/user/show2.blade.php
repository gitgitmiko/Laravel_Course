@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div style="font-size: 150%;" class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <p class="mt-2"><b>Email:</b><br>{{$user->email}}</p>
                                <p class="mt-2"><b>Motto:</b><br>{{$user->motto}}</p>
                                <p class="mt-2"><b>About me:</b><br>{{$user->about_me}}</p>
                                <p class="mt-2"><b>Role:</b><br>{{$user->role==='admin' ? $user->role : 'user'}}</p>
                                <p class="mt-2"><b>Email verified at:</b><br>{{$user->email_verified_at}}</p>
                                <p class="mt-2"><b>Password:</b><br>{{$user->password}}</p>
                                <p class="mt-2"><b>Remember Token:</b><br>{{$user->remember_token}}</p>
                                <p class="mt-2"><b>Created at:</b><br>{{$user->email_verified_at}}</p>
                                <p class="mt-2"><b>Updated at:</b><br>{{$user->email_verified_at}}</p>
                                
                            </div>
                        </div>


                    </div>

                </div>

                <div class="mt-4">
                    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to Overview</a>
                </div>
            </div>
        </div>
    </div>
@endsection