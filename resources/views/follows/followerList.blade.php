@extends('layouts.login')

@section('content')

@foreach($followerUsers as $user)
<tr>
  <td><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('images/' . $user->images ) }}" alt="ユーザーアイコン"></a></td>
</tr>
@endforeach
<br>
<br>
@foreach($followerUsers as $user)
@foreach($user->posts()->orderBy('id','desc')->get() as $post)
<tr>
  <td><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('images/' . $user->images ) }}" alt="ユーザーアイコン"></a></td>
  <td>{{ $user->username }}</td>
  <td>{{ $post->created_at }}</td>
  <td>{{ $post->post }}</td>
</tr><br>
@endforeach
@endforeach



@endsection
