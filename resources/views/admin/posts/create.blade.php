@extends('layouts.admin')

@section('content')
    <h5>posts section</h5>

    <div class="col-sm-8">

    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store']) !!}
        <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}}">
        {!! Form::select('category_id',$categories,null,['select category','class'=>'form-control']) !!}
            @if($errors->has('category_id'))
                <span class="help-block">
                <strong>category is required</strong>
            </span>
            @endif
        </div>
        {{--<div class="form-group {{$errors->has('user_id') ? 'has-error' : ''}}">--}}
        {{--{!! Form::select('user_id',$users,null,['select user','class'=>'form-control']) !!}--}}
            {{--@if($errors->has('category_id'))--}}
                {{--<span class="help-block">--}}
                {{--<strong>user is required</strong>--}}
            {{--</span>--}}
            {{--@endif--}}
        {{--</div>--}}
        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
            {!! Form::text('title',null,['placeholder'=>'title','class'=>'form-control']) !!}
            @if($errors->has('title'))
                <span class="help-block">
                <strong>{{$errors->first('title')}}</strong>
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
        <div class="form-group {{$errors->has('body') ? 'has-error' : ''}}">
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            @if($errors->has('body'))
                <span class="help-block">
                <strong>{{$errors->first('body')}}</strong>
            </span>
            @endif
        </div>
    <div class="form-group">
        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
    </div>
        {!! Form::close() !!}
    </div>
@endsection