<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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
    
    // 登録画面
    public function create()
    {
        return view('posts.create');
    }
    
    // 登録操作
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    // 編集画面
    public function edit(Post $post){
        return view('posts.edit')->with(['post' => $post]);
        
    }
    
    // 編集操作
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    // 削除操作
    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
}
