@extends('layouts.app')
@section('title', 'Profile')
@section('content')


<form action="update/{{ $profile->id }} " method="POST">    
@csrf
<div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Profile Information</h5>

<div class="form-group">
    <label for="state.email">Name</label>
    <input type="text" class="form-control" name="name" id="name"  value="{{ $profile->name }}"/>
</div>

<div class="form-group">
    <label for="state.email">Email Address</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ $profile->email }}" />
</div>

<div class="form-group">
    <button type="submit" value="submit" class="btn btn-primary">Update Info</button>
    <a href="javascript:history.back()" class="btn btn-primary">Back</a>
</div>

    </div>
</form>



@endsection