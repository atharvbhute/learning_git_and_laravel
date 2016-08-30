@extends('layouts.admin')
@section('title')
    create users
@endsection
@section('content')
    <h5>add user section</h5>
    {!! Form::open(['method'=>'POST','route'=>'users.store']) !!}
    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
    {!! Form::text('name',null,['placeholder'=>'name','class'=>'form-control']) !!}
        @if($errors->has('name'))
            <span class="help-block">
                <strong>{{$errors->first('name')}}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
    {!! Form::email('email',null,['placeholder'=>'email','class'=>'form-control']) !!}
        @if($errors->has('email'))
            <span class="help-block">
                <strong>{{$errors->first('email')}}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
    {!! Form::password('password',['placeholder'=>'password','class'=>'form-control']) !!}
        @if($errors->has('password'))
            <span class="help-block">
                <strong>{{$errors->first('password')}}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
    {!! Form::select('role_id',$roles,3,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('add',['class'=>'btn btn-primary','id'=>'sweetalert']) !!}
    </div>
    {!! Form::close() !!}
    <script>
    $("#sweetalert",click(function () {
    swal("Good job!", "user is created", "success");
    }));
    </script>
@endsection