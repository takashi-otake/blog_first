@extends('layouts.app')

@section('content')
<div class="container mt-4">
   <div class="card mb-4">
        <div class="card-header">タイトル：{{$post->title}}</div>
        <div class="card-body">
            {{$post->body}}
        </div>
        <div class="card-footer">
           投稿日時：{{$post->created_at->format('Y-m-d')}}
        </div>
   </div>
   <div class="container">
        <div class="row">
            <div class="btn-toolbar">
               
                    <a href="{{route('posts.index')}}" class="btn btn-secondary mr-2">一覧へ戻る</a>
                    <form action="{{route('posts.edit',['id'=>$post->id])}}" method="GET">
                    @csrf
                        <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-pencil-alt"></i> 変更</button>
                    </form>
                
                
                    <form action="{{route('posts.destroy',['id'=>$post->id])}}" id="delete_{{$post->id}}" method="POST">
                    @csrf
                        <!-- <button type="submit" class="btn btn-danger">削除</button> -->
                        <a href="#" class="btn btn-danger" data-id="{{$post->id}}" onclick="deletePost(this);"><i class="fas fa-trash-alt"></i> 削除</a>
                    </form>
              
            </div>          
        </div>
   </div>          
</div>

<script>
function deletePost(e){
    'use strict';
    if(confirm('本当に削除していいですか？')){
        document.getElementById('dekete'+e.dataset.id).submit();
    }
}
</script>
@endsection