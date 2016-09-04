<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts=Post::where('user_id',$user->id)->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        $categories = Category::pluck('name','id');
        return view('admin.posts.create',compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $user =  Auth::user();
        $all = $request->all();
        $user->post()->create($all);
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::pluck('name','id');
        $categories = Category::pluck('name','id');
        return view('admin.posts.edit',compact('post','users','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        $all = $request->all();
        if($all['image']==""){
            $all['image']=$post->image;
        }
        $all['user_id']=$user->id;
        $post->update($all);
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect(route('posts.index'));
    }

    public function delimage($id){
        Post::find($id)->update(['image'=>""]);
        return redirect(route('posts.edit',$id));
    }
}
