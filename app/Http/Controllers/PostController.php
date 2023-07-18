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
    
    // 暗黙の結合(ルートパラメータと関数の引数の名前が同じ)
    /**
    * 特定IDのpostを表示する
    *
    * @params Object Post // 引数の$postはidを指定したのPostインスタンス
    * @return Reposnse post view
    */
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
}
