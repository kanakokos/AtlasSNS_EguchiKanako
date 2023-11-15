@extends('layouts.login')

@section('content')<!-- コンテンツセクションを差し込む -->

<!--投稿フォーム-->
{!! Form::open(['url' => '/index']) !!}

@foreach($errors->all() as $error)
<li class="post-error">{{$error}}</li>
@endforeach


<!--{{ Form::submit('登録') }}-->
<!-- {{form::input('text','post',null)}} -->
{{ Form::text('post',null,['class' => 'input']) }}

<input type="image" src="images/post.png" alt="登録" width="30px" height="auto">

{!! Form::close() !!}

<!--投稿一覧-->
@foreach ($posts as $post)
<tr>
  <!-- <div>{{ $post->id}}</div> -->
  <td><a href="{{$post->user_id}}/profile"><img class="image-circle" src="{{ asset('images/' . $post->images ) }}" alt="ユーザーアイコン"></a></td>
  <td>{{ $post->user->username}}</td>
  <td>{{ $post->created_at}}</td>
  <td>{{ $post->post}}</td>
  @if(Auth::id()==$post->user_id)
  <!-- 更新ボタン -->
  <td>
    <a class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-post-id="{{ $post->id }}"><img src="images/edit.png" alt="編集"></a>
    <!-- <button type="button" class="btn" data-toggle="modal" data-target="#Modal" data-whatever="{{ $post->post }}" data-post-id="{{$post->id}}">
      <img src="{{ asset('images/edit.png') }}" alt="編集">
    </button> -->
  </td>
<!-- 削除ボタン -->
@csrf
  <td>
    <a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿をを削除します。よろしいでしょうか？')">
    <img src="images/trash.png" alt="削除"></a>
  </td>
  @endif
</tr>
@endforeach

<!-- 投稿編集モーダル -->



@endsection
