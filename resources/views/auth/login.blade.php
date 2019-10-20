@extends('layouts.default')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
@endsection

@section('title') Авторизация @endsection

@section('content')
    <div class="auth">
        <div class="container">
            <div class="auth-block">
                <h1>Авторизация</h1>
                <form method="POST" action="{{route('login')}}" aria-label="Login">
                    @csrf

                    @if (isset($errors) && count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error  }}
                            </div>
                        @endforeach
                    @endif

                    <div class="input-group">
                        <label for="server_id">Выбор сервера</label>
                        <select name="server_id" id="server_id" style="display: none;">
                            @foreach($servers as $server)
                                <option value="{{$server->id}}">{{$server->name}}</option>
                            @endforeach
                        </select>
                        <div class="nice-select" tabindex="0">
                            <span class="current">{{$servers->first()->name}}</span>
                            <ul class="list">
                                @foreach($servers as $server)
                                    <li data-value="{{$server->id}}" class="option selected">{{$server->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="username">Логин</label>
                        <input type="text" id="username" name="username" placeholder="Имя персонажа" value="" required="required" autofocus="autofocus">
                        @error('username')
                            <label class="error">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" placeholder="Пароль">
                        @error('password')
                            <label class="error">{{$message}}</label>
                        @enderror
                    </div>

                    <button>Авторизация</button>
                    <a href="http://revent-rp.ru/login/password/reset" class="auth-block__reset-password">Забыл пароль?</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $("#server_id").niceSelect();
    </script>
@endsection