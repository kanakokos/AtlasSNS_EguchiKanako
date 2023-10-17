
<div class="login-container">

@extends('layouts.logout') <!--親のファイルを継承-->

@section('content') <!--入口-->

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => route('login')]) !!}



  <div class="login-form-content">
    <p>AtlasSNSへようこそ</p>
    <div class="login-form">

      <p>{{ Form::label('mail', 'E-mail') }}</p>
      <div>{{ Form::text('mail',null,['class' => 'input']) }}</div>
      <p>{{ Form::label('password') }}</p>
      <div>{{ Form::password('password',['class' => 'input']) }}</div>

      <div>{{ Form::submit('ログイン') }}</div>

      <p><a href="/registerView">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
    </div>
  </div>
</div>

@endsection <!--出口-->
