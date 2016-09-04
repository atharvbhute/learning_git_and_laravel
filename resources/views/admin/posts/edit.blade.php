@extends('layouts.admin')

@section('content')
    <h5>posts section</h5>

    <div class="col-sm-8">
        {!! Form::model($post,['method'=>'PATCH','route'=>['posts.update',$post->id]]) !!}
        <div class="form-group">
            {!! Form::select('category_id',$categories,null,['select category','class'=>'form-control']) !!}
        </div>
        {{--<div class="form-group">--}}
            {{--{!! Form::select('user_id',$users,null,['select user','class'=>'form-control']) !!}--}}
        {{--</div>--}}
        <div class="form-group">
            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'title']) !!}
        </div>
        <div class="form-group">
            <script>
                UPLOADCARE_PUBLIC_KEY = "977a7188b76de62ffe09";
                UPLOADCARE_LOCALE = 'en';
            </script>
            <input type="hidden"
                   role="uploadcare-uploader"
                   name="image"
                   data-images-only
                   data-crop="true"
                   data-clearable="true"
            />
        </div>
        <div class="form-group">
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-3">
        <img src="{{$post->image ? $post->image.'-/resize/250/' : 'http://placehold.it/250x250/'}}" alt="">
        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@delimage',$post->id],'onsubmit'=>'return confirm("are you sure")']) !!}
        <br>
        {!! Form::submit('delete image',['class'=>'btn btn-danger pull-right']) !!}
        {!! Form::close() !!}
    </div>
@endsection