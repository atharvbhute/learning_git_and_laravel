@extends('layouts.admin')
@section('title')
    user
@endsection
@section('content')
    @if(session('message'))
        <script>
            swal({
                title: "{!! session('message') !!}",
                type : "success"
            });
        </script>
    @endif
    <a href="{{route('users.create')}}" class="btn btn-primary pull-left">add users</a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>id</th>
            <th>prifile pic</th>
            <th>name</th>
            <th>Email</th>
            <th>status</th>
            <th>role</th>
            <th>created at</th>
            <th>updated at</th>
            <th>edit</th>
            <th>delete</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
              <tr>
                   <td>{{$user->id}}</td>
                   <td><img width="65px" src="{{empty($user->image) ? 'http://image.shutterstock.com/z/stock-vector-male-profile-picture-placeholder-vector-illustration-design-social-profile-template-avatar-450966898.jpg' : $user->image.'-/resize/62x62/-/quality/best/'}}" alt=""></td>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->is_active == 1 ? 'active' : 'not active now'}}</td>
                   <td>{{empty($user->role->name)?"user has no role" : $user->role->name}}</td>
                   <td>{{$user->created_at->diffForHumans()}}</td>
                   <td>{{$user->updated_at->diffForHumans()}}</td>
                  <td><a href="{{route('users.edit',$user->id)}}"><i class="glyphicon glyphicon-edit"></i></a></td>
                  <td>
                   {!! Form::open(['method'=>'DELETE','route'=>['users.destroy',$user->id]]) !!}
                       <div class="circle">
                           <button type="submit" class="submit-with-icon">
                               <span class="glyphicon glyphicon-trash"></span>
                           </button>
                       </div>
                   {!! Form::close() !!}
                   </td>
              </tr>
            @endforeach
        @endif
        </tbody>
      </table>

@endsection