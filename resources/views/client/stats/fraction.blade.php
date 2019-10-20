@extends('layouts.default')

@section('title') Статистика организации {{$fraction->name}} @endsection

@section('content')
    <div class="statspage"><nav class="navbar navbar-expand-lg navbar-light bg-light" style="min-height: 64px;">
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
                            <th>Ранг</th>
                            <th>Статус</th>
                        </tr>
                        <tr>
                            <th colspan="4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{($members->currentpage() - 1) * $members->perpage() + $loop->index + 1}}</td>
                                <td><a href="{{route('profile', [$server, $member])}}">{{$member->name()}}</a></td>
                                <td>{{$member->level}}</td>
                                <td>{{is_null($member->fractionRank) ? '???' : $member->fractionRank->name}}</td>
                                <td>{{$member->isOnline() ? 'Онлайн' : 'Оффлайн'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$members->render()}}
            </div>
        </div>
    </div>
@endsection