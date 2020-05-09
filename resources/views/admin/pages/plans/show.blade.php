@extends('adminlte::page')

@section('title', "Detalhe do Planos {$plan->name}")

@section('content_header')
    <h1>Detalhe do  Planos <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
    <div class="card-body">
        <ul>
            <li>
                <strong>Nome:</strong>{{ $plan->name }}
            </li>
            <li>
                <strong>Url:</strong>{{ $plan->url }}
            </li>
            <li>
                <strong>Preco:</strong>{{ number_format($plan->price,2,',','.' )}}
            </li>
            <li>
                <strong>Descricao:</strong>{{ $plan->description }}
            </li>
        </ul>
    </div>
    </div>
    @endsection
