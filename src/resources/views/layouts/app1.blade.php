<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  @yield('css')
  <title>Atte</title>
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <h1 class="header-tittle"><a class="header-tittle" href="/">Atte</a></h1>
      <form action="" method="post" class="h-adr" name="Atte"></form>
      <nav class="header-nav">
        <ul class="header-nav-list">
          @if (Auth::check())
          <li class="header-nav-item"><a class="header-nav-item-link" href="{{ route('index') }}">ホーム</a></li>
          <li class="header-nav-item"><a class="header-nav-item-link" href="{{ route('show') }}">日付一覧</a></li>
          <li class="header-nav-item">
            <form action="/logout" method="post">
              @csrf
              <button class="header-nav-item-link">ログアウト</button>
          </li>
          </form>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </header>
  <main class="main">
    @yield('content')
  </main>

  <footer>
    <p class="footer">Atte,inc</p>
  </footer>

</body>

</html>