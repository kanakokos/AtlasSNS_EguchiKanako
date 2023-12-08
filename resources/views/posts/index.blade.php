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
  <td><a href="/profile"><img class="image-circle" src="{{ asset('images/' . $post->user->images ) }}" alt="ユーザーアイコン"></a></td>
  <td>{{ $post->user->username}}</td>
  <td>{{ $post->created_at}}</td>
  <td>{{ $post->post}}</td>
  @if(Auth::id()==$post->user_id)
  <!-- 更新ボタン -->
      <td> <!-- data-でModalやJSに値を渡す -->
        <!-- <button type="button" class="btn" data-toggle="modal" data-target="#UpdateModal" data-post-contents="{{ $post->post }}" data-post-id="{{$post->id}}">
          <img src="{{ asset('images/edit.png') }}" alt="編集"  width="25px" height="auto">
        </button> -->
        <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('images/edit.png') }}" alt="編集"  width="25px" height="auto"></a>

      </td>
<!-- 削除ボタン -->
@csrf
  <td>
    <a class="" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿をを削除します。よろしいでしょうか？')">
    <img src="images/trash.png" alt="削除" width="25px" height="auto"></a>
  </td>

  @endif
</tr><br>
@endforeach

<!-- 投稿編集モーダル -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <!-- <form action="{{ route('update', ['id' => $post->id ]) }}" method="post"> -->
    <!-- /post/{{$post->id}}/delete ⇐モーダルですでに切り分けてるので不要 -->
      <form action="/post/update" method="post">
      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="">
      <input type="submit" value="更新">
      {{ csrf_field() }}
    </form>
    <a class="js-modal-close" href="">閉じる</a>
  </div>
</div>


<!-- <div class="modal fade" id="UpdateModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">編集</h4>
      </div>

      <form action="{{ route('update', ['id' => $post->id ]) }}" method="post">
        <div class="modal-body">
          <input type="hidden" name="_method" value="PUT">
          <input id="id" class="form-control" type="hidden" name="id" value="">
          <input id="post" class="form-control" type="text" name="upPost" value="">

        </div>

        <div class="modal-footer">
            <button type="button" class="btn">
            <img src="{{ asset('images/edit.png') }}" alt="編集"  width="25px" height="auto">

          </button>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div> -->



@endsection
