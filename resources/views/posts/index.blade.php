@extends('layouts.login')

@section('content')<!-- コンテンツセクションを差し込む -->

<!--投稿フォーム-->
{!! Form::open(['url' => '/index']) !!}

@foreach($errors->all() as $error)
<li class="post-error">{{$error}}</li>
@endforeach
<div class="auth_post">
  <div class="auth_post_content">
    <figure><img src="{{ asset('storage/images/' . Auth::user()->images ) }}" width="50px" height="50px"></figure>
    <div>{{ Form::text('post', null, ['class' => 'input', 'style' => 'border: none; height: 50px; width: 400px;', 'placeholder' => '投稿内容を入力してください']) }}</div>
    <figure><input type="image" src="images/post.png" alt="登録" width="30px" height="30px" style="border-radius: 10%;"></figure>
  {!! Form::close() !!}
  </div>
</div>
<!--投稿一覧-->


@if($posts->count() > 0)
@foreach ($posts as $post)

<div>
  <ul>
    <li class="post_block">
      <figure><img class="image-circle" src="{{ asset('storage/images/' . $post->user->images ) }}" alt="ユーザーアイコン" width="50px" height="50px"></figure>
      <div class="post_content">
        <div class="post_name">
          <div>{{ $post->user->username}}</div>
          <div>{{ $post->created_at}}</div>
        </div>
        <div>{{ $post->post}}</div>
@if(Auth::id()==$post->user_id)
  <!-- 更新ボタン -->
      <div class="auth_content">
        <div>
          <!-- data-でModalやJSに値を渡す -->
          <!-- <button type="button" class="btn" data-toggle="modal" data-target="#UpdateModal" data-post-contents="{{ $post->post }}" data-post-id="{{$post->id}}">
          <img src="{{ asset('images/edit.png') }}" alt="編集"  width="25px" height="auto">
          </button> -->
          <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('images/edit.png') }}" alt="編集"  width="30px" height="auto"></a>
        </div>
<!-- 削除ボタン -->
@csrf
        <div>
          <a class="" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿をを削除します。よろしいでしょうか？')">
          <img src="images/trash.png" alt="削除" width="30px" height="auto"></a>
        </div>
      </div>
@endif
      </div>
    </li>
  </ul>
</div>
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
      <figure><input type="image" src="images/edit.png" alt="更新" width="30px" height="30px" style="border-radius: 10%;"></figure>
      {{ csrf_field() }}
    </form>
    <!-- <a class="js-modal-close" href="">閉じる</a> -->
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

@else
    <p>投稿がありません。</p>
@endif

@endsection
