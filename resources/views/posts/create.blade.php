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
        <div class="card-header">投稿を新規で作成</div>
        <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea name="body" class="form-control"></textarea>
                </div>
               
              
                <div class="text-right">
                    <a href="{{route('posts.index')}}" class="btn btn-secondary">キャンセル</a>
                
                    <button type="submit" class="btn btn-primary">投稿する</button>

                </div>
        

            </form>
        </div>
    
    </div>
 </div>
        
       
        
        
  
@endsection