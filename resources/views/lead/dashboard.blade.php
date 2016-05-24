@extends('layouts.app')

@section('content')
<section class="dashboard-lead">
    <div class="container">
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'company')
            <h1>{{ $leadInfo->name_task }}</h1>
        @endif
        @can('lead')
            <h1>Ваша заявка</h1>
        @endcan

        <div class="row lead-row">
            <div class="col-md-12 body-panel">
                <div class="lead-head">
                    <p>
                        {{ $leadInfo->name_task }}
                    </p>
                </div>
                <div class="lead-body clearfix">
                    <div class="col-md-4">
                        <p class="cart-lead-attribute">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>Категория: </span>
                        </p>
                        <p>
                            Фотостудии
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="cart-lead-attribute">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <span>Время: </span>
                        </p>
                        <p>
                            {{ $leadInfo->created_at }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="cart-lead-attribute">
                            <i class="fa fa-rub" aria-hidden="true"></i>
                            <span>Бюджет:</span>
                        </p>
                        <p>
                            {{ $leadInfo->price }} р.
                        </p>
                    </div>
                </div>
                <div class="lead-footer clearfix">
                    <div class="left-footer col-sm-8">
                        <div class="row">
                            <p class="col-xs-3 p-name">
                                Описание:
                            </p>
                            <p class="col-xs-9 p-value">
                                {{ $leadInfo->description }}
                            </p>
                        </div>
                    </div>
                    <div class="right-footer col-sm-4">
                        <img class="img-responsive" src="{{ url('/img/lead-logo.png') }}" alt="Lead Logo" />
                    </div>
                </div>
            </div>
        </div>
        @can('lead')
            <div class="row lead-row">
                <div class="col-md-12 body-panel">
                    <div class="lead-bid-head">
                        <p>
                            Предложения подрядчиков
                        </p>
                    </div>
                    <div class="lead-bid-body clearfix">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bid">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Название компании
                                                </th>
                                                <th>
                                                    Сроки
                                                </th>
                                                <th>
                                                    Цена
                                                </th>
                                                <th>
                                                    &nbsp;
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($bidCompany != '')
                                                @foreach($bidCompany as $bid)
                                                    @if(!empty($bid->name_company))
                                                        <tr>
                                                            <td>
                                                                <p>
                                                                    {{$bid->name_company}}
                                                                </p>
                                                                <a href="#">Подробнее</a>
                                                            </td>
                                                            <td>
                                                                <p>
                                                                    {{$bid->timeline}}
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p>
                                                                    {{$bid->price}}
                                                                </p>
                                                            </td>
                                                            <td class="text-right">
                                                                <button type="button" class="btn btn-default" name="button">Выбрать</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'company')
            <div class="row lead-row">
                <div class="col-md-12 body-panel">
                    @if($bidCompany != '')
                        @foreach($bidCompany as $bid)
                            @if($bid->company_id == Auth::user()->company->id)
                                @if(!empty($bid->name_company))
                                    <div class="lead-bid-head company">
                                        <p>
                                            Вы отправили свое предложение
                                        </p>
                                    </div>
                                    {{ $flag = '&nbsp;' }}
                                @else
                                    {{ $flag = '' }}
                                @endif
                            @endif
                        @endforeach
                        @if($flag !== '&nbsp;')
                            <div class="lead-bid-head company">
                                <p>
                                    Отправить предложение
                                </p>
                            </div>
                            <div class="lead-bid-body clearfix">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <form class="add-bid-form company" action="/add-bid" method="post">
                                            {!! csrf_field() !!}
                                            <input type="text" name="timeline" value="" placeholder="Срок выполнения">
                                            <input type="text" name="price" value="" placeholder="Цена выполнения">
                                            <textarea name="description_done" rows="4" placeholder="Описание выполнения"></textarea>
                                            <textarea name="unic_bid" rows="4" placeholder="Уникальное предложение"></textarea>
                                            <input type="submit" name="submit" value="Отправить">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @endif

    </div>
</section>
@endsection
