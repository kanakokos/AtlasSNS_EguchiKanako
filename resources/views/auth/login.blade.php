
<div class="logout_container">

@extends('layouts.logout') <!--親のファイルを継承-->

@section('content') <!--入口-->

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => route('login')]) !!}

  <div class="logout_form_content">
    <p>AtlasSNSへようこそ</p>
    <div class="logout_form">

      <p>{{ Form::label('mail', 'E-mail') }}</p>
      <div>{{ Form::text('mail', null, ['class' => 'input', 'style' => 'border-radius: 4px; border: none;']) }}</div>
      <p>{{ Form::label('password') }}</p>
      <div>{{ Form::password('password',['class' => 'input', 'style' => 'border-radius: 4px; border: none;']) }}</div>

      <div>{{ Form::submit('LOGIN', ['class' => 'custom_button']) }}</div>

      <p class="move_link"><a href="/register">新規ユーザーの方はこちら</a></p>
    </div>
  </div>

{!! Form::close() !!}
</div>

@endsection <!--出口-->
