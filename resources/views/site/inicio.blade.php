@extends('site.template')
@section('style')
    <link href="{{ asset('/css/geral.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
    <style>
        .card_element{
            background:#ffffff8a;
        }
        .element_content{
            justify-content: space-between;
        }
        .text_apresentacao{
            color:white;
            font-size:20px;
        }
    </style>
@endsection

@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <div class="elemento_50_alt">
                    <div class="espaco_elemento">    
                        <div class="flex_card_element">
                            <div class="card_element">
                                <a class="element_content" href="{{route('viewMaterialSelec','matematica')}}">
                                    <i class="bi bi-journal-code icon_sf"></i>
                                    <p class="title_card">Matemática</p>
                                </a>
                            </div>
                            <div class="card_element">
                                <a class="element_content" href="{{route('viewMaterialSelec','logica')}}">
                                    <i class="bi bi-journal-code icon_sf"></i>
                                    <p class="title_card">Lógica</p>
                                </a>
                            </div>
                            <div class="card_element">
                                <a class="element_content" href="{{route('viewMaterialSelec','algoritmo')}}">
                                    <i class="bi bi-journal-code icon_sf"></i>
                                    <p class="title_card">Algoritmo</p>
                                </a>
                            </div>
                            <div class="card_element">
                                <a class="element_content" href="{{route('viewMaterialSelec','estruturaderepeticao')}}">
                                    <i class="bi bi-journal-code icon_sf"></i>
                                    <p class="title_card">Estrutura de<br>repetição</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elemento_50_alt">
                    <div class="espaco_elemento">
                        <div class="text_apresentacao">
                            <p>Ola <b class="text_destaque">{{$user->nome}}</b></p>
                            <p>Com base nas sua avaliação, identificamos que você teve um excelente desempenho na materia <b class="text_destaque">{{$medias[0]['titulo']}}</b> com uma media de <b class="text_destaque">{{$medias[0]['valor']}}%</b>.
                                No entanto, é importante que você melhore a suas habilidades <b class="text_destaque">{{$medias[1]['titulo']}}</b> com uma media de <b class="text_destaque">{{$medias[1]['valor']}}%</b>.
                            </p>
                        </div> 
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if($user->primeiro_acesso == 's')
        <script>
            (function(){
                swal.fire({
                    title:'Primeiro Acesso',
                    icon:'info',
                    allowOutsideClick: false,
                    showConfirmButton: true,
                    background:'#272a2b',
                    color:"#fff",
                    showCancelButton:false,
                    confirmButtonText:'Avançar',
                    text:'Olá <?php echo $user->nome?>, Bem vindo ao seu primeiro acesso, para darmos continuidade ao acesso na plataforma, tera que realizar 10 perguntas Obrigatórias.',
                }).then(function(isConfirm){
                    window.location.href = "{{route('quiz')}}";
                });
            })();
        </script>
    @endif
@endsection