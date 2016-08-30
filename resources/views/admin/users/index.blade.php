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
            <th>name</th>
            <th>Email</th>
            <th>status</th>
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
                   <td>{{empty($user->role->name)?"user has no role" : $user->role->name}}</td>
                   <td>{{$user->created_at->diffForHumans()}}</td>
                   <td>{{$user->updated_at->diffForHumans()}}</td>
                   <td>
                   {!! Form::open(['method'=>'DELETE','route'=>['users.destroy',$user->id]]) !!}
                       {{--<button type="submit">--}}
                           {{--<span class="glyphicon glyphicon-trash"></span>--}}
                       {{--</button>--}}
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