@extends('layouts.login')

@section('content')
<!-- 他ユーザーのプロフィール（ログインユーザー以外に見せたい） -->
@unless(Auth::id()==$user->id)
<img class="profile-image" src="{{ asset('images/' . $user->images) }}" alt="ユーザーアイコン">
{{ $user->username }}
<div>自己紹介文箇所{{ $user->bio }}</div>

@if(Auth::user()->isFollowing($user->id))
  <td><button type="button"><a href="/unfollow/{{$user->id}}">解除</a></button></td>
  @else
  <td><button type="button"><a href="/following/{{$user->id}}">フォロー</a></button></td>
@endif
<br>
<br>
<!-- 投稿一覧 -->
@if($user->posts->count() > 0)
@foreach($user->posts()->orderBy('id','desc')->get() as $post)
  <img class="profile-image" src="{{ asset('images/' . $user->images) }}" alt="ユーザーアイコン">
  {{ $user->username }}
  {{ $post->post }}
  {{ $post->created_at }}
<br>
@endforeach
@else
    <p>投稿がありません。</p>
@endif
@endif

<!-- ログインユーザーの表示 -->

@if(Auth::id()==$user->id)
<div>
  <div>user name</div>
  <div>mail adress</div>
  <div>password</div>
  <div>password comfirm</div>
  <div>bio</div>
  <div>icon image</div>
  <input type="submit" value="更新">
</div>

@endif

@endsection
