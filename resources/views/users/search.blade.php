@extends('layouts.login')

@section('content')

<!-- 検索バー -->
<div class="search_content">
  <form action="/search" method="post">
@csrf
    <div class="search_bar">
      <input type="text" name="keyword" class="form" placeholder="ユーザー名">
      <figure><input type="image" src="images/search.png" alt="検索" width="30px" style="border-radius: 10%;"></figure>
    </div>
  </form>

<!-- <form method="GET" action="{{ route('users.search') }}">
    <input type="search" placeholder="ユーザー名" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
      <input type="image" src="images/search.png" alt="検索" width="30px" height="auto">
    </div>
</form> -->

<!-- 検索結果表示 -->
@if(isset($keyword))
  <p>検索ワード：{{$keyword}}</p>
@endif
</div>


@foreach($users as $user)
@if($user->id !== Auth::id()) <!-- ログイン中のユーザーは表示しない -->
<div class="search_result">
  <div class="user_content">
    <div class="user">
      <div><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('storage/images/' . $user->images ) }}" alt="ユーザーアイコン" width="50px" height="auto"></a></div>
      <div>{{ $user->username}}</div>
    </div>
  @if(Auth::user()->isFollowing($user->id))
    <div><button type="button" class="btn btn-danger"><a href="/unfollow/{{$user->id}}" style="color: white;">フォロー解除</a></button></div>
  @else
    <div><button type="button" class="btn btn-primary"><a href="/following/{{$user->id}}" style="color: white;">フォローする</a></button></div>
  @endif
  </div>
</div>
@endif <!-- 開けたら閉じる -->
@endforeach


@endsection
