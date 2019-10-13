@extends('layout.app', ["current" => "pessoas"])

@section('body')

<div class="card-border ">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Pessoas</h5>
@if(count($pess) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome da Pessoa</th>
                    <th>Data de Nascimento</th>
                    <th>Localidade</th>
                    <th style="text-align: center">Ações</th>
                </tr>
            </thead>
            <tbody>
        @foreach($pess as $pes)
                <tr>
                    <td>{{$pes->id}}</td>
                    <td>{{$pes->nome}}</td>
                    <td>{{\Carbon\Carbon::parse($pes->data_nascimento)->format('d/m/Y')}}</td>
                    <td>{{$pes->localidade}}</td>
                    <td>
                        <a href="/pessoas/visualizar/{{$pes->id}}" class="btn btn-sm btn-dark">Visualizar</a>
                        <a href="/pessoas/editar/{{$pes->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/pessoas/apagar/{{$pes->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
@else
<h6>Nenhuma Pessoa Cadastrada!!!</h6>
@endif
    </div>
    <div class="card-footer">
        <a href="/pessoas/novo" class="btn btn-sm btn-primary" role="button">Cadastrar</a>
    </div>
</div>

@endsection
