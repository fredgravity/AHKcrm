@extends('layout.base.home_app')

@section('title', 'Login')
@section('data-page-id', 'login')

@section('content')
	
	<h1 class="text-center">Login</h1>

    @include('includes.messages')

    <div class="grid-x grid-padding-x">
        
        <div class='small-12 medium-4'></div>

        <div class='small-12 medium-4'>
            <form action='/login' method='post'>
		        <div class="">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="{{App\classes\Request::oldData('post','username')}}">
                    <small id="UsernameHelp" >We'll never share your Username with anyone else.</small>
                    
                </div>
                <div class="">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
        
                <input type="hidden" name="token" value="{{App\classes\CSRFToken::generate('token')}}" >
                <input  name="login-submit" type="submit" class="button expanded primary" value="Login">
	        </form>
        </div>

        <div class='small-12 medium-4'></div>
	    
    </div>
	

@endsection