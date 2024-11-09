@extends('admin.layout.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit User</h1>
            <h3>{{$user->name}}</h3>
        </div>
        <div class="col-md-12">

            <form action="{{ route('admin.user.edit',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    @if($user->getFirstMediaUrl('avatar'))
                        <div class="text-center">
                            <img src="{{ $user->getFirstMediaUrl('avatar') }}" alt="" style="width: auto; height: 200px;" class="img-thumbnail">
                        </div>
                    @endif
                    <label for="name">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control-file">
                    @error('avatar')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                    @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ $user->location }}">
                    @error('location')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
