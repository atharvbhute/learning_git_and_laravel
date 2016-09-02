@extends('layouts.admin')
@section('title')
    create users
@endsection
@section('content')
    <h5>add user section</h5>
    {!! Form::open(['method'=>'POST','route'=>'users.store','files'=>true]) !!}
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
    <script>
        UPLOADCARE_PUBLIC_KEY = "977a7188b76de62ffe09";
        UPLOADCARE_LOCALE = 'en';
        };
    </script>
    <input type="hidden"
           role="uploadcare-uploader"
           name="image"
           data-images-only
           data-crop="1:1"
           data-clearable="true"
    />
    </div>
    <div class="form-group">
    {!! Form::select('role_id',$roles,3,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('add',['class'=>'btn btn-primary','id'=>'sweetalert']) !!}
    </div>
    {!! Form::close() !!}
@endsection