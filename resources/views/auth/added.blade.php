
<div class="logout_container">

@extends('layouts.logout')

@section('content')

  <div id="clear">
    <div class="logout_form_content">
      <p>{{session('username')}}さん</p>
      <p>ようこそ！AtlasSNSへ！</p>
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
      <p class="custom_button"><a href="/login">ログイン画面へ</a></p>
    </div>
  </div>
</div>

@endsection
