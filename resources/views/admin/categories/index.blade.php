@extends('layouts.admin')
@section('content')
    <h4>categories</h4>
    <div class="col-md-6">
        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::text('name',null,['required'=>'required','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @if(session('edit_message'))
        <div class="col-md-6">
            {!! Form::model($category,['method'=>'PUT','action'=>['AdminCategoriesController@update',$category->id]]) !!}
            <div class="form-group">
                {!! Form::text('name',null,['required'=>'required','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    @endif
    <div class="col-md-6">
        <table class="table">
            <thead>
            <th>id</th>
            <th>name</th>
            <th>created</th>
            <th>updated</th>
            </thead>
            @foreach($categories as $category)
            <tbody>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at->diffForHumans()}}</td>
            <td>{{$category->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('categories.edit',$category->id)}}"><i class="glyphicon glyphicon-edit"></i></a></td>
            <td>
                {!! Form::open(['method'=>'DELETE','route'=>['categories.destroy',$category->id],'onsubmit'=>'return confirm("are you sure")']) !!}
                <div class="circle">
                    <button type="submit" class="submit-with-icon" id="delete-confo">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </div>
                {!! Form::close() !!}
            </td>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection