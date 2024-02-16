@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="container">
  <form class="login-form" action="/login" method="post">
    @csrf
    <div class="login-form-top">
      <h2 class="login-title">ログイン</h2>
    </div>
    <div class="login-form-btn">
      <input type="email" id="email" name="email" placeholder="メールアドレス" value="{{ old('email')}}" />
      <input type="password" id="password" name="password" placeholder="パスワード" />
      <input type="submit" name="button" value="ログイン" />
      <p>アカウントをお持ちでない方はこちらから</p>
      <a class="member_registration" href="/register">会員登録</a>
    </div>
  </form>
</div>
@endsection