@extends('layouts.app')

@section('content')
<section class="dashboard-company">
    <div class="container">
        <h1>Личный кабинет</h1>

        <div class="row">
            <div class="col-md-3 control-panel">
                <div class="wrapper">
                    <ul>
                        <li><a href="/" class="current">Заявки</a></li>
                        <li><a href="/settings">Настройки</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 body-panel">
                <div class="wrapper">
                    <div class="lead-head">
                        <p>
                            Заявки
                        </p>
                    </div>
                    @foreach ($leads as $lead)
                    <div class="row row-leads">
                        <div class="col-sm-4 cart-left">
                            <img class="img-responsive" src="{{ url('/img/lead-logo.png') }}" alt="Lead Logo" />
                        </div>
                        <div class="col-sm-8 cart-right">
                            <div class="cart-lead-head clearfix">
                                <p class="col-md-12">
                                    {{ $lead->name_task }}
                                </p>
                            </div>
                            <div class="cart-lead-body clearfix">
                                <div class="col-md-4">
                                    <p class="cart-lead-attribute">
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <span>категория</span>
                                    </p>
                                    <p>
                                        Фотостудии
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="cart-lead-attribute">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span>время</span>
                                    </p>
                                    <p>
                                        {{ $lead->created_at }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="cart-lead-attribute">
                                        <i class="fa fa-rub" aria-hidden="true"></i>
                                        <span>стоимость</span>
                                    </p>
                                    <p>
                                        {{ $lead->price }} р.
                                    </p>
                                </div>
                            </div>
                            <div class="cart-lead-footer clearfix">
                                @if ($user->company->payLead()->where('lead_id',$lead->id)->where('buy_lead', 1)->first())
                                    <div class="col-sm-6 pay_lead">
                                        <a class="cart-link-btn" href="lead/{{ $lead->id }}">Карточка заявки</a>
                                    </div>
                                    <div class="col-sm-6 pay_lead">
                                        <a class="cart-info-btn fancybox" href="#modal">Краткая информация</a>
                                    </div>
                                @else
                                    <div class="col-sm-6 not_pay_lead">
                                        <form id="pay-lead" class="pay-lead" action="/pay-lead" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="id_lead" value="{{ $lead->id }}">
                                            <button class="pay_lead_submit" type="button" name="button">Купить заявку</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
