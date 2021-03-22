@extends('layouts.app')
@section('title', 'Edit User')
@section('content') 

<form action="/update/{{ $previousData->id }}"  method="POST">
    @csrf
    <div class="form-group row" ><div class="col-md-10 text-center"><h3>Edit User Info</h3></div></div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="{{ $previousData->name }}" required autofocus>
                @if ($errors->has('name'))
                    <div class="alert  error">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="english" class="col-sm-2 col-form-label">Email address</label>
            <div class="col-sm-5">
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $previousData->email }}" required autofocus pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Enter Valid Email" >
                @if ($errors->has('email'))
                    <div class="alert  error">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="avatar" class="col-sm-2 col-form-label">Media/File Upload</label>
            <div class="col-sm-6">
            <input type="file" id="avatar" name="avatar"accept=".jpg, .png, .jpeg, .pdf, .xlsx, .csv" required autofocus>  
                    @if ($errors->has('avatar'))
                    <div class="alert  error">
                        {{ $errors->first('avatar') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter user address" required autofocus>{{ $previousData->address }}</textarea>
                @if ($errors->has('address'))
                    <div class="alert  error">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="zipcode" class="col-sm-2 col-form-label">Zip code</label>
            <div class="col-sm-3">
            <input type="text" class="form-control" name="zipcode" id="zipcode" aria-describedby="zipcodeHelp" value="{{ $previousData->zipcode }}"  required autofocus pattern="^[0-9]{6}$" title="Enter Valid Zip Code" >        
                @if ($errors->has('zipcode'))
                    <div class="alert  error">
                        {{ $errors->first('zipcode') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="mobile" class="col-sm-2 col-form-label">mobile</label>
            <div class="col-sm-3">
            <input type="tel" class="form-control" name="mobile" id="mobile" aria-describedby="mobileHelp" value="{{ $previousData->mobile }}" required autofocus>  
                @if ($errors->has('mobile'))
                    <div class="alert  error">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="date" id="date" required autofocus>
                    @if ($errors->has('date'))
                        <div class="alert  error">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-6 text-center">
                <button type="submit" value="submit" class="col-sm-3 btn btn-info mt-2 ">Create</button>
            </div>
        </div>

    </form>

@endsection