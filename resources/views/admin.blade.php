@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Административная панель</div>

            <div class="panel-body">
                <form class="generate-url" action="{{ url('/generate-url') }}" method="post">
                    {!! csrf_field() !!}
                    <p>
                        Сгенерировать ссылку, для регистрации:
                    </p>
                    <input type="submit" name="name" class="btn bnt-default" value="Генерировать">
                    @if(isset($url))
                        <p class="bg-success">
                            {{ $url }}
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
