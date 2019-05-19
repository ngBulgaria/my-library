@extends('master')
 
@section('content')
    
    <form method="POST" action="/saveprofile" id="register">
        <h2>Edit Profile</h2>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" required>
        </div>

         <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" disabled>
        </div>
 
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
        </div>
 
        <div class="form-group">
            <label for="password">Old Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="newpassword">New Password:</label>
            <input type="password" class="form-control" id="newpassword" name="newpassword" required>
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Save Profile</button>
        </div>
        @include('partials.formerrors')
    </form>
 
@endsection