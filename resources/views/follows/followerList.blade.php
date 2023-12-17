@extends('layouts.login')

@section('content')

<div class="user_list">
  <p>Follower List</p>
  <div class="list_icon">
@foreach($followerUsers as $user)
    <figure><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('storage/images/' . $user->images ) }}" alt="ユーザーアイコン" width="50px" height="50px"></a></figure>
@endforeach
  </div>
</div>

@foreach ($posts as $post)
<div>
  <ul>
    <li class="post_block">
      <figure><a href="/profile/{{$post->user->id}}"><img class="image-circle" src="{{ asset('storage/images/' . $post->user->images ) }}" alt="ユーザーアイコン" width="50px" height=""></a></figure>
      <div class="post_content">
        <div class="post_name">
          <div>{{ $post->user->username}}</div>
          <div>{{ $post->created_at}}</div>
        </div>
        <div>{{ $post->post}}</div>
      </div>
    </li>
  </ul>
</div>

@endforeach

@endsection
