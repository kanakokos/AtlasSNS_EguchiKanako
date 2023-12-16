@extends('layouts.login')

@section('content')

@foreach($followerUsers as $user)
<tr>
  <td><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('storage/images/' . $user->images ) }}" alt="ユーザーアイコン" width="50px" height="auto"></a></td>
</tr>
@endforeach
<br>
<br>
@foreach ($posts as $post)
<div>
  <ul>
    <li class="post-block">
      <figure><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('storage/images/' . $post->user->images ) }}" alt="ユーザーアイコン" width="50px" height="auto"></a></figure>
      <div class="post-content">
        <div class="post-name">
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
