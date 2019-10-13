<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <title>Cadastro de Pessoas - A2Tek</title>
        <style>
            body{
                padding: 20px;
            }
            .navbar {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        
        <div class="container">
            @component('component_navbar', [ "current" => $current ])
            @endcomponent
            <main role='main'>
                @hasSection('body')
                    @yield('body')
                @endif
            </main>
        </div>
        
        <script src="{{ asset('js/app.js') }}" type="text/javascript">
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
        </script>
        <script type="text/javascript">
            var idContador = 0;
            
            function goBack() {
                window.history.back();
            }
			
	function exclui(id){
		var campo = $("#"+id.id);
		campo.hide(200);
	}

	$( document ).ready(function() {
		
		$("#btnAdicionaInteresse").click(function(e){
			e.preventDefault();
			var tipoCampo = "textInteresse";
			adicionaCampo(tipoCampo);
		})
		
		$("#btnAdicionaTelefone").click(function(e){
			e.preventDefault();
			var tipoCampo = "telefone";
			adicionaCampo(tipoCampo);
		})
		
		function adicionaCampo(tipo){

			idContador++;
			
			var idCampo = "campoExtra"+idContador;
			var idForm = "formExtra"+idContador;
		
			var html = "";
			
			html += "<div style='margin-top: 8px;' class='input-group' id='"+idForm+"'>";
			html += "<input type='text' id='"+idCampo+"' name='" + tipo +"[]' class='form-control' placeholder='Insira um Interesse'/>";
			html += "<span class='input-group-btn'>";
			html +=	"<button class='btn' onclick='exclui("+idForm+")' type='button'></button>";html +=	"<button class='btn' onclick='exclui(" + idForm + ")' type='button'><span class='fa fa-trash'></span></button>";
                        html += "</span>";
                        html += "</div>";

                        $("#" + tipo).append(html);
                    }

                    $(".btnExcluir").click(function () {
                        console.log("clicou");
                        $(this).slideUp(200);
                    })

                    $("#btnSalvar").click(function () {

                        var mensagem = "";
                        var novosCampos = [];
                        var camposNulos = false;

                        $('.campoDefault').each(function () {
                            if ($(this).val().length < 1) {
                                camposNulos = true;
                            }
                        });
                        $('.novoCampo').each(function () {
                            if ($(this).is(":visible")) {
                                if ($(this).val().length < 1) {
                                    camposNulos = true;
                                }
                                //novosCampos.push($(this).val());
                                mensagem += $(this).val() + "\n";
                            }
                        });

                        if (camposNulos == true) {
                            alert("Atenção: existem campos nulos");
                        } else {
                            alert("Novos campos adicionados: \n\n " + mensagem);
                        }

                        novosCampos = [];
                    })

                });
        </script>
        
    </body>
</html>
