@extends('layouts.default')

@section('title')
    Как начать играть
@endsection

@section('content')
    <div class="howto">
        <div class="container">
            <h1 class="m-auto text-center"><i class="fa fa-gamepad"></i> Как начать играть:</h1>
            <div class="steps row m-auto"><div class="step col-lg-4 m-auto">
                    <div class="step-number m-auto text-center"><b>1</b></div>
                    <div class="step-title text-center m-auto">
                        Установите Grand Theft Auto San Andreas
                    </div>
                    <div class="step-text text-center m-auto">
                        Для того что бы начать игру на проекте,
                        Вам необходимо скачать чистую версию
                        Grand Theft Auto San Andreas
                    </div>
                    <div class="step-buttons m-auto">
                        <a href="{{asset('upload/GTASA.zip')}}" class="btn btn-danger m-auto float-left">
                            <i class="fa fa-download"></i>
                        </a>
                        <a href="{{asset('upload/GTASA.zip.torrent')}}" class="btn btn-danger m-auto float-right">
                            <i class="fa fa-cloud-download"></i>
                        </a>
                    </div>
                </div>
                <div class="step col-lg-4 m-auto">
                    <div class="step-number m-auto text-center">
                        <b>2</b>
                    </div>
                    <div class="step-title text-center m-auto">
                        Установите модификацию «SA:MP»
                    </div>
                    <div class="step-text text-center m-auto">
                        Чтобы присоединиться к нашему серверу, Вам понадобиться мультиплеер для игры Grand Theft Auto San Andreas
                    </div>
                    <div class="step-buttons m-auto text-center">
                        <a href="http://files.sa-mp.com/sa-mp-0.3.7-install.exe" class="btn btn-danger m-auto">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
                <div class="step col-lg-4 m-auto">
                    <div class="step-number m-auto text-center">
                        <b>3</b>
                    </div>
                    <div class="step-title text-center m-auto">
                        Подключитесь к нашему серверу
                    </div>
                    <div class="step-text text-center m-auto">
                        Теперь необходимо запустить мультиплеер.
                        В самом мультиплеере ввести Имя и Фамилию на английском языке(формат - Name_Surname).
                        После этого нажмите кнопку присоединиться
                    </div>
                    <div class="step-buttons m-auto text-center">
                        <a href="samp://213.32.112.225:7777" class="btn btn-danger m-auto">
                            <i class="fa fa-check"></i> Присоединиться
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection