@extends('layouts.default')

@section('title') Пополнение счета @endsection

@section('content')
    <div class="auth">
        <div class="container">
            <div class="auth-block">
                <h1>Пополнение счета</h1>
                <form method="POST" action="https://unitpay.ru/pay/69411-d3806">
                    <div class="input-group">
                        <label for="sum">Сумма пополнения</label>
                        <input type="text" name="sum" id="sum" placeholder="сумма">
                    </div>
                    <input type="hidden" name="account" value="{{Auth::user()->username}}">
                    <input type="hidden" name="desc" value="Пополнение игрового аккаунта «{{Auth::user()->name()}}» на сервере «{{$servers->find(session()->get('server_id'))->name}}»">
                    <button>Пополнить</button>
                </form>
            </div>
        </div>
    </div>
@endsection