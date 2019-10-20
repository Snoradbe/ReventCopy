@extends('layouts.default')

@section('title') Активация подарочного кода @endsection

@section('content')
    <div class="auth">
        <div class="container">
            <div class="auth-block"><h1>Активация подарочного кода</h1>
                <form method="POST" action="{{route('donate.promo')}}">
                    @csrf
                    <div class="input-group">
                        <label for="code">Подарочный код</label>
                        <input type="text" name="code" id="code" placeholder="REVENT-HELLO-FROM-ABC">
                    </div>
                    <!-- типа капча -->
                    <button type="submit">Активировать</button>
                </form>
            </div>
        </div>
    </div>
@endsection