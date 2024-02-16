<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  @yield('css')
  <title>Atte</title>
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <h1 class="header-tittle"><a class="header-tittle" href="/">Atte</a></h1>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p class="footer">Atte,inc</p>
  </footer>

</body>

</html>