@extends('layouts.login')

@section('content')

<!-- 検索バー -->
<form action="/search" method="post">
  @csrf
  <input type="text" name="keyword" class="form" placeholder="ユーザー名">
  <input type="image" src="images/search.png" alt="検索" width="30px" height="auto">
</form>

<!-- <form method="GET" action="{{ route('users.search') }}">
    <input type="search" placeholder="ユーザー名" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
      <input type="image" src="images/search.png" alt="検索" width="30px" height="auto">
    </div>
</form> -->

<!-- 検索結果表示 -->
<p>検索ワード：{{$keyword}}</p>
@foreach($users as $user)
@if($user->id !== Auth::id()) <!-- ログイン中のユーザーは表示しない -->
<tr>
  <td><img class="image-circle" src="{{ asset('images/' . $user->images ) }}" alt="ユーザーアイコン"></td>
  <td>{{ $user->username}}</td>
  @if(Auth::user()->isFollowing($user->id))
  <td><button type="button"><a href="/unfollow/{{$user->id}}">解除</a></button></td>
  @else
  <td><button type="button"><a href="/following/{{$user->id}}">フォロー</a></button></td>
  @endif
</tr>
@endif <!-- 開けたら閉じる -->
@endforeach

@endsection
