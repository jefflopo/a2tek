@extends('layout.app', ["current" => "home"])

@section('body')

<div class="jumbotron bg-light border border-secondary">
    <div class="card">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Sistema de Cadastro de Pessoas</h5>
                    <p class="card-text">
                            Somos a A2TEK, uma empresa de desenvolvimento web. Desenvolvemos sistemas, artes gráficas, sites, aplicações para telemóvel e realizamos manutenção evolutiva de sistemas de grande porte.
                            <br/>
                            Desde 2001, a A2TEK ajuda seus clientes a crescerem e inovarem, obtendo mais resultados e ganhando mais espaço no mercado.
                    </p>
                    <a href="/pessoas" class="btn btn-primary">Pessoas</a>
                </div>
                
            </div>
            
        </div>
    </div>
</div>

@endsection