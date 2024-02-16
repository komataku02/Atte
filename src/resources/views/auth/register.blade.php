@extends('layouts.app2')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="registration-form-top">
    <h2 class="registration-title">会員登録</h2>
  </div>
  <form class="registration-form" action="/register" method="post">
    @csrf
    <div class="registration-form-btn">
      <input type="name" name="name" placeholder="名前" value="{{old('name')}}" />
      <input type="email" name="email" placeholder="メールアドレス" value="{{old('email')}}" />
      <input type="password" name="password" placeholder="パスワード" />
      <input type="password" name="password_confirmation" placeholder="確認用パスワード" />
      <input type="submit" name="button" value="会員登録" />
      <p>アカウントをお持ちの方はこちらから</p>
      <a class="login_registration" href="/login">ログイン</a>
    </div>
  </form>
</div>
@endsection