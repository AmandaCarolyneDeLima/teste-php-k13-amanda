@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                          

                            <div class="form-group form-floating-label col-6">
                            <label for="cep" class="placeholder">Nome</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                
                            <div class="form-group form-floating-label col-6">
                            <label for="email" class="placeholder">E-Mail</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="form-group form-floating-label col-6">
                            <label for="password" class="placeholder">Senha</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group form-floating-label col-6">
                            <label for="password-confirm" class="placeholder">Confirme a Senha</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-6">
                            <label for="cpf" class="placeholder">CPF</label>
                                <input id="cpf" type="text" class="form-control text-center" name="cpf"required>
                              
                            </div>
                            <div class="form-group form-floating-label col-6">
                            <label for="data_nasc"class="placeholder">Data de Nascimento</label>
                                <input id="data_nasc" type="date" class="form-control text-center" name="data_nasc" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-6">
                            <label for="celular" class="placeholder">Celular</label>
                                <input id="celular" type="text" class="form-control text-center" name="celular" required>
                              
                            </div>
                            <div class="form-group form-floating-label col-6">
                            <label for="telefone"class="placeholder">Telefone</label>
                                <input id="telefone" type="text" class="form-control text-center" name="telefone">
                               
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-4">
                            <label for="cep" class="placeholder">CEP</label>
                                <input id="cep" type="text" class="form-control text-center" name="cep" required autofocus>
                              
                            </div>
                            <div class="form-group form-floating-label col-6">
                            <label for="rua"class="placeholder">Rua</label>
                                <input id="rua" type="text" class="form-control text-center" name="rua">
                               
                            </div>
                            <div class="form-group form-floating-label col-2">
                            <label for="numero"class="placeholder">Numero</label>
                                <input id="numero" type="text" class="form-control text-center" name="numero">
                               
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-floating-label col-4">
                            <label for="bairro" class="placeholder">Bairro</label>
                                <input id="bairro" type="text" class="form-control text-center" name="bairro">
                               
                            </div>
                            <div class="form-group form-floating-label col-4">
                            <label for="cidade"class="placeholder">Cidade</label>
                                <input id="cidade" type="text" class="form-control text-center" name="cidade">
                              
                            </div>
                            <div class="form-group form-floating-label col-4">
                            <label for="estado"class="placeholder">Estado</label>
                                <input id="estado" type="text" class="form-control text-center" name="estado">
                               
                            </div>
                        </div>


                        <div class="form-group row">
                        <div class="col-md-4 offset-md-4">
                            <label for="capctha" class="placeholder">Captcha</label>
                            <div class="captcha">
                                <span>{!! captcha_img('math') !!}</span>
                                <button type="button" class="btn btn-success btn-refresh"> Refresh</button>
                            </div>
                                <input id="captcha" type="text" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }} mt-2" name="captcha" placeholder="Enter captcha" required>

                                @if ($errors->has('captcha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Adicionando Javascript CEP-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
       