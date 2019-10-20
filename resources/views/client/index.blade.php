@extends('layouts.default')

@section('title')Главная страница@endsection

@section('content')
    <div class="homepage">
        <div class="container">
            <div class="logo m-auto"><span></span></div>
            <div class="text text-center m-auto">
                Над проектом работает команда профессионалов.
                Именно у нас на сервере Вы увидите то, чего и не могли представить.
                Мы не стоим на месте и очень быстрыми темпами прогрессируем.
                У нас Вы обязательно сможете найти компанию или друзей на сервере.
                Онлайн сервера обязательно сделает Вашу игру особой и интересной!
            </div>
            <a href="#" data-toggle="modal" data-target="#serversModal" class="players-btn btn btn-lg btn btn-outline-light m-auto">
                <i class="fa fa-users"></i> Сейчас в игре: <b>{{$online}}</b>
            </a>
        </div>
    </div>
    <div id="serversModal" tabindex="-1" role="dialog" aria-labelledby="serversModalLabel" class="modal servers-modal fade" aria-hidden="true">
        <div role="document" class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"><h5 id="serversModalLabel" class="modal-title text-center">
                        <i class="fa fa-th-list"></i> Список серверов</h5>
                </div>
                <div class="modal-body"><div class="row mb-2 table-responsive">
                        <table class="table servers">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Название:</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servers as $server)
                                    <tr class="active">
                                        <td><span class="status {{$server->online >= 0 ? 'online' : 'offline'}}"></span></td>
                                        <td>{{$server->name}}</td>
                                        <td>
                                            @if($server->online >= 0)
                                                {{$server->online}} / {{$server->slots}}
                                            @else
                                                Оффлайн
                                            @endif
                                        </td>
                                        <td>{{$server->ip}}:{{$server->port}}</td>
                                        <td><a href="samp://{{$server->ip}}:{{$server->port}}" class="btn">Подключиться</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row text-center mt-5 mb-3">
                        <a href="#" data-dismiss="modal" class="btn btn-close btn-outline-light btn-light m-auto pr-5 pl-5 pt-2 pb-2">Закрыть</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection