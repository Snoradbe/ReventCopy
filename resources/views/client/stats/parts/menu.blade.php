<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item mr-lg-2 dropdown drophover">
        <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            Организации <i class="fa fa-chevron-down"></i>
        </a>
        <div aria-labelledby="navbarDropdown" class="dropdown-menu drophover" style="display: none;">
            @foreach($fractions as $fraction)
                <a href="{{route('stats.fraction', ['server' => $server, 'fraction' => $fraction])}}" class="dropdown-item">{{$fraction->name}}</a>
            @endforeach
        </div>
    </li>
    <li class="nav-item mr-lg-2 active">
        <a href="{{route('stats.online', $server)}}" class="nav-link">Онлайн</a>
    </li>
    <li class="nav-item mr-lg-2">
        <a href="{{route('stats.leaders', $server)}}" class="nav-link">Лидеры</a>
    </li>
    <li class="nav-item mr-lg-2">
        <a href="{{route('stats.banlist', $server)}}" class="nav-link">Забаненые</a>
    </li>
    <li class="nav-item mr-lg-2">
        <a href="{{route('stats.change_names', $server)}}" class="nav-link">Смена ника</a>
    </li>
</ul>