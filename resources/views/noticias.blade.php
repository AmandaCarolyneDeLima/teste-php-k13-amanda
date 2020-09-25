@extends('template')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-2">
            @if($criterio != "")
                    <div class="card-body">
                   
                        <h5>Busca por: "{{ $criterio }}" </h5>
                    </div>
                    <a href="{{ url("/noticias") }}" class="btn btn-sm btn-info mt-3 mr-2">Todas as Notícias</a>
                @endif
            <div class="form-row col-lg-12">
               
                </div>
                <div class="card mt-5">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th class=""></th>
                                <th class="">Titulo</th>
                                <th class="">Publicaçao </th>
                                <th class="">Salva</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($noticias as $c)
                          
                                <tr>
                                    <td class=""> {{ $c->id }} </td>
                                    <td class=""> {{ $c->titulo }} </td>
                                    <td class=""> {{ date('d-m-Y', strtotime($c->data)) }} </td>
                                    <td class=""> {{ $c->created_at }} </td>
                                   
                                    <td class="">
                                        <div class="btn-group" role="group">
                                     
                                            <a href='{{ url("/noticias/editar/$c->id") }}'
                                            class="btn btn-success btn-xs mr-2" style="border-radius:2px;"><i class='far fa-edit'></i></a>
                                            
                                            <a href='{{ url("/noticias/view/$c->id") }}' class="btn btn-secondary btn-xs mr-2" style="border-radius:2px;">
                                                            <i class='far fa-eye'></i>
                                                        </a>
                                                <a href='{{ url("/noticias/excluir/$c->id") }}' onclick="return confirm('Deletar esse item?');"
                                                class="btn btn-danger btn-xs mr-2" style="border-radius:2px;"><i class='fas fa-trash-alt'></i></a>
                                       
                                        </div>
                                    </td>
                                </tr>
                         
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
    {{ $noticias->links() }}
    </div>
</div>
@endsection