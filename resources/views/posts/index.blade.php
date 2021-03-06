@extends('layouts.app')

@section('content')

   <a href="{{route('posts.create')}}" class="btn btn-primary">新規投稿</a>
   
   @isset($serch_result)
   <div class="alert alert-warning mt-2" role="alert"><h5 class="pt-2">{{$serch_result}}</h5></div>
   @endisset
  
   <div class="container mt-4">
        @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    タイトル：{{$post->title}}
                </div>
                <div class="card-body">
                    {!! nl2br(e(Str::limit($post->body, 100))) !!}
                </div>
                <a href="{{route('posts.show',['id'=> $post->id])}}" class="text-right">続きを読む</a>
                
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時：{{$post->created_at->format('Y-m-d')}}
                    </span>
                    
                    <span></span>
                </div>
            </div>
        @endforeach
   </div>

   {{ $posts->appends(request()->input())->links('pagination::bootstrap-4') }}
@endsection

