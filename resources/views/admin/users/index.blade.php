@extends('layouts.admin')
@section('title')
    user
@endsection
@section('content')
    <a href="{{route('users.create')}}" class="btn btn-primary pull-left">add users</a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>Email</th>
            <th>activity</th>
            <th>role</th>
            <th>created at</th>
            <th>updated at</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
              <tr>
                   <td>{{$user->id}}</td>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->is_active == 1 ? 'active' : 'not active now'}}</td>
                   <td>{{$user->role->name}}</td>
                   <td>{{$user->created_at->diffForHumans()}}</td>
                   <td>{{$user->updated_at->diffForHumans()}}</td>
               </tr>
            @endforeach
        @endif
        </tbody>
      </table>

@endsection