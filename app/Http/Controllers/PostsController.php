<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //追加
use App\User; //追加
use Illuminate\Support\Facades\Auth; //追加
use App\Http\Requests\PostsCreate; //追加
use Illuminate\Support\Facades\DB; //追加

class PostsController extends Controller
{
    public function index(Request $request)
    {
        // 検索フォーム用
        // $serch= $request->input('serch');
        // dd($request);

        // $query = DB::table('posts');
        
        // if($serch){
        // 全角数字を半角にする
        // $date_text = mb_convert_kana($serch,"n");    
        // $date= preg_match('/\d{4}\/\d{1,2}\/\d{1,2}/',$serch);
       
        // $query->where('created_at',$date);
        // };
        
        // $serch = $request->input('serch');

        // $query = DB::table('posts');

        // if(isset($serch)){
        //     $query->where('created_at',$request->creted_at);
        // }
        

        $posts = Auth::user()->posts()->orderBy('created_at','desc')->paginate(5);
        

        return view('posts.index',[
            'posts'=>$posts,
        ]);
    }

    public function create()
    {
        $post = new Post;

        // dd($post);

        return view('posts.create',[
            'post'=>$post,
        ]);
    }

    public function store( PostsCreate $request)
    {   

        // $this->validate($request,[
        //     'title'=>'required|max:20',
        //     'body'=>'required|max:2000',
        // ]);

        $post = new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        // $post->save();

        Auth::user()->posts()->save($post);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);


        return view('posts.show',[
            'post'=>$post,
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit',[
            'post'=>$post,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|max:20',
            'body'=>'required|max:2000',
        ]);

        $post = Post::find($id);

        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
      

        return redirect()->route('posts.index');

    }

    public function serch(Request $request)
    {
     $serch = $request->input('serch');
     $query = Post::where('created_at','LIKE',"%{$serch}%")->get();

     dd($query);
       
    }
}
