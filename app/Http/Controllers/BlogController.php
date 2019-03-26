<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::latest()->paginate(10);

        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){
       //fetch from the DB based on sljug
        $post = Post::where('slug','=',$slug)->first();

       //retun the view and pass in the post in the post object
        return view('blog.single')->withPost($post);
    
    }

}
