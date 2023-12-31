
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit User for Admin</div>
                    <div class="card-body">
                        <form autocomplete="off" action="/user/{{$user->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{ old('name') ?? $user->name }}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control{{ $errors->has('email') ? ' border-danger' : '' }}" id="email" name="email" value="{{ old('email') ?? $user->email }}">
                                <small class="form-text text-danger">{!! $errors->first('email') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="motto">Motto</label>
                                <input type="text" class="form-control{{ $errors->has('motto') ? ' border-danger' : '' }}" id="motto" name="motto" value="{{ old('motto') ?? $user->motto }}">
                                <small class="form-text text-danger">{!! $errors->first('motto') !!}</small>
                            </div>
                            @if(file_exists('img/users/' . $user->id . '_large.jpg'))
                            <div class="mb-2">
                                <img style="max-width: 400px; max-height: 300px;" src="/img/users/{{$user->id}}_large.jpg" alt="">
                                <a class="btn btn-outline-danger float-right" href="/delete-images/user/{{$user->id}}">Delete Image</a>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" value="">
                                <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="about_me">About me</label>
                                <textarea class="form-control" id="about_me" name="about_me" rows="5">{{old('about_me') ?? $user->about_me}}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="motto">Role</label>
                                <input type="text" class="form-control{{ $errors->has('role') ? ' border-danger' : '' }}" id="role" name="role" value="{{ old('role') ?? $user->role }}">
                                <small class="form-text text-danger">{!! $errors->first('role') !!}</small>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Save my profile">
                        </form>
                        <a class="btn btn-primary float-right" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection