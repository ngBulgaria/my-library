@extends('master')
 
@section('content')
 

    
    <form method="POST" action="/login" id="login">
        {{ csrf_field() }}
        <h2>Log In</h2>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="username" class="form-control" id="username" name="username">
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
        </div>
        @include('partials.formerrors')
    </form>
 
@endsection