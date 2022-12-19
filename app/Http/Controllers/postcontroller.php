<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postcontroller extends Controller
{      
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("post.index", ["posts"=>Post::cursor()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = \Auth::user();
        if(is_null($user)){
            return redirect(route('login'));
        }
        else{
            return view("post.create");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $new_post = new Post;
        $new_post->content = $request->input("content");
        $new_post->subjects_id = 0;
        $new_post->user_id = \Auth::id();
        $new_post->save();
        echo "complete";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view("post.show", ["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Auth's controller directory is same level with this controller, and Auth is a directory, so use Auth function shoud add '\'
        $user = \Auth::user();
        // check is login
        if (is_null($user)){
            return redirect(route('login'));
        }
        // check edit auth
        else{
            if($user->cant('update', $post)){
                return redirect(route("post.index"));
            }
            else{
                return view("post.edit", ["post"=>$post]);
            }
        }
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
        //
        $post->content = $request->input('content');
        $post->save();
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect(route("post.index"));
    }
}
?>