@extends('layouts.admin')
@section('title')
    create users
@endsection
@section('content')
    <h5>add user section</h5>
    {!! Form::open(['method'=>'POST','route'=>'users.store']) !!}
    <div class="form-group">
    {!! Form::text('name',null,['placeholder'=>'name','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::email('email',null,['placeholder'=>'email','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::password('password',['placeholder'=>'password','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::select('role_id',$roles,3,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('add',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection