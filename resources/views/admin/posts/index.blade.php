@extends('layouts.admin')

@section('content')
    <h5>posts</h5>
    <a href="{{route('posts.create')}}" class="btn btn-primary">add posts</a>
    <table class="table">
        <thead>
        <th>id</th>
        <th>user</th>
        <th>category</th>
        <th>title</th>
        <th>image</th>
        <th>body</th>
        <th>edit</th>
        <th>delete</th>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->title}}</td>
                        <td><img src="{{$post->image ? $post->image.'-/resize/50/' : 'http://placehold.it/60x60'}}" alt=""></td>
                        <td>{!! $post->body !!}</td>
                        <td><a href="{{route('posts.edit',$post->id)}}"><i class="glyphicon glyphicon-edit"></i></a></td>

                        <td>
                            {!! Form::open(['method'=>'DELETE','route'=>['posts.destroy',$post->id],'onsubmit'=>'return confirm("are you sure")']) !!}
                            <div class="circle">
                                <button type="submit" class="submit-with-icon" id="delete-confo">
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