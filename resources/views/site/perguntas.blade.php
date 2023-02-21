@extends('site.template')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/first_quiz.css')}}"> 
@endsection

@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <div class="progress-container">
                    <div class="progress" id="progress"></div>
                    <div class="circle active" id="circle1">1</div>
                    <div class="circle" id="circle2">2</div>
                    <div class="circle" id="circle3">3</div>
                    <div class="circle" id="circle4">4</div>
                    <div class="circle" id="circle5">5</div>
                    <div class="circle" id="circle6">6</div>
                    <div class="circle" id="circle7">7</div>
                    <div class="circle" id="circle8">8</div>
                    <div class="circle" id="circle9">9</div>
                    <div class="circle" id="circle10">10</div>
                </div>
                <div class="questao"></div>
                <div class="flex_btn_grupo">
                    <button class="btn" id="prev" disabled>Voltar</button>
                    <button class="btn" id="next">Proximo</button>
                    <button class="btn" id="sub">Enviar</button>
                </div>
            </div>
        </div>    
    </div>
@endsection
@section('script')
    <script src="{{asset('/js/first_quiz.js')}}"></script>    
@endsection
