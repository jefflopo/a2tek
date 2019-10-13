@extends('layout.app', ["current" => "pessoas"])

@section('body')

<div class="card border">
    <div class="card-footer">
        <button class="btn btn-primary" onclick="goBack()">Voltar</button>
    </div>
    
    <div class="card-body">
        <form action="/pessoas" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="perfilPessoa">Foto do Perfil:</label>
                    <img src="{{url($pes->caminho_imagem)}}" alt="Perfil de {{ $pes->nome }}">
                </div>
                <input type="text" class="form-control" name="nomePessoa" disabled
                       id="nomePessoa" placeholder="Nome da Pessoa" value="{{$pes->nome}}">
                
                <label for="localPessoa">Localidade</label>
                <select class="form-control" id="localPessoa" name="localPessoa" disabled>
                    <option>{{$pes->localidade}}</option>
                        
                </select>
                <div class="form-control-range">
                    <h4>Pessoas Relacionadas - Mesma Localidade</h4>
                    <ul>
                        @foreach($todas as $uma)
                            @if( $pes->localidade == $uma->localidade )
                            <li>{{$uma->nome}}</li>
                            @endif
                        @endforeach
                    </ul>
                    
                    
                    
                </div>
            </div>     
        </form>
    </div>
</div>

@endsection