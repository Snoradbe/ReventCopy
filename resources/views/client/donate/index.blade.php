@extends('layouts.default')

@section('title') Платные услуги @endsection

@section('content')
    <div class="whatbuy">
        <div class="container">
            <h1>Платные услуги</h1>
            @auth
                <h1>Ваш баланс: {{Auth::user()->cash}} рублей</h1>
            @endauth
            <div class="navbar">
                <ul>
                    @foreach($categories as $category)
                        <li @if($category === $activeCategory) class="active" @endif>
                            <a href="#" data-category="{{$category->id}}" class="category-event">{{$category->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @foreach($categories as $category)
                <div class="category-tab category-number-{{$category->id}} {{$category === $activeCategory ? 'active' : ''}}">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th></th>
                                    <th>Цена</th>
                                    <th></th>
                                    <th>Описание</th>
                                    @if(Auth::user() && $category->buyable)
                                        <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category->donates as $i => $donate)
                                    @if ($i != 0)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            @if(Auth::user() && $category->buyable)
                                                <td></td>
                                            @endif
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>{{$donate->name}}</td>
                                        <td></td>
                                        <td>{{$donate->price}} рублей</td>
                                        <td></td>
                                        <td>{!! $donate->description !!}</td>
                                        @if(Auth::user() && $category->buyable)
                                            <td><a href="{{route('donate.confirm', $donate)}}" class="btn-buy">Купить</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection