@extends('layouts.app')

@section('content')
<section class="settings-company">
    <div class="container">
        <h1>Личный кабинет</h1>

        <div class="row">
            <div class="col-md-3 control-panel">
                <div class="wrapper">
                    <ul>
                        <li><a href="/">Заявки</a></li>
                        <li><a href="/settings" class="current">Настройки</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 body-panel">
                <div class="wrapper row">
                    <div class="setting-head col-md-12">
                        <p>
                            Личная информация
                        </p>
                    </div>
                    <div class="row settings-row">
                        <div class="col-md-8">
                            <form id="personal-form" class="personal-form" action="{{ url('/settings') }}" method="post">
                                {!! csrf_field() !!}
                                <div class="setting-body">
                                    <div class="form-group">
                                        <label for="name-company">Название компании: </label>
                                        <input type="text" name="name-company" value="{{ $data['name-company'] }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="name-company">Контактное лицо: </label>
                                        <input type="text" name="fio-boss" value="{{ $data['fio-boss'] }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="name-company">ОГРН: </label>
                                        <input type="text" name="ogrn" value="{{ $data['ogrn'] }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="name-company">ИНН: </label>
                                        <input type="text" name="inn" value="{{ $data['inn'] }}" readonly>
                                    </div>
                                </div>
                                <div class="setting-body">
                                    <div class="form-group">
                                        <label for="phone">Телефон: </label>
                                        <input type="text" name="phone" value="{{ $data['phone'] }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Почта: </label>
                                        <input type="text" name="email" value="{{ $data['email'] }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <button id="submit-personal" class="pull-right" type="button" name="redact-personal" data-save="false">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            <span>редактировать</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 logo">
                            <p>
                                Логотип компании
                            </p>
                            <img src="{{ url('img/logo.png') }}" class="img-responsive" alt="Laravel" />
                        </div>
                    </div>
                    <div class="col-md-12 border-setting"></div>

                    <div class="setting-head col-md-12">
                        <p>
                            Изменить пароль для входа
                        </p>
                    </div>
                    <div class="row settings-row">
                        <div class="col-md-12">
                            <form id="password-form" class="password-form" action="/settings" method="post">
                            {!! csrf_field() !!}
                            <div class="setting-body">
                                <div class="form-group">
                                    <label class="password" for="password">Старый пароль: </label>
                                    <input type="password" name="password">
                                </div>

                                <div class="form-group">
                                    <label class="password" for="password_confirmation">Новый пароль: </label>
                                    <input type="password" name="password_confirmation">
                                </div>

                                <div class="form-group text-center">
                                    <button id="submit-password" type="button" name="submit-password">Сохранить</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
