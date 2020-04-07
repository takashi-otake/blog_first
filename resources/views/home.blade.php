@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><i class="far fa-address-book"></i>　ユーザー情報</div>
    <div class="card-body">
        <p><i class="fas fa-user"></i>　ユーザー名：{{Auth::user()->name}}</p>
        <p><i class="far fa-envelope"></i>　登録メールアドレス：{{Auth::user()->email}}</p>
    </div>
    <div class="card-footer">
        <a href="{{route('posts.create')}}" class="btn btn-primary">
            投稿作成ページへ
        </a>
    </div>
</div>                    
@endsection
