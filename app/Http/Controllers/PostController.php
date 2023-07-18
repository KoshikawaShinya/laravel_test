<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post){
        // withを使うことでviewに変数を渡す
        return view('posts.index')->with(['posts' => $post->getPaginateBylimit()]);
    }
}
