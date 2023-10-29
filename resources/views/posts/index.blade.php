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

<input type="image" src="images/post.png" alt="登録">

{!! Form::close() !!}

<!--投稿一覧-->


@endsection
