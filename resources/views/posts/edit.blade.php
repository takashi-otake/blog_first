@extends('layouts.app')

@section('content')

    @if(count($errors)>0)
        <ul class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <li class="ml-4">{{$error}}</li>
            @endforeach
        </ul>
    @endif
   <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">編集画面です</div>
            <div class="card-body">
                <form action="{{route('posts.update',['id'=>$post->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                        <label for="body">本文</label>
                        <textarea name="body" class="form-control">{{$post->body}}</textarea>
                    </div>

                    <div class="text-right">
                        <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-secondary">戻る</a>

                        <button type="submit" class="btn btn-primary" >更新</button>
                    </div>

                </form>
            </div>
        </div>
   </div>
    
@endsection