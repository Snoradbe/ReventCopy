@extends('layouts.default')

@section('title') Список забаненых @endsection

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
                            <th>Дата блокировки</th>
                            <th>Дата разблокировки</th>
                            <th>Период</th>
                            <th>Ответственный</th>
                        </tr>
                        <tr>
                            <th colspan="6"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bans as $ban)
                            <tr>
                                <td>{{$ban->id}}</td>
                                <td>{{$ban->user->name()}}</td>
                                <td>{{$ban->created_at->format('d.m.Y H:i')}}</td>
                                <td>{{$ban->until()->format('d.m.Y H:i')}}</td>
                                <td>{{$ban->period}}</td>
                                <td>{{$ban->admin->name()}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Нет банов</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$bans->render()}}
            </div>
        </div>
    </div>
@endsection