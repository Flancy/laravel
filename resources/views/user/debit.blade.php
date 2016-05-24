@extends('layouts.app')

@section('content')
<section class="debit-company">
    <div class="container">
        <h1>Личный кабинет</h1>

        <div class="row">
            <div class="col-md-3 control-panel">
                <div class="wrapper">
                    <ul>
                        <li><a href="/">Заявки</a></li>
                        <li><a href="/settings">Настройки</a></li>
                        <li><a href="/debit" class="current">Счет</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 body-panel">
                <div class="wrapper row">
                    <div class="col-md-6">
                        <div class="debit-panel-head">
                            <p>
                                Ваш баланс - {{ $debit }} рубля
                            </p>
                        </div>
                        <div class="debit-panel-body">
                            <p>
                                Пополнить счет на:
                            </p>
                            <div class="add-debit">
                                <form class="add-debit-form" action="" method="post">
                                    <input type="text" name="summ" value="" placeholder="Введите сумму"><span> руб.</span>
                                    <input class="pull-right" type="button" name="submit" value="Пополнить">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="debit-panel-head">
                            <p>
                                Что это?
                            </p>
                        </div>
                        <div class="debit-panel-body">
                            <p>
                                С этого счета списывается комиссия за выполнения заявок и их покупку.
                            </p>
                            <p>
                                Поддерживайте положительный баланс для возможности оставлять предложения и пользоваться всеми возможностями сервиса.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
