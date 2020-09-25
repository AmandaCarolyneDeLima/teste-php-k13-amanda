@extends('template')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-2">
            <h4 for="">
                @if(date('H')>=4 && date('H')<=12)
                Bom Dia,
                @elseif(date('H')>12 && date('H')<=19)
                Boa Tarde,
                @else
                Boa Noite,
                @endif
                {{ Auth::user()->name }}!
                </h4>
                <div class="card mt-5 float-right">
                
            </div>
        </div>
</div>
<div class="row justify-content-center">
        <div class="col-lg-8 mt-2">
            <h5>Busca de Notícias:</h5>
                    <select onchange="verificar(this.value)" class="form-control input-border-bottom" id="filtro"
                        name="filtro">
                        <option>Filtro de Busca</option>
                        <option value="C">Título</option>
                        <option value="D">Data de Publicação</option>
                    </select>
                </div>
                </div>
                <div class="col-lg-8" id="name" hidden>
                    <form action="{{ url('/noticias/busca3') }}" method="post">
                        <div class=" container">
                            <div class="input-group col-lg-12 mt-2">
                            <b class="mt-2">Início:</b>
                                <input type="date" class="form-control ml-1" name="data_inicio">
                            <b class="ml-2 mt-2">Fim:</b>
                                <input type="date" class="form-control ml-1 mr-2" name="data_fim">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div id="cod" hidden>
                    <form action="{{ url('/noticias/busca2') }}" method="post">
                        <div class="container">
                            <div class="input-group col-lg-8 mt-2">
                                <input type="text" class="form-control" name="criterio" placeholder="Título">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
               
                
                </div>
                <script>
        function verificar(value) {
            var cod = document.getElementById("cod");
            var name = document.getElementById("name");
            var venc = document.getElementById("venc");
            if (value == "C") {
                cod.hidden = false;
                name.hidden = true;
                venc.hidden = true;

            } else if (value == "D") {
                cod.hidden = true;
                name.hidden = false;
                venc.hidden = true;
            }
        };
    </script>
@endsection
