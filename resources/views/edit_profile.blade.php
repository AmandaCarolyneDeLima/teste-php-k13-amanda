@extends("template")
@section("content")

<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-lg-8 mt-5">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">
                        Editar Perfil
                    </h4>
                </div>

                <div class="card-body">
                    <form method="post" enctype="multipart/form-data"
                        action="{{ url("/user/profile_update") }}">
                        <div class="form-row">
                            <div class="form-group form-floating-label col-6">
                                <input id="name" type="text" class="form-control text-center" name="name"
                                    value="{{ Auth::user()->name }} " required autofocus>
                                <label for="password" class="placeholder">Nome</label>
                            </div>
                            <div class="form-group form-floating-label col-6">
                                <input id="email" type="email" class="form-control text-center" name="email"
                                    value="{{ Auth::user()->email }} " required>
                                <label for="email" class="placeholder">E-mail</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-6">
                                <input id="cpf" type="text" class="form-control text-center" name="cpf"
                                    value="{{ Auth::user()->cpf }} " required readonly>
                                <label for="cpf" class="placeholder">CPF</label>
                            </div>
                            <div class="form-group form-floating-label col-6">
                                <input id="data_nasc" type="date" class="form-control text-center" name="data_nasc"
                                    value="{{ Auth::user()->data_nasc }}" required>
                                <label for="data_nasc"class="placeholder">Data de Nascimento</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-6">
                                <input id="celular" type="text" class="form-control text-center" name="celular"
                                    value="{{ Auth::user()->celular }} " required autofocus>
                                <label for="celular" class="placeholder">Celular</label>
                            </div>
                            <div class="form-group form-floating-label col-6">
                                <input id="telefone" type="text" class="form-control text-center" name="telefone"
                                    value="{{ Auth::user()->telefone }}" >
                                <label for="telefone"class="placeholder">Telefone</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-4">
                                <input id="cep" type="text" class="form-control text-center" name="cep"
                                    value="{{ Auth::user()->cep }} " required autofocus>
                                <label for="cep" class="placeholder">CEP</label>
                            </div>
                            <div class="form-group form-floating-label col-6">
                                <input id="rua" type="text" class="form-control text-center" name="rua"
                                    value="{{ Auth::user()->rua }}" >
                                <label for="rua"class="placeholder">Rua</label>
                            </div>
                            <div class="form-group form-floating-label col-2">
                                <input id="numero" type="text" class="form-control text-center" name="numero"
                                    value="{{ Auth::user()->numero }}" >
                                <label for="numero"class="placeholder">Numero</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-4">
                                <input id="bairro" type="text" class="form-control text-center" name="bairro"
                                    value="{{ Auth::user()->bairro }} " required autofocus>
                                <label for="bairro" class="placeholder">Bairro</label>
                            </div>
                            <div class="form-group form-floating-label col-4">
                                <input id="cidade" type="text" class="form-control text-center" name="cidade"
                                    value="{{ Auth::user()->rua }}">
                                <label for="cidade"class="placeholder">Cidade</label>
                            </div>
                            <div class="form-group form-floating-label col-4">
                                <input id="estado" type="text" class="form-control text-center" name="estado"
                                    value="{{ Auth::user()->estado }}">
                                <label for="estado"class="placeholder">Estado</label>
                            </div>
                        </div>
                        <div class="form-action">
                        {{ csrf_field() }}
                            <a href="{{ url("/") }}" id="show-signin"
                                class="btn btn-danger  btn-login mr-3">Cancelar</a>
                            <button class="btn btn-success  btn-login">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                        </form>
                </div>
            </div>

        </div>
    </div>

   

@endsection
<!--validação-->
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function checkForm(form) {
        'use strict';
        window.addEventListener('load', function () {
            // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
            var forms = document.getElementsByClassName('needs-validation');
            // Faz um loop neles e evita o envio
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    // se validar desabilita o botao
                    if (form.checkValidity() === true) {
                        form.cadastrar.disabled = true;
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- Adicionando Javascript CEP-->
<script type="text/javascript" >
  
 $(document).ready(function() {
   
   function limpa_formulário_cep() {
               // Limpa valores do formulário de cep.
               $("#rua").val("");
               $("#bairro").val("");
               $("#bidade").val("");
               $("#estado").val("");
             }

           //Quando o campo cep perde o foco.
           $("#cep").blur(function() {
             
               //Nova variável "cep" somente com dígitos.
               var cep = $(this).val().replace(/\D/g, '');
               
               //Verifica se campo cep possui valor informado.
               if (cep != "") {
                 
                   //Expressão regular para validar o CEP.
                   var validacep = /^[0-9]{8}$/;
                   
                   //Valida o formato do CEP.
                   if(validacep.test(cep)) {
                     
                       //Preenche os campos com "..." enquanto consulta webservice.
                       $("#rua").val("...");
                       $("#bairro").val("...");
                       $("#cidade").val("...");
                       $("#estado").val("...");
                       
                       //Consulta o webservice viacep.com.br/
                       $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                         
                         if (!("erro" in dados)) {
                               //Atualiza os campos com os valores da consulta.
                               $("#rua").val(dados.logradouro);
                               $("#bairro").val(dados.bairro);
                               $("#cidade").val(dados.localidade);
                               $("#estado").val(dados.uf);
                               
                           } //end if.
                           else {
                               //CEP pesquisado não foi encontrado.
                               limpa_formulário_cep();
                               alert("CEP não encontrado.");
                             }
                           });
                   } //end if.
                   else {
                       //cep é inválido.
                       limpa_formulário_cep();
                       alert("Formato de CEP inválido.");
                     }
               } //end if.
               else {
                   //cep sem valor, limpa formulário.
                   limpa_formulário_cep();
                 }
               });
         });
 
       </script>
