@extends('site.template')
@section('style')
    <link href="{{ asset('/css/geral.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
        .espaco_elemento {
            margin: 20px;
            padding: 5px 30px;
            background: #393B3C;
            border-radius: 5px;
        }
        .text_titulo{
            color:#ae0233;
            font-size:20px;
            font-weight: bolder;
        }
        .grade_pdf{
            display:grid;
        }
        .grade_pdf {
            margin: 20px;
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            grid-template-rows: 150px 150px 150px;
            gap: 90px 120px;
        }
        .bi-filetype-pdf {
            font-size: 50px;
            color: #ae0233;
        }
        .icone_pdf{
            margin-bottom: 10px;
        }
        .elemento_card{
            background: #393b3c;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 8px #ae0233;
            text-decoration-line: none;
        }
    </style>
@endsection

@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <div class="espaco_elemento">
                    <p class="text_titulo">storage/{{$link}}</p>
                </div>
                <div class="grade_pdf">
                    @foreach($pdfs as $pdf)
                        <a class="elemento_card" href="{{$pdf['link']}}" target="_blank">
                            <div class="icone_pdf">
                                <i class="bi bi-filetype-pdf"></i>
                            </div>
                            <div>
                                <p class="text_titulo">{{$pdf['titulo']}}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection