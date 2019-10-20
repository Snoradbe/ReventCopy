@extends('layouts.default')

@section('title') Подтверждение покупки @endsection

@section('content')
    <div class="page">
        <div class="container">
            <h1>Подтверждение покупки</h1>
            <div class="page-block">
                @auth
                    <h3>На вашем счету: <b>{{Auth::user()->cash}} рублей</b></h3>
                @endauth
                <form action="{{route('donate.buy', $donate)}}" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Цена</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$donate->name}}</td>
                                <td>{!! $donate->description !!}</td>
                                <td>{{$donate->price}} рублей</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn">Подтвердить</button>
                </form>
            </div>
        </div>
    </div>
@endsection