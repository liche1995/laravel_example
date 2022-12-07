<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class PostQuery extends Controller
{
    public function query(Request $request){
        //BERAD active
        if (isset($request->active)){
            switch ($request->active) {
                case 'b':
                    return Models\Post::all();
                    

                case 'r':
                    return Models\Post::find($request->id);
                    

                case 'e':
                    $target_post = Models\Post::find($request->id);
                    $target_post->content = "this post has been edit";
                    $target_post->save();
                    return $target_post;

                case 'a':
                    $new_post = new Models\Post;
                    $new_post->content = $request->message;
                    $new_post->save();
                    return $new_post;

                case 'd':
                    $target_post = Models\Post::find($request->id);
                    $target_post->delete();
                    return "the". $request->id . "is delete";
    
                default:
                    return Models\Post::all();
            }
        }
        //nothing todo
        else {
            return Models\Post::all();
        }
    }
}
?>