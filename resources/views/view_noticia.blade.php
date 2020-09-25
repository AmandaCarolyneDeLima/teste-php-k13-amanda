@extends("template")

@section("content")
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-sm-8 ml-3">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ $noticia->titulo }}
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
                                <tr>
                                    <th>
                                            <img src="{{ url("storage/noticia/{$noticia->imagem}") }}"
                                                style="max-width:200; height:200; margin-left:20px;">
                                      
                                    </th>
                                    <th>
                                    <b class="ls-label-text">Data de Publicação:</b>
                                        <label>{{ date('d-m-Y', strtotime($noticia->data)) }} </label><br>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                <tr>
                                    <td  colspan="2">
                                        <b class="ls-label-text">Conteúdo:</b>
                                        <label>{{ $noticia->conteudo }} </label><br>

                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b class="ls-label-text">Publicacado a:</b>
                                        @if($dias < 30)
                                        <label> Menos de 1 mês</label>
                                        @elseif($dias >= 30 && $dias < 60)
                                        <label> Mais de 1 mês</label>
                                        @elseif($dias >= 60 && $dias < 90)
                                        <label> Mais de 2 meses</label>
                                        @elseif($dias >= 90)
                                        <label> Muito tempo atrás</label>
                                        @endif
                                      
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
