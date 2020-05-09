
@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Plano</a></li>
</ol>
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i> </a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
               <div class="form-group">
                <input type="text" name="filter" placeholder="Digite o nome para pesquisa" class="form-control" value="{{ $filters['filter'] ?? '' }}">
               </div>
                <button type="submit" class="btn btn-dark">Filtrar</button>

            </form>
        </div>
        <div class="card-body">
           <table class="table table-condensed">
               <thead>
                   <tr>
                       <th>Nome</th>
                       <th>Preco</th>
                       <th width="250">Acões</th>
                   </tr>
               </thead>
               <tbody>
                @foreach($plans as $plan)
                <tr>
                    <td>{{ $plan->name }}</td>
                    <td>{{ number_format($plan->price,2,',','.' )}}</td>
                    <td style="width=100px">
                        <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Editar</a>
                        <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a>
                        <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-warning">Detalhes</a>
                    </td>
                </tr>
                @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
            {!! $plans->appends($filters)->links() !!}
            @else
            {!! $plans->links() !!}
            @endif

        </div>
    </div>
@stop
