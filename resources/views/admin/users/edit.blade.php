@extends('layouts.admin')
@section('title')
    edit user users
@endsection
@section('content')
    <h4>edit user section</h4>
    <div class="col-sm-3">
        <img width="200px" src="{{empty($user->image) ? 'http://image.shutterstock.com/z/stock-vector-male-profile-picture-placeholder-vector-illustration-design-social-profile-template-avatar-450966898.jpg' : $user->image.'-/resize/200x200/-/quality/lightest/'}}" alt="">
    </div>
    <div class="col-sm-9">
    {!! Form::model($user,['method'=>'PUT','route'=>['users.update',$user->id],'files'=>true]) !!}
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
   <div class="form-group">
   <h5 class="alert alert-danger">you cant edit password the one way is to reset password</h5>
   </div>
    <div class="form-group">
        <script>
            UPLOADCARE_PUBLIC_KEY = "977a7188b76de62ffe09";
            UPLOADCARE_LOCALE = 'en';
            UPLOADCARE_LIVE = false;
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
        {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('update',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    </div>

@endsection