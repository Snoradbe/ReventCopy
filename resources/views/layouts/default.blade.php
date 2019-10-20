<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta property="og:image" content="{{asset('images/meta-logo.png')}}">
        <link rel="image_src" href="{{asset('images/meta-logo.png')}}">

        <title>@yield('title') - Revent Role Play</title>

        <meta name="robots" content="index,follow">
        <meta name="keywords" content="samp 0.3, samp 7, скачать samp, samp gta san andreas играть, samp rp играть, гта samp играть, gta играть, gta andreas играть, gta san andreas играть, Revent Role Play, Revent RP #1 | Единый, #server_2#">
        <meta name="description" content="Revent Role Play - уникальный игрокой мод для мультиплеера в игре GTA San Andreas">

        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}?1547991630">
        @yield('styles')
    </head>
    <body>
        <div id="app">
            <header>
                <nav class="navbar navbar-expand-lg">
                    <div class="container"><a href="http://revent-rp.ru" class="navbar-brand logo"></a>
                        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation" class="navbar-toggler"><span class="fa fa-bars"></span>
                        </button>
                        <div id="navbarSupportedContent" class="collapse navbar-collapse">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-4 ml-xl-4 active">
                                    <a href="{{route('home')}}" class="nav-link">Главная</a>
                                </li>
                                <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-4 ml-xl-4">
                                    <a href="//forum.revent-rp.ru/" class="nav-link">Форум</a>
                                </li>
                                <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-4 ml-xl-4">
                                    <a href="{{route('how-to-start')}}" class="nav-link">Как начать</a>
                                </li>
                                @guest
                                    <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-4 ml-xl-4">
                                        <a href="{{route('donate')}}" class="nav-link">Донат</a>
                                    </li>
                                @else
                                    <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-2 ml-xl-3 dropdown">
                                        <a href="#" id="gamesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                            Игры <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <div aria-labelledby="gamesDropdown" class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('games.chests')}}" class="dropdown-item">Сундуки ревента</a>
                                        </div>
                                    </li>
                                    <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-4 ml-xl-4"></li>
                                    <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-2 ml-xl-3 dropdown">
                                        <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                            Донат <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('donate')}}" class="dropdown-item">Прайс лист</a>
                                            <a href="{{route('donate.promo')}}" class="dropdown-item">Подарочные коды</a>
                                            <a href="{{route('donate.addfunds')}}" class="dropdown-item">Пополнить счет</a>
                                        </div>
                                    </li>
                                @endguest
                                <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-2 ml-xl-3 dropdown">
                                    <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                        Статистика <i class="fa fa-chevron-down"></i>
                                    </a>
                                    <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                        @foreach($servers as $server)
                                            <a href="{{route('stats.online', ['server' => $server])}}" class="dropdown-item"> {{$server->name}}</a>
                                        @endforeach
                                    </div>
                                </li>
                                @guest
                                    <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-4 ml-xl-2 dropdown profile">
                                        <a href="{{route('login')}}" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                            Авторизация
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item mr-lg-2 ml-lg-2 mr-xl-4 ml-xl-2 dropdown profile">
                                        <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                            {{Auth::user()->name()}} <i class="fa fa-chevron-down"></i>
                                        </a>
                                        <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('profile', ['server' => session()->get('server_id'), 'user' => Auth::user()->id])}}" class="dropdown-item">Профиль</a>
                                            <a href="{{route('logout')}}" class="dropdown-item">Выход</a>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            <main>
                @yield('content')
            </main>

            <footer>
                <div class="container">
                    <div class="social-links m-auto">
                        <a href="//vk.com/rv_roleplay"><i class="fa fa-vk"></i></a>
                        <a href="//t.me/reventrp"><i class="fa fa-telegram"></i></a>
                    </div>
                    <p class="m-auto text-center"><small>Revent Role Play © 2013 - 2019</small></p>
                    <p class="m-auto text-center"><small>Beta 0.9.42</small></p>
                </div>
            </footer>
        </div>
        <!-- Тут типа яндекс метрика -->
        <script src="{{asset('js/app.js')}}?1547991630"></script>
        @yield('scripts')
    </body>
</html>