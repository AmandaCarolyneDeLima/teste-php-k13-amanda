@extends("template")
@section("content")

<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-lg-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">
                        Cadastrar Novas Notícias
                    </h4>
                </div>

                <div class="card-body">
                    <form method="post" class="needs-validation" novalidate
                        action="{{ url("/noticias/salvar/$id") }}" enctype="multipart/form-data"
                        onsubmit="return checkForm(this);">
                        
                        <div class="form-group col-lg-2">
                                <b class="ls-label-text" for="imagem">Imagem Atual</b><br>
                                @if($noticia->imagem != null)
                                    <img src="{{ url("storage/noticia/{$noticia->imagem }") }}"
                                        style="max-width:100px; height:100px">
                                @else
                                    <img src="{{ url("img/empresa_padrao.jpg") }}"
                                        style="max-width:100px; height:100px">
                                @endif

                            </div>
                        <div class=" form-row">
                            <div class="form-group col-lg-6">
                                <b class="ls-label-text" for="imagem">Alterar Imagem:</b>
                                <input type="file" class="form-control" name="imagem" id="imagem">

                            </div>
                            <input type="hidden" name='LogoBanco' value='{{ $noticia->imagem }}'>
                            <div class="form-group col-lg-4 ml-2">
                                <b class="ls-label-text" for="data">Data:</b>
                                <input type="date" class="form-control text-center" name="data" id="data" placeholder=""
                                    required value="{{$noticia->data}}">
                                <div class="invalid-feedback">
                                    Por favor, Campo Obrigatório!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <b class="ls-label-text" for="titulo">Título</b>
                                <input type="text" class="form-control text-center" name="titulo" id="titulo"
                                    placeholder="" required minlength="4" maxlength="45" value="{{ isset($noticia->titulo) ? $noticia->titulo : '' }} ">
                                <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="conteudo">Conteúdo</label>
                                <textarea type="text" class="form-control " name="conteudo" id="conteudo"
                                    placeholder="" required>{{$noticia->conteudo}}</textarea>
                                    <div class="invalid-feedback">
                                    Campo Obrigatório, Mínimo 4 caracteres!
                                </div>
                                <div class="valid-feedback">
                                    Tudo certo!
                                </div>
                            </div>
                        </div>
                </div>
            </div>
          
                {{ csrf_field() }}
                <a href="{{ url("/") }}" id="show-signin"
                                class="btn btn-danger  btn-login mr-3">Cancelar</a>
                <button class="btn btn-success" name="cadastrar">Salvar</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

@endsection
<!--validação-->
<script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function checkForm(form){
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
