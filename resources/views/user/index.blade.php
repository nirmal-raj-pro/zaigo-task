@extends('layouts.app')
@section('title', 'Home')
@section('content')

<form >
    @csrf   
        <h4 class="text-center pb-4 font-weight-bold">Welcome {{ Auth::user()->name }}</h4>

        <div class="d-flex flex-row-reverse bg-light">
            <div class="p-2 bg-info"><a class="btn btn-warning btn-block" href="{{ route('logout') }}"><b>Log out</b></a></div>
            <div class="p-2 bg-info"><a class="btn btn-warning btn-block" href = 'profile/{{ $user->id }}'><b>View Profile</b></a></div>
            <div class="p-2 bg-info"><a class="btn btn-warning btn-block" href="{{ route('newuser') }}"><b>Create User</b></a></div>
    </div>

</form>

@endsection