@extends('layouts.login')

@section('content')

<img class="profile-image" src="{{ asset('images/' . $user->images) }}" alt="ユーザーアイコン">
{{ $user->username }}
<div>自己紹介文箇所{{ $user->bio }}</div>

@if(Auth::user()->isFollowing($user->id))
  <td><button type="button"><a href="/unfollow/{{$user->id}}">解除</a></button></td>
  @else
  <td><button type="button"><a href="/following/{{$user->id}}">フォロー</a></button></td>
@endif


@endsection
