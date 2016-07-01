@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="b-slider slider-main">
        <div class="slider-item">
            <div class="slider-image image-01"></div>
        </div>
        <div class="slider-item">
            <div class="slider-image image-02"></div>
        </div>
        <div class="slider-item">
            <div class="slider-image image-03"></div>
        </div>
        <div class="slider-item">
            <div class="slider-image image-04"></div>
        </div>
    </div>

    <div class="b-main type-main-pattern"></div>

    <div class="b-main type-above-slider">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="b-margin margin-bottom-40 margin-top-40">
                        <div class="main-title">
                            <div class="b-text text-shadowed">
                                ToDo App - планировщик задач на каждый день
                            </div>
                        </div>
                    </div>
                    <div class="b-margin margin-bottom-40">
                        <div class="row">
                            @if (Auth::guest())
                                <div class="col-lg-6 text-right">
                                    <a href="{{ url('/login') }}" class="btn btn-lg btn-success">Войти</a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ url('/register') }}" class="btn btn-lg btn-success">Зарегистрироваться</a>
                                </div>
                            @else
                                <div class="col-lg-12">
                                    <div class="b-text text-shadowed">
                                        <p class="text-center">Вы успешно авторизовались</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="main-slogan text-right">
                        <div class="b-text text-shadowed">
                            <p>
                                "Планирование без действий - это мечта.<br>
                                Действия без планирования - это кошмар."
                            </p>
                            <small>Японская поговорка</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
