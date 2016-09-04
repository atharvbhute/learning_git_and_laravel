@extends('layouts.admin')


@section('content')

    <h3>photos</h3>
    <div class="col-sm-3">
        {!! Form::open(['method'=>'POST','action'=>'AdminPhotoController@store']) !!}
        <div class="form-group">
            <script>
                UPLOADCARE_PUBLIC_KEY = "977a7188b76de62ffe09";
                UPLOADCARE_LOCALE = 'en';
            </script>
            <input type="hidden"
                   role="uploadcare-uploader"
                   name="photo"
                   data-images-only
                   data-crop="1:1"
                   data-clearable="true"
            />
        </div>
        {!! Form::submit('add',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-sm-9">
        @if($photos)
            @foreach($photos as $photo)
                <div class="col-sm-3 thumbnail">
                <img src="{{$photo->photo ? $photo->photo.'-/resize/200/' : 'http://placehold.it/200x200'}}" alt="">
                {!! Form::open(['method'=>'DELETE','action'=>['AdminPhotoController@destroy',$photo->id],'onsubmit'=>'return confirm("are you sure")']) !!}
                <br>
                {!! Form::submit('delete image',['class'=>'btn btn-danger pull-right']) !!}
                {!! Form::close() !!}
                </div>
            @endforeach
        @endif
    </div>

@endsection