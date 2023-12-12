@extends('layouts.login')

@section('content')

@foreach($followerUsers as $user)
<tr>
  <td><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('images/' . $user->images ) }}" alt="ユーザーアイコン"></a></td>
</tr>
@endforeach
<br>
<br>
@foreach ($posts as $post)
<tr>
  <td><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('images/' . $post->user->images ) }}" alt="ユーザーアイコン"></a></td>
  <td>{{ $post->user->username}}</td>
  <td>{{ $post->created_at}}</td>
  <td>{{ $post->post}}</td>
</tr><br>

@endforeach

@endsection
