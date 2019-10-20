@extends('layouts.default')

@section('title') Список измененных имен @endsection

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
                        <th>Старое имя</th>
                        <th>Новое имя</th>
                        <th>Дата изменения</th>
                        <th>Ответственный</th>
                    </tr>
                    <tr>
                        <th colspan="5"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($names as $name)
                            <tr>
                                <td>{{$name->id}}</td>
                                <td>{{$name->old_name}}</td>
                                <td>{{$name->new_name}}</td>
                                <td>{{$name->created_at->format('d.m.Y H:i')}}</td>
                                <td>{{$name->admin->name()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$names->render()}}
            </div>
        </div>
    </div>
@endsection