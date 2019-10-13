@extends('layout.app', ["current" => "pessoas"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/pessoas" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomePessoa">Nome do Pessoa</label>
                <input type="text" class="form-control" name="nomePessoa"
                       id="nomePessoa" placeholder="Nome da Pessoa">
                <div class="form-group">
                    <label for="perfilPessoa">Selecione uma foto para o perfil:</label>
                    <input type="file"
                           id="perfilPessoa" name="perfilPessoa"
                           accept=".png, .jpeg">
                </div>
                <label for="emailPessoa">E-mail</label>
                <input type="email" class="form-control" name="emailPessoa"
                       id="emailPessoa" placeholder="E-mail">
                <label for="dtNasc">Data de Nascimento</label>
                <input type="date" class="form-control" name="dtNasc"
                       id="dtNasc" placeholder="Data de Nascimento">
                <label for="localPessoa">Localidade</label>
                <select class="form-control" id="localPessoa" name="localPessoa">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                </select>
                <label for="interessesPessoa">Interesses</label>
                <div class="form-control-range">

                    <div id="textInteresse"></div>

                    <a href="#" id="btnAdicionaInteresse" ><i class="fa fa-plus"></i> interesse</a>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>       
        </form>
    </div>
</div>

@endsection