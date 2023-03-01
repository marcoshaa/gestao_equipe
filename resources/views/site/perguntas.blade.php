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
                <form id="perguntas_form" onsubmit="event.preventDefault();">
                    
                </form>
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
    <script>
        function convertFormToJSON(form) {
            const array = $(form).serializeArray();
            const json = {};
            $.each(array, function() {
                json[this.name] = this.value || "";
            });
            return json;
        }
       
        $('#sub').on('click', function(){
            let enviaDados = convertFormToJSON('#perguntas_form');
            $.ajax({
                type: "POST",
                url: `{{Route('questao_enviada')}}`,
                data:{
                    "_token": "{{ csrf_token() }}",
                    'dados':enviaDados
                },
                datatype: 'json',
                beforeSend: function() {
                    Swal.fire({
                        title:'Carregando',
                        showConfirmButton: false,
                        background:'#f1f2f3',
                        html:`
                            <div class="div_load">
                                <div class="carregando_espera"></div>
                            </div>
                        `
                    })
                },
                success: function(){
                    Swal.close();
                    Swal.fire({
                        title:'Respostas Enviadas',
                        icon:'success',
                        showConfirmButton: true,
                        background:'#f1f2f3',                        
                    })
                }
            })
        });
        $(document).ready(function(){
            (function (){
                $.ajax({
                    type: "POST",
                    url: `{{Route('questao_enviada')}}`,
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'dados':enviaDados
                    },
                    datatype: 'json',
                    beforeSend: function() {
                    Swal.fire({
                        title:'Carregando',
                        showConfirmButton: false,
                        background:'#f1f2f3',
                        html:`
                            <div class="div_load">
                                <div class="carregando_espera"></div>
                            </div>
                        `
                    })
                },
                success: function(result){
                    Swal.close();
                    let autoLop = document.getElementById("perguntas_form");
                    if(result != 'erro'){
                        for(var i = 0; i<result.length; i++ ){
                        autoLop.innerHTML += 
                            `
                            <div class="questao">
                            <div><p class="titulo_pergunta">${result[i].title}{</p></div>
                            <hr>
                            <div>
                                <ul>
                                    <li class="li_questao">
                                        <input type="radio" value="${result[i].title}" name="answer${i}">
                                        <label for="a" id="a_text" class="label_questao">${result[i].alternative_1}</label>
                                    </li>
                                    <li class="li_questao">
                                        <input type="radio" value="${result[i].title}" name="answer">
                                        <label for="b" id="a_text" class="label_questao">${result[i].alternative_2}</label>
                                    </li>
                                    <li class="li_questao">
                                        <input type="radio" value="${result[i].title}" name="answer">
                                        <label for="c" id="a_text" class="label_questao">${result[i].alternative_3}</label>
                                    </li>
                                    <li class="li_questao">
                                        <input type="radio" value="${result[i].title}" name="answer">
                                        <label for="d" id="a_text" class="label_questao">${result[i].alternative_4}</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                            `
                        }
                    }else{
                        $("#form_cpfOper").val('');
                    }
                }
                })                
            })();
        });
    </script>  
@endsection
