<!DOCTYPE html>
<html lang ="ja">
    <head>
        <meta charset="UTF-8">
        <title>blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    </head>
    <body>
        <header class="mb-4">
            <nav class="navbar navbar-expand-sm navbar-light bg-secondary">
                <a class="navbar-brand text-white" href="#">Diary <i class="fas fa-book"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        @if(Auth::check())
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="{{route('posts.index')}}">投稿一覧へ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/">{{Auth::user()->name}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white" id="logout">ログアウト</a>
                                <form action="{{route('logout')}}" method="POST" id="logout-form" style="display:none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <form action="{{route('posts.serch')}}" method="GET" class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="日付検索"  id="serch" name="serch" value="{{old('serch')}}">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                        </form>

                        @else
                        <a class="my-navbar-item text-white mr-2" href="{{ route('login') }}">ログイン</a>
                        <a class="my-navbar-item text-white" href="{{ route('register') }}">新規登録</a>
                        @endif
                </div>
            </nav>
        </header>
        <div class="container">
            @yield('content')
        </div>
    
        @if(Auth::check())
        <script>
            document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
            });
        </script>
        @endif
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

        <!-- flatpickrスクリプト -->
        <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
        <!-- 日本語化のための追加スクリプト -->
        <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
         <script>
            flatpickr(document.getElementById('serch'), {
            locale: 'ja',
            dateFormat: "Y-m-d",
            // minDate: new Date()
        });
       </script>

    
    </body>
</html>