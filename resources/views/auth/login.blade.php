@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="container">
            <h1>H1-STUDIO</h1>

            <form class="login-form col-sm-6 col-sm-push-3" action="{{ url('/login') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-head">
                    <p>
                        Авторизация
                    </p>
                </div>
                <div class="form-body">
                    <div class="col-sm-10 col-sm-push-1">
                        <div class="row">
                            <label class="col-sm-4" for="login">Ваш логин:</label>
                            <div class="col-sm-8">
                                <input type="text" class="{{ $errors->has('login') ? ' has-error' : '' }}" name="login" value="{{ old('login') }}" placeholder="Логин">
                            </div>
                            @if ($errors->has('login'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <label class="col-sm-4" for="password">Ваш пароль:</label>
                            <div class="col-sm-8">
                                <input type="text" class="{{ $errors->has('password') ? ' has-error' : '' }}" name="password" value="{{ old('password') }}" placeholder="Пароль">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="checkbox col-sm-12 text-center">
                            <label>
                                <input type="checkbox" name="remember"> Запомнить меня
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <div class="col-sm-8 col-sm-push-2">
                        <div class="col-sm-12">
                            <input type="submit" name="submit" value="Войти">
                        </div>
                        <div class="col-sm-12 text-center">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Забыли свой пароль?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
