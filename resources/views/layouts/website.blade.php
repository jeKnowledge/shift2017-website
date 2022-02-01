<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shift Appens</title>
    <link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>
    <link rel="stylesheet" href="/css/website.css">
    </head>
    <body class='{{ $bgColor }} {{ $page }} website'>
        <header class='z-index {{ $bgColor }}'>
            <button class="c-hamburger c-hamburger--htx ml-20">
              <span>toggle menu</span>
            </button>
            <div class='header-main-menu'>
              <nav class='fvw'>
                  <a class='upper {{ $page == 'index' ? $activeColor : $fontColor }}' href="{{ url('/') }}">Inicio</a>
                  <a class='upper {{ $page == 'about' ? $activeColor : $fontColor }}' href="{{ url('about') }}" >Sobre</a>
                  {{-- <a class='upper {{ $page == 'competition' ? $activeColor : $fontColor }}' href="{{ url('competition') }}">Competição</a> --}}
                  <a class='upper {{ $page == 'faq' ? $activeColor : $fontColor }}' href="{{ url('faqs') }}">FAQ</a>
                  <a class='upper {{ $page == 'schedule' ? $activeColor : $fontColor }}' href="{{ url('schedule') }}">Programa</a>
                  {{-- <a class='upper {{ $page == 'wall' ? $activeColor : $fontColor }}' href="{{ url('wall') }}">Social Wall</a> --}}
                  {{-- <a class='upper {{ $page == 'badges' ? $activeColor : $fontColor }}'>Badges</a>
                  <a class='upper {{ $page == 'jury' ? $activeColor : $fontColor }}'>Júri</a> --}}
                  @if(Auth::user())
                    <a href='{{ url('/platform') }}' class='upper {{ $fontColor }}'>Entrar</a>
                  @else
                    <a href='{{ url('/auth/login') }}' class='upper {{ $fontColor }}'>Entrar</a>
                  @endif
              </nav>
          </div>
        </header>
        <main>
            @yield('content')
        </main>

        <footer class='bg-red flex dir-row wrap jus-between al-center'>
            <nav>
                <a class="white" href="http://2014.shiftappens.com">Shift 2014</a>
                <a class="white" href="http://2015.shiftappens.com">Shift 2015</a>
                <a class="white" href="http://2016.shiftappens.com">Shift 2016</a>
            </nav>
            {{-- <nav>
                <a><img src='#' alt='twitter'></a>
                <a><img src='#' alt='facebook'></a>
            </nav> --}}
        </footer>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/website.js"></script>
    </body>
</html>
