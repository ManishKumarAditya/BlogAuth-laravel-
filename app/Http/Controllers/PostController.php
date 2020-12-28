<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['record']=Post::all();
        return view('work.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guest()){
            return redirect()->route('login');
        }   
       return view('work.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::guest()){
            return redirect()->route('login');
        }
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'image'=>'required|mimes:jpg,png'
        ]);
        $filename=time() . "." .$request->image->extension();
        $request->image->move(public_path('images'),$filename);
        Post::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'body'=>$request->body,
            'image'=>$filename,
            'user_id'=>Auth::id()
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data['req']=$post;
        return view('work.view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['data']=$post;
        return view('work.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'image'=>'required|mimes:jpg,png'
        ]);
        $filename=time(). "." .$request->image->extension();
        $request->image->move(public_path('images'),$filename);
        Post::find($post->id)->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'body'=>$request->body,
            'image'=>$filename,
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}
