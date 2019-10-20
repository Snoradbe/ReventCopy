@extends('layouts.default')

@section('title') Список лидеров @endsection

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
                            <th>Статус</th>
                        </tr>
                        <tr>
                            <th colspan="5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fractions as $i => $fraction)
                            @foreach($fraction->leaders as $leader)
                                <tr>
                                    <td>{{$loop->parent->iteration}}</td>
                                    <td><a href="{{route('profile', [$server, $leader])}}">{{$leader->name()}}</a></td>
                                    <td>{{$leader->level}}</td>
                                    <td>{{$fraction->name}}</td>
                                    <td>{{$leader->isOnline() ? 'Онлайн' : 'Оффлайн'}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection