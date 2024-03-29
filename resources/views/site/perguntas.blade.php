@extends('site.template')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/first_quiz.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
@endsection

@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <div class="progress-container" id="barraQuiz">
                    <div class="progress" id="progress"></div>
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
                url: `{{Route('recebeQuestao')}}`,
                data:{
                    "_token": "{{ csrf_token() }}",
                    'dados':enviaDados
                },
                datatype: 'json',
                beforeSend: function() {
                    Swal.fire({
                        title:'Carregando',
                        showConfirmButton: false,
                        background:'#272a2b',
                        color:"#fff",
                        html:`
                            <div class="div_load">
                                <div class="carregando_espera"></div>
                            </div>
                        `
                    })
                },
                success: function(result){
                    Swal.close();
                    if(result == "ok"){
                        Swal.fire({
                            title:'Respostas Enviadas',
                            icon:'success',
                            showConfirmButton: true,
                            background:'#272a2b', 
                            color:"#fff",                       
                        });
                    }else{
                        Swal.fire({
                            title:'Respostas não Enviadas, Confira as Questões',
                            icon:'error',
                            showConfirmButton: true,
                            background:'#272a2b', 
                            color:"#fff",                       
                        });
                    }
                }
            })
        });
        $(document).ready(function(){
            (function (){
                $.ajax({
                    type: "POST",
                    url: `{{Route('questao_enviada')}}`,
                    data:{"_token": "{{ csrf_token() }}"},
                    datatype: 'json',
                beforeSend: function() {
                    Swal.fire({
                    title:'Carregando',
                    showConfirmButton: false,
                    background:'#272a2b',
                    color:"#fff",
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
                    let LopPerguntas = document.getElementById("barraQuiz");
                    let classAtiva;                                   
                    if(result != 'erro'){
                        for(var i = 0; i<result.length; i++ ){
                            if((i+1) == 1){
                                classAtiva = 'active';
                            }else{
                                classAtiva = '';
                            }
                            LopPerguntas.innerHTML +=
                            `
                                <div class="circle ${classAtiva}" id="circle${i+1}">${i+1}</div>
                            `                        
                            autoLop.innerHTML +=
                             `
                            <div class="questao oculto" id="questao${i+1}">
                                <div><p class="titulo_pergunta">${result[i].title}</p></div>
                                <hr class="lineQuestao">
                                <div>
                                    <ul>
                                        <li class="li_questao">
                                            <input type="radio" value="${result[i].alternativa_1}" name="answer_${result[i].id}" id="a_${i+1}">
                                            <label for="a_${i+1}" id="a_text" class="label_questao">${result[i].alternativa_1}</label>
                                        </li>
                                        <li class="li_questao">
                                            <input type="radio" value="${result[i].alternativa_2}" name="answer_${result[i].id}" id="b_${i+1}">
                                            <label for="b_${i+1}" id="a_text" class="label_questao">${result[i].alternativa_2}</label>
                                        </li>
                                        <li class="li_questao">
                                            <input type="radio" value="${result[i].alternativa_3}" name="answer_${result[i].id}" id="c_${i+1}">
                                            <label for="c_${i+1}" id="a_text" class="label_questao">${result[i].alternativa_3}</label>
                                        </li>
                                        <li class="li_questao">
                                            <input type="radio" value="${result[i].alternativa_4}" name="answer_${result[i].id}" id="d_${i+1}">
                                            <label for="d_${i+1}" id="a_text" class="label_questao">${result[i].alternativa_4}</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            `
                        }
                    }                 
                }
                }).then(function(){
                    let perguntaFrist = document.getElementById('questao1')
                    perguntaFrist.classList.remove('oculto')
                    function questaoAtual(msg,id){
                        var after;
                        if(msg == 'avc'){
                            after = id-1;
                        }else{
                            after = id+1;
                        }
                        let novoCls = document.getElementById('questao'+id);
                        let antgCls = document.getElementById('questao'+after);
                        console.log(msg,id);
                        console.log(novoCls,antgCls);
                        novoCls.classList.remove('oculto');
                        antgCls.classList.add('oculto');
                    }
                    window.questaoAtual = questaoAtual;
                })
            })();            
        });
    </script>    
@endsection
