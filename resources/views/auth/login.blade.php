@extends('layouts.app')
@section('title', 'Zaigo - Login')
@section('content')

<form action="{{ route ('login') }}" method="POST">
    @csrf

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Log In</h5>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email"  class="form-control" name="email" id="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
                @if ($errors->has('email'))
                    <div class="alert error">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" >Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autofocus>
                @if ($errors->has('password'))
                    <div class="alert error">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <Center>
                <button type="submit" value="submit" class="btn btn-primary col-sm-4">Log In</button>
            </Center>
        </div>
    </div>
</form>         
    
@endsection