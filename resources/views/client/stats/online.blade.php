@extends('layouts.default')

@section('title') Онлайн игроки сервера @endsection

@section('content')
    <div class="statspage">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="min-height: 64px;">
            <div class="container">
                <button type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                    <span class="fa fa-bars"></span>
                </button>
                <div id="navbarTogglerDemo01" class="collapse navbar-collapse">
                    @include('client.stats.parts.menu')
                </div>
            </div>
        </nav>
        <div class="container table-container">
            <div class="row table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Уровень</th>
                            <th>Фракция</th>
                            <th>Телефон</th>
                            <th>Работа</th>
                            <th>Имущество</th>
                        </tr>
                        <tr>
                            <th colspan="8"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $i => $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('profile', [$server, $user])}}">{{$user->name()}}</a></td>
                                <td>{{$user->level}}</td>
                                <td>{{is_null($user->fraction) ? 'Не состоит' : $user->fraction->name}}</td>
                                <td>{{$user->phone()}}</td>
                                <td>{{is_null($user->job) ? 'Не устроен' : $user->job->name}}</td>
                                <td>
                                    <a href="#"><i class="fa fa-home"></i></a>
                                    <a href="#"><i class="fa fa-car"></i></a>
                                    <a href="#"><i class="fa fa-building"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Никого нет в сети</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection