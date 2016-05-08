@extends('layouts.app')

@section('content')
    <section class="register-lead">
        <div class="container">
            <h1>Заполните заявку</h1>

            <form class="register-form col-sm-10 col-sm-push-1" action="{{ url('/lead-register') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-body">
                    <input type="text" class="{{ $errors->has('fio') ? ' has-error' : '' }}" name="fio" value="{{ old('fio') }}" placeholder="Ваше полное имя">
                    @if ($errors->has('fio'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fio') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" placeholder="Ваш электронный адрес">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('name_task') ? ' has-error' : '' }}" name="name_task" value="{{ old('name_task') }}" placeholder="Заголовок для заявки">
                    @if ($errors->has('name_task'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name_task') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('description') ? ' has-error' : '' }}" name="description" value="{{ old('description') }}" placeholder="Подробное описание заявки">
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="{{ $errors->has('summ') ? ' has-error' : '' }}" name="summ" value="{{ old('summ') }}" placeholder="Сумма">
                    @if ($errors->has('summ'))
                        <span class="help-block">
                            <strong>{{ $errors->first('summ') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-footer">
                    <input type="submit" name="submit" value="Отправить заявку">
                </div>
            </form>
        </div>
    </section>
@endsection
