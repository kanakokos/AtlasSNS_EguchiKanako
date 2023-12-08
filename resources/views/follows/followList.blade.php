@extends('layouts.login')

@section('content')

@foreach($followingUsers as $user)
<tr>
  <td><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('images/' . $user->images ) }}" alt="ユーザーアイコン"></a></td>
</tr>
@endforeach
<br>
<br>
@foreach($followingUsers as $user)
<tr>
  <td><a href="/profile/{{$user->id}}"><img class="image-circle" src="{{ asset('images/' . $user->images ) }}" alt="ユーザーアイコン"></a></td>
  <td>{{ $user->username }}</td>
  @if($user->posts->count() > 0)
    @foreach($user->posts()->latest()->limit(1)->get() as $post)
    <td>{{ $post->created_at }}</td>
    <td>{{ $post->post }}</td>
    </tr><br>
    @endforeach
  @else
    <td>投稿がありません</td><br>
  @endif

@endforeach



@endsection
