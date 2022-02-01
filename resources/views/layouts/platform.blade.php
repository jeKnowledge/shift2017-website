<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shift Appens</title>
        <link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>
        <link rel="stylesheet" type="text/css" href="/css/website.css">
    </head>
    <body class='bg-white dashboard'>
        <div class="overlay upper flex jus-center bg-red light">
            <h5 class="half flex al-center mr-30 ml-30">Ooops! Parece que estás num formato de browser não suportado! Aconselhamos chrome desktop!</h5>
        </div>
        <header class='bg-blue flex dir-row al-center'>
            <div class="flex fw jus-center">
                <div class='timer-platform t-center light ' id='clockdivHackathon'>
                    <strong>Atenção Shifter!</strong>
                    <span>Faltam </span>
                    <strong>
                    <span class="days" id='days'></span><span>d</span>
                    <span class="hours" id='hours'></span><span>h</span>
                    <span class="minutes" id='minutes'></span><span>m</span>
                    <span class="seconds" id='seconds'></span><span>s</span></strong>
                    <span> para o hackathon acabar</span>
                </div>
            </div>
            {{-- <p> &#10094; </p> --}}
            {{-- <form class='quarter flex dir-row al-center jus-around'>
                <span class='dark'>&#9740;</span>
                <input type="search" name="search" placeholder="Procurar" class='w-80'>
            </form> --}}
        </header>
        <main class='bg-white'>
            <nav class='dash-menu bg-dark flex dir-column left'>
                <a href='{{ url('/') }}'><h2 class='blue mopster'>Shift Appens</h2></a>
                <div class='flex dir-row fw wrap jus-start al-center user'>
                    <img class='flex third' src='{{ isset(Auth::user()->photoPath) != "" ? asset('images/photos/' . Auth::user()->photoPath) : asset('images/placeholder.png')}}'>
                    <p class="flex two-thirds dir-column">
                        <span class='flex ml-20 dir-row name'>{{ Auth::user()->name}}</span>
                        <span class='flex ml-20 dir-row email'>{{ Auth::user()->email}}</span>
                    </p>
                </div>
                <div class="flex wrap jus-end al-center ">
                    <a href="{{ url('auth/logout') }}" class='flex dir-row logout'>Logout</a>
                </div>
                <a href='{{ url('platform') }}' class="{{ $section == 'dashboard' ? 'selected' : '' }}">Dashboard</a>
                @if(Auth::user()->isPartner() == false)
                    <a href='{{ url('platform/profile')}}' class="{{ $section == 'profile' ? 'selected' : '' }}">Perfil</a>
                @endif

                @if (Auth::user()->isShifter())

                    {{-- <a href='{{ url('platform/applications/create') }}' class="{{ $section == 'application' ? 'selected' : '' }}">Candidatura</a> --}}
                @endif
                @if (Auth::user()->isSilverPartner() == false)
                    <a href='{{ url('platform/shifters') }}' class="{{ $section == 'shifters' ? 'selected' : '' }}">Shifters</a>
                @endif
                @if (Auth::user()->isAdmin())
                    <a href='{{ url('platform/users') }}' class="{{ $section == 'users' ? 'selected' : '' }}">Users</a>
                    <a href='{{ url('platform/applications') }}' class="{{ $section == 'application' ? 'selected' : '' }}">Candidaturas</a>
                    <a href='{{ url('platform/contests') }}' class="{{ $section == 'contests' ? 'selected' : '' }}">Desafios</a>
                    <a href='{{ url('platform/events') }}' class="{{ $section == 'event' ? 'selected' : '' }}">Eventos</a>
                    <a href='{{ url('platform/faqs') }}' class="{{ $section == 'faqs' ? 'selected' : '' }}">FAQs</a>
                @endif
                {{-- <a href='{{ url('platform/badges') }}' class="{{ $section == 'badges' ? 'selected' : '' }}">Badges</a> --}}
                <a href='{{ url('platform/teams') }}' class="{{ $section == 'teams' ? 'selected' : '' }}">Equipas</a>
            </nav>
            <div class="dash-content">
                @if(session('status') != null && session('status') == 'success')
                    <div class="alert success">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        A operação foi concluída com sucesso!
                    </div>
                @elseif(session('status') != null && session('status') == 'error')
                    <div class="alert error">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        Ops! Ocorreu um erro, por favor tenta outra vez!
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/website.js"></script>
    </body>
</html>
