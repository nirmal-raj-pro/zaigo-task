@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<form method="GET">
@csrf
    <h4 class="text-center pb-4 font-weight-bold">Welcome {{ Auth::user()->name }} Admin!</h4>
            
    <div class="d-flex flex-row-reverse mb-2">
            <div class="p-2 "><a class="btn btn-secondary" href="{{ route('logout') }}"><b>Log out</b></a></div>
            <div class="p-2 "><a class="btn btn-primary" href="{{ route('newuser') }}"><b>Create User</b></a></div>
    </div>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile</th>
              <th scope="col">Role</th>
              <th scope="col" style="text-align:center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($users as $data )
              <tr>
                <th scope="row">{{ $data->id }}</th>
                <td>{{ $data->name}}</td>
                <td>{{ $data->email}}</td>
                <td>{{ $data->mobile}}</td>
                <td>{{ $data->role}}</td>
                <td style="text-align:center">
                <a class="btn btn-info mt-1" href = 'edit/{{ $data->id }}'>Edit</a>
                <a class="btn btn-info mt-1" href = 'delete/{{ $data->id }}'>Delete</a>
                </td>
              </tr>
            @empty
              <tr>  
              <td colspan="4">No Records Found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
</form>


@endsection