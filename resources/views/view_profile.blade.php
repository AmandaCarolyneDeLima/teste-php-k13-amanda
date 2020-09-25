@extends("template")

@section("content")
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-sm-8 ml-3">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">
                    {{ Auth::user()->name }}
                    </h4>
                    <div class="btn-group" role="group">
                    <a href='{{ url("/") }}'
                            class="btn btn-info btn-xs mr-3" style="border-radius:2px;">
                            <i class='la la-long-arrow-left'></i>
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi-filter-select" class="display table table-striped table-hover ">
                            <thead>
                            </thead>

                            <tbody>
                                
                                <tr>
                                    <td>
                                        <b class="ls-label-text">Data de Nascimento:</b>
                                        <label> {{ date('d-m-Y', strtotime( Auth::user()->data_nasc)) }}</label><br>
                                        <b class="ls-label-text">cpf:</b>
                                        <label>  {{ Auth::user()->cpf }} </label><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b class="ls-label-text">Email:</b>
                                        <label>  {{ Auth::user()->email }} </label><br>
                                        <b class="ls-label-text">Celular:</b>
                                        <label>  {{ Auth::user()->celular }} </label><br>
                                        <b class="ls-label-text">Telefone:</b>
                                        <label>  {{ Auth::user()->telefone }} </label><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <b class="ls-label-text">Endereço</b><br>
                                        <b class="ls-label-text">CEP:</b>
                                        <label>  {{ Auth::user()->cep }} </label><br>
                                        <b class="ls-label-text">Rua:</b>
                                        <label>  {{ Auth::user()->rua }} </label><br>
                                        <b class="ls-label-text">Numero:</b>
                                        <label>  {{ Auth::user()->numero }} </label><br>
                                        <b class="ls-label-text">Bairro:</b>
                                        <label>  {{ Auth::user()->bairro }} </label><br>
                                        <b class="ls-label-text">Cidade:</b>
                                        <label>  {{ Auth::user()->cidade }} </label><br>
                                        <b class="ls-label-text">Estado:</b>
                                        <label>  {{ Auth::user()->estado }} </label><br>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
