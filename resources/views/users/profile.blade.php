@extends('layouts.login')

@section('content')
<!-- 他ユーザーのプロフィール（ログインユーザー以外に見せたい） -->
@unless(Auth::id()==$user->id)
<img class="profile-image" src="{{ asset('storage/images/' . $user->images) }}" alt="ユーザーアイコン" width="50px" height="auto">
{{ $user->username }}
<div>{{ $user->bio }}</div>

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
  <img class="profile-image" src="{{ asset('storage/images/' . $user->images) }}" alt="ユーザーアイコン" width="50px" height="auto">
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
<form action="/profile/update" method="post" enctype="multipart/form-data">  <!-- foamタグないとだめ -->
  @csrf
@foreach($errors->all() as $error)
<div class="profile-error">{{$error}}</div>
@endforeach


<div>
  <p>name</p>
  <input type="text" name="username" value="{{ $user->username }}" />
  <p>mail</p>
  <input type="text" name="mail" value="{{ $user->mail }}" />
  <p>password</p>
  <input type="password" name="newpassword" value="" />
  <p>password comfirm</p>
  <input type="password" name="newpassword_confirmation" value="" />
  <p>bio</p>
  <input type="text" name="bio" value="{{ $user->bio }}" />
  <p>icon image</p>
  <input type="file" class="custom-file-input" id="inputFile" name="iconimage">
  <input type="submit" value="更新">
</div>
</form>



@endif

@endsection
