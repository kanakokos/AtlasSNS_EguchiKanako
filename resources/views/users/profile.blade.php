@extends('layouts.login')

@section('content')
<!-- 他ユーザーのプロフィール（ログインユーザー以外に見せたい） -->
@unless(Auth::id()==$user->id)
<div class="user_profile">
  <div class="user_profile_container">
    <figure><img class="profile-image" src="{{ asset('storage/images/' . $user->images) }}" alt="ユーザーアイコン" width="50px" height="auto"></figure>
    <div class="user_profile_content">
      <div>
        <p>name</p>
        <p>bio</p>
      </div>
      <div class="user_name_bio">
        <p>{{ $user->username }}</p>
        <p>{{ $user->bio }}</p>
      </div>
    </div>
@if(Auth::user()->isFollowing($user->id))
    <div>
      <div><button type="button" class="btn btn-danger"><a href="/unfollow/{{$user->id}}" style="color: white;">フォロー解除</a></button></div>
@else
      <div><button type="button" class="btn btn-primary"><a href="/following/{{$user->id}}" style="color: white;">フォローする</a></button></div>
    </div>
@endif
  </div>

<!-- 投稿一覧 -->
@if($user->posts->count() > 0)
@foreach($user->posts()->orderBy('id','desc')->get() as $post)
<div>
  <ul>
    <li class="post_block">
      <figure><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('storage/images/' . $post->user->images ) }}" alt="ユーザーアイコン" width="50px" height="auto"></a></figure>
      <div class="post_content">
        <div class="post_name">
          <div>{{ $user->username }}</div>
          <div>{{ $post->created_at->format('Y-m-d H:i')  }}</div>
        </div>
        <div>{!! nl2br(e($post->post)) !!}</div>
      </div>
    </li>
  </ul>
</div>

@endforeach
@else
<div class="post_not_find">
  <p></p>
</div>

@endif

@endif






<!-- ログインユーザーの表示 -->
@if(Auth::id()==$user->id)
<div class="profile_edit">
  <form action="/profile/update" method="post" enctype="multipart/form-data">  <!-- foamタグないとだめ -->
@csrf
@foreach($errors->all() as $error)
    <div class="profile-error">{{$error}}</div>
@endforeach
    <div class="profile_edit_content">
      <div class="profile_edit_container">
        <div><img src="{{ asset('storage/images/' . Auth::user()->images ) }}" width="50px" height="auto"></div>
        <div class="profile_edit_form">
          <div>
            <p>name</p>
            <input type="text" class="profile_input" name="username" value="{{ $user->username }}" />
          </div>
          <div>
            <p>mail</p>
            <input type="text" class="profile_input" name="mail" value="{{ $user->mail }}" />
          </div>
          <div>
            <p>password</p>
            <input type="password" class="profile_input" name="newpassword" value="" />
          </div>
          <div>
            <p>password comfirm</p>
            <input type="password" class="profile_input" name="newpassword_confirmation" value="" />
          </div>
          <div>
            <p>bio</p>
            <input type="text" class="profile_input" name="bio" value="{{ $user->bio }}" />
          </div>
          <div>
            <p>icon image</p>
            <input type="file" class="profile_input" name="iconimage">
          </div>
        </div>
      </div>
    </div>
    <div class="profile_edit_button">
      <input type="submit" class="btn btn-danger" value="更新">
    </div>
  </form>
</div>

@endif
@endsection
