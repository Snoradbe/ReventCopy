@extends('layouts.default')

@section('title') Профиль @endsection

@section('content')
    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="row pl-5 pr-4">
                        <div class="col-md-7 main-skin">
                            @if($user->isOnline())
                                <span class="status online">Онлайн</span>
                            @else
                                <span class="status offline">Офлайн</span>
                            @endif
                            <img src="{{asset('images/skins/187.png')}}" class="skin">
                        </div>
                        <div class="col-md-5">
                            <ul class="nav profile-nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">Статистика</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if(Auth::user()->id == $user->id)
                        <div class="row pl-5 pr-4">
                            <div class="col-md-7 p-0">
                                <div class="balance cash"><span>Денег на счету</span> <b>${{number_format($user->coins)}}</b></div>
                            </div>
                            <div class="col-md-5 balance-block-min">
                                <div class="balance bank"><span>В банке</span> <b>${{number_format($user->bank)}}</b></div>
                            </div>
                        </div>
                    @endif
                    <div class="row pl-5 pr-4">
                        <h5>Дополнительные скины игрока:</h5>
                        <div class="row skins">
                            <div class="col-sm-3 text-center p-2 m-auto">
                                <div class="slot"><img src="{{asset('images/skins/0.png')}}" class="skin"></div>
                            </div>
                            <div class="col-sm-3 text-center p-2 m-auto">
                                <div class="slot"><img src="{{asset('images/skins/0.png')}}" class="skin"></div>
                            </div>
                            <div class="col-sm-3 text-center p-2 m-auto">
                                <div class="slot"><img src="{{asset('images/skins/0.png')}}" class="skin"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h4 class="text-center">Статистика аккаунта <b>{{$user->name()}}</b></h4>
                    <div class="stats">
                        <div class="param">
                            <span class="param__prop">Статус</span>
                            <span class="param__value">
                                @if(!$user->isOnline())
                                    Последий раз был {{date('d/m/Y В H:i', $user->online)}}
                                @else
                                    Онлайн
                                @endif
                            </span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Уровень</span>
                            <span class="param__value">{{$user->level}}</span>
                        </div>
                        <div data-toggle="modal" data-target="#garageModal" class="param">
                            <span class="param__prop">Номер телефона</span>
                            <span class="param__value">
                                @if(is_null($user->phone))
                                    Отсутствует
                                @else
                                    {{$user->phone()}}
                                @endif
                            </span>
                        </div>
                        <div data-toggle="modal" data-target="#achievementsModal" class="param">
                            <span class="param__prop">Пол</span>
                            <span class="param__value">{{$user->sex == 'm' ? 'Мужской' : 'Женский'}}</span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Возраст</span>
                            <span class="param__value">{{$user->age}}</span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Раса</span>
                            <span class="param__value">{{$user->race()}}</span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Национальность</span>
                            <span class="param__value">{{$user->nation()}}</span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Работа</span>
                            <span class="param__value">{{is_null($user->job) ? 'Не устроен' : $user->job->name}}</span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Фракция</span>
                            <span class="param__value">{{is_null($user->fraction) ? 'Не состоит' : $user->fraction->name}}</span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Муж / Жена</span>
                            <span class="param__value">
                                @if(is_null($user->partner))
                                    Холост(а)
                                @else
                                    <a href="{{route('profile', ['server' => $server, 'user' => $user->partner->id])}}">{{$user->partner->name()}}</a>
                                @endif
                            </span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Мед. карта</span>
                            <span class="param__value">{{$user->med ? 'Есть' : 'Отсутствует'}}</span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Зависимость</span>
                            <span class="param__value">{{$user->addiction ? 'Есть' : 'Отсутствует'}}</span>
                        </div>
                        <div class="param">
                            <span class="param__prop">Количество преступлений</span>
                            <span class="param__value">{{$user->crimes}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection