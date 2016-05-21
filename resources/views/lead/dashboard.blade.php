@extends('layouts.app')

@section('content')
<section class="dashboard-lead">
    <div class="container">
        @can('admin')
            <h1>{{ $leadInfo->name_task }}</h1>
        @endcan
        @can('company')
            <h1>{{ $leadInfo->name_task }}</h1>
        @endcan
        @can('lead')
            <h1>Ваша заявка</h1>
        @endcan

        <div class="row">
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
    </div>
</section>
@endsection
