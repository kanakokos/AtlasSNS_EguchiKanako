
<div class="logout_container">

@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}


  <div class="logout_form_content">
    <p>新規ユーザー登録</p>
    <div class="logout_form">

@foreach($errors->all() as $error)
      <li class="register_error">{{$error}}</li>
@endforeach

      <p>{{ Form::label('username') }}</p>
      <div>{{ Form::text('username',null,['class' => 'input', 'style' => 'border-radius: 4px; border: none;']) }}</div>

      <p>{{ Form::label('mail') }}</p>
      <div>{{ Form::text('mail',null,['class' => 'input', 'style' => 'border-radius: 4px; border: none;']) }}</div>

      <p>{{ Form::label('password') }}</p>
      <div>{{ Form::password('password', ['class' => 'input', 'style' => 'border-radius: 4px; border: none;']) }}</div>

      <p>{{ Form::label('password comfirm') }}</p>
      <div>{{ Form::text('password_confirmation',null,['class' => 'input', 'style' => 'border-radius: 4px; border: none;']) }}</div>

      <div>{{ Form::submit('REGISTER', ['class' => 'custom_button']) }}</div>

      <p class="move_link"><a href="/login">ログイン画面へ戻る</a></p>
    </div>
  </div>
{!! Form::close() !!}
</div>

@endsection
