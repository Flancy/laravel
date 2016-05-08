@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Административная панель</div>

            <div class="panel-body">
                <p>
                    Ссылка:
                </p>
                <p class="bg-success">
                    {{ $url }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
