<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!-- ↓↓bootstrapのために追記↓↓ -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" >

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div class = "head">
            <!--「href="/top"」でリンク追加-->
            <div class="header_atlas_icon">
                <div><a href="/top"><img src="{{ asset('images/atlas.png') }}" width="120px" height="auto"></a></div>
            </div>
            <div class="header_user_content">
                <!--Auth::user()->DBでのテーブルのカラム名}}-->
                <div class="auth_user_name">{{Auth::user()->username}}さん</div>
                    <!--アコーディオンメニュー-->
                <div class="accordion-container">
                    <div class="menu-trigger">
                        <span></span>
                        <span></span>
                    </div>
                    <nav class="menu">
                        <ul>
                            <li><a href="/top">ホーム</a></li>
                            <li><a href="/profile/{{ Auth::user()->id }}">プロフィール編集</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
                <img src="{{ asset('storage/images/' . Auth::user()->images ) }}" width="50px" height="auto">
            </div>
        </div>
    </header>




    <div class="row">
        <div id="container">
            @yield('content')
        </div >
        <div class="side_bar">
            <div class="confirm_1">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p class="follow_count">{{ auth()->user()->followings->count() }}名</p>
                </div>
                <div class="follow_button"><button type="button" class="btn btn-primary"><a href="/followList" style="color: white;">フォローリスト</a></button></div>
                <div>
                <p>フォロワー数</p>
                <p class="follow_count">{{ auth()->user()->followers->count() }}名</p>
                </div>
                <div class="follow_button"><button type="button" class="btn btn-primary"><a href="/followerList" style="color: white;">フォロワーリスト</a></button></div>
            </div>
            <div class="confirm_2">
                <div class="search_button"></div><button type="button" class="btn btn-primary"><a href="{{ route('users.search') }}" style="color: white;">ユーザー検索</a></button>
            </div>
        </div>
    </div>


    <footer>
    </footer>
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <!-- <script src="js/script.js"></script> -->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- ↓↓bootstrapのために追記↓↓ -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>
