@extends('adminlte::page')

@section('title', 'Cadastrar novo Planos')

@section('content_header')
    <h1>Cadastrar novo Planos</h1>
@stop

@section('content')
    <div class="card">
    <div class="card-body">
        <form action="{{ route('plans.store') }}" class="form" method="POST">
            @csrf
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" placeholder="Digite Nome:">
            </div>
            <div class="form-group">
                <label>Preco:</label>
                <input type="text" name="price" class="form-control" placeholder="Digite Preco:">
            </div>
            <div class="form-group">
                <label>Descricao:</label>
                <input type="text" name="description" class="form-control" placeholder="Digite Descricao:">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Salvar</button>
            </div>

        </form>

    </div>
    </div>

        @endsection
