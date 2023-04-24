@extends('site.template')
@section('style')
    <link href="{{ asset('/css/geral.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <div class="elemento_50_alt">
                    <div class="espaco_elemento">    
                        <div class="flex_card_element">
                            <div class="card_element">
                                <a class="element_content" href="{{route('new_adm')}}">
                                    <i class="bi bi-person-fill-add icon_sf"></i>
                                    <p class="title_card">Novo ADM</p>
                                </a>
                            </div>
                            <div class="card_element">
                                <a class="element_content" href="{{route('new_pergunta')}}">
                                    <i class="bi bi-journal-plus icon_sf"></i>
                                    <p class="title_card">Novo Material</p>
                                </a>
                            </div>
                            <div class="card_element">
                                <a class="element_content" href="{{route('new_pergunta')}}">
                                    <i class="bi bi-patch-question icon_sf"></i>
                                    <p class="title_card">Nova Pergunta</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elemento_50_alt">
                   
                </div>  
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection