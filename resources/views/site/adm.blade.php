@extends('site.template')
@section('style')
    <style>
        :root{
            --cor_padrao:#AE0233;
        }
        .elemento_50_alt{
            height:50%;
        }
        .espaco_elemento{
            margin: 50px;
            padding: 70px 30px;
            background: #393B3C;
        }
        .topo_content{
            width: 100%;
        }
        .flex_card_element{
            display: flex;
            margin: 10px;
            justify-content: space-evenly;
        }
        .card_element{
            display: flex;
        }
        .element_content{
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;
            text-decoration: none;
            border: 5px solid var(--cor_padrao);
            padding: 30px 50px;
            border-radius: 10px;
        }
        .title_card{
            color:var(--cor_padrao);
            font-size:20px;
        }
        .icon_sf{
            color:var(--cor_padrao);
            font-size:80px;
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
                                <a class="element_content" href="{{route('usuarioAdm')}}">
                                    <i class="bi bi-person-fill-add icon_sf"></i>
                                    <p class="title_card">Novo ADM</p>
                                </a>
                            </div>
                            <div class="card_element">
                                <a class="element_content" href="{{route('novoMaterial')}}">
                                    <i class="bi bi-journal-plus icon_sf"></i>
                                    <p class="title_card">Novo Material</p>
                                </a>
                            </div>
                            <div class="card_element">
                                <a class="element_content" href="{{route('novaPergunta')}}">
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