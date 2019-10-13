<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pess = Pessoa::all();
        return view('pessoas', compact('pess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novapessoa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pes = new Pessoa();
        $nomeArq = null;
        
        if ($request->hasFile('perfilPessoa') && $request->file('perfilPessoa')->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->perfilPessoa->extension();

            // Define finalmente o nome
            $nomeArq = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->perfilPessoa->storeAs('pessoas', $nomeArq);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/pessoas/nomedinamicoarquivo.extensao
            
             // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload)
                return redirect()
                                ->back()
                                ->with('error', 'Falha ao enviar a foto!')
                                ->withInput();
        }
        
        
        
        $pes->nome = $request->input('nomePessoa');
        $pes->caminho_imagem = "storage/app/public/pessoas/" . $nomeArq;
        $pes->email = $request->input('emailPessoa');
        $pes->data_nascimento = $request->input('dtNasc');
        $pes->localidade = $request->input('localPessoa');
        $pes->interesses = $request->input('textInteresse');
        if( $request->input('textInteresse') != NULL ){
            $pes->interesses = implode(",", $request->input('textInteresse'));//implode(",", $request->input('textInteresse'))
        }else{
            $pes->interesses = "";
        }
        
        
        $pes->save();
        
        return redirect('pessoas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pes = Pessoa::find($id);
        $todas = Pessoa::all();
        
        $estados = [
            ["sigla" => "AC", "nome" => "Acre"],
            ["sigla" => "AL", "nome" => "Alagoas"],
            ["sigla" => "AM", "nome" => "Amazonas"],
            ["sigla" => "AP", "nome" => "Amapá"],
            ["sigla" => "BA", "nome" => "Bahia"],
            ["sigla" => "CE", "nome" => "Ceará"],
            ["sigla" => "DF", "nome" => "Distrito Federal"],
            ["sigla" => "ES", "nome" => "Espírito Santo"],
            ["sigla" => "GO", "nome" => "Goiás"],
            ["sigla" => "MA", "nome" => "Maranhão"],
            ["sigla" => "MT", "nome" => "Mato Grosso"],
            ["sigla" => "MS", "nome" => "Mato Grosso do Sul"],
            ["sigla" => "MG", "nome" => "Minas Gerais"],
            ["sigla" => "PA", "nome" => "Pará"],
            ["sigla" => "PB", "nome" => "Paraíba"],
            ["sigla" => "PR", "nome" => "Paraná"],
            ["sigla" => "PE", "nome" => "Pernambuco"],
            ["sigla" => "PI", "nome" => "Piauí"],
            ["sigla" => "RJ", "nome" => "Rio de Janeiro"],
            ["sigla" => "RN", "nome" => "Rio Grande do Norte"],
            ["sigla" => "RO", "nome" => "Rondônia"],
            ["sigla" => "RS", "nome" => "Rio Grande do Sul"],
            ["sigla" => "RR", "nome" => "Roraima"],
            ["sigla" => "SC", "nome" => "Santa Catarina"],
            ["sigla" => "SE", "nome" => "Sergipe"],
            ["sigla" => "SP", "nome" => "São Paulo"],
            ["sigla" => "TO", "nome" => "Tocantins"]
    ]; 

        return view('visualizarpessoa', compact('pes', 'todas', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pes = Pessoa::find($id);
        
        
        if( isset( $pes ) ){
            return view('editarpessoa', compact('pes'));
        }
        
        return redirect('/pessoas');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pes = Pessoa::find($id);
        
        $nomeArq = null;
        
        if ($request->hasFile('perfilPessoa') && $request->file('perfilPessoa')->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->perfilPessoa->extension();

            // Define finalmente o nome
            $nomeArq = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->perfilPessoa->storeAs('pessoas', $nomeArq);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/pessoas/nomedinamicoarquivo.extensao
            
             // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload)
                return redirect()
                                ->back()
                                ->with('error', 'Falha ao enviar a foto!')
                                ->withInput();
        }
        
        $pes->nome = $request->input('nomePessoa');
        $pes->caminho_imagem = "storage/app/public/pessoas/" . $nomeArq;
        $pes->email = $request->input('emailPessoa');
        $pes->data_nascimento = $request->input('dtNasc');
        $pes->localidade = $request->input('localPessoa');
        $pes->interesses = $request->input('textInteresse');
        if( $request->input('textInteresse') != NULL ){
            $pes->interesses = implode(",", $request->input('textInteresse'));//implode(",", $request->input('textInteresse'))
        }else{
            $pes->interesses = "";
        }
        
        
        $pes->save();
        
        return redirect('pessoas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pes = Pessoa::find($id);
        
        if( isset($pes) ){
            $pes->delete();
            return redirect('/pessoas');
        }
    }
}
