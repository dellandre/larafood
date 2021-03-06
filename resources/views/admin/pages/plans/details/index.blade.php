
@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a></li>
</ol>
</ol>
</ol>
    <h1>Detalhes do plano {{ $plan->name }} <a href="{{ route('') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i> </a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
           <table class="table table-condensed">
               <thead>
                   <tr>
                       <th>Nome</th>
                       <th>Preco</th>
                       <th width="150">Acões</th>
                   </tr>
               </thead>
               <tbody>
                @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->name }}</td>
                    <td style="width=100px">
                        <a href="{{ route('details.plan.edit', [$plan->url, $detail->idDetail]) }}" class="btn btn-info">Editar</a>
                        <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a>
                    </td>
                </tr>
                @endforeach
               </tbody>

           </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
            {!! $details->appends($filters)->links() !!}
            @else
            {!! $details->links() !!}
            @endif

        </div>
    </div>
@stop
