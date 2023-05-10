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
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection