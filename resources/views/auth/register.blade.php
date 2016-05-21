@extends('layouts.app')

@section('content')
    <section class="register">
        <div class="container">
            <h1>Регистрация</h1>

            <form class="register-form col-sm-10 col-sm-push-1" enctype="multipart/form-data" action="{{ url('/register') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="url" value="{{ $url }}">
                <div class="form-head">
                    <p>
                        Контактное лицо
                    </p>
                </div>
                <div class="form-body">
                    <input type="text" class="{{ $errors->has('fio') ? ' has-error' : '' }}" name="fio" value="{{ old('fio') }}" placeholder="Ф.И.О. Контактного лица">
                    @if ($errors->has('fio'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fio') }}</strong>
                        </span>
                    @endif
                    <input type="tel" class="{{ $errors->has('phone') ? ' has-error' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="Телефон контактного лица">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                    <input type="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" placeholder="Адрес эл. почты контактного лица">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input type="password" class="{{ $errors->has('password') ? ' has-error' : '' }}" name="password" value="{{ old('password') }}" placeholder="Пароль личного кабинета">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-head">
                    <p>
                        Реквизиты
                    </p>
                </div>
                <div class="form-body">
                    <input type="text" class="{{ $errors->has('name-company') ? ' has-error' : '' }}" name="name-company" value="{{ old('name-company') }}" placeholder="Название компании">
                    @if ($errors->has('name-company'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name-company') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('ogrn') ? ' has-error' : '' }}" name="ogrn" value="{{ old('ogrn') }}" placeholder="ОГРН">
                    @if ($errors->has('ogrn'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ogrn') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('inn') ? ' has-error' : '' }}" name="inn" value="{{ old('inn') }}" placeholder="ИНН">
                    @if ($errors->has('inn'))
                        <span class="help-block">
                            <strong>{{ $errors->first('inn') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('yur-adress') ? ' has-error' : '' }}" name="yur-adress" value="{{ old('yur-adress') }}" placeholder="Юр. адрес">
                    @if ($errors->has('yur-adress'))
                        <span class="help-block">
                            <strong>{{ $errors->first('yur-adress') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('fact-adress') ? ' has-error' : '' }}" name="fact-adress" value="{{ old('fact-adress') }}" placeholder="Фактический адрес">
                    @if ($errors->has('fact-adress'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fact-adress') }}</strong>
                        </span>
                    @endif
                    <input type="tel" class="{{ $errors->has('phone-company') ? ' has-error' : '' }}" name="phone-company" value="{{ old('phone-company') }}" placeholder="Телефон">
                    @if ($errors->has('phone-company'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone-company') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('fio-boss') ? ' has-error' : '' }}" name="fio-boss" value="{{ old('fio-boss') }}" placeholder="Ф.И.О. руководителя">
                    @if ($errors->has('fio-boss'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fio-boss') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('description-company') ? ' has-error' : '' }}" name="description-company" value="{{ old('description-company') }}" placeholder="Описание компании">
                    @if ($errors->has('description-company'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description-company') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-head">
                    <p>
                        Банк
                    </p>
                </div>
                <div class="form-body">
                    <input type="text" class="{{ $errors->has('name-bank') ? ' has-error' : '' }}" name="name-bank" value="{{ old('name-bank') }}" placeholder="Наименование">
                    @if ($errors->has('name-bank'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name-bank') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('bik') ? ' has-error' : '' }}" name="bik" value="{{ old('bik') }}" placeholder="БИК">
                    @if ($errors->has('bik'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bik') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('k-c') ? ' has-error' : '' }}" name="k-c" value="{{ old('k-c') }}" placeholder="к/с">
                    @if ($errors->has('k-c'))
                        <span class="help-block">
                            <strong>{{ $errors->first('k-c') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('p-c') ? ' has-error' : '' }}" name="p-c" value="{{ old('p-c') }}" placeholder="р/с">
                    @if ($errors->has('p-c'))
                        <span class="help-block">
                            <strong>{{ $errors->first('p-c') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-head">
                    <p>
                        Лицензии
                    </p>
                </div>
                <div class="form-body">
                    <input type="text" class="{{ $errors->has('name-license') ? ' has-error' : '' }}" name="name-license" value="{{ old('name-license') }}" placeholder="Название лицензии">
                    @if ($errors->has('name-license'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name-license') }}</strong>
                        </span>
                    @endif
                    <input type="date" class="{{ $errors->has('date') ? ' has-error' : '' }}" name="date" value="{{ old('date') }}" placeholder="Дата выдачи">
                    @if ($errors->has('date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-footer">
                    <input type="submit" name="submit" value="Зарегистрироваться">
                </div>
            </form>
        </div>
    </section>
@endsection
