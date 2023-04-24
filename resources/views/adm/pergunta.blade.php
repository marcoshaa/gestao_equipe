@extends('site.template')
@section('style')
<link href="{{ asset('/css/geral.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
@endsection
@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <div class="group_element">
                    <form  class="form_block" onsubmit="event.preventDefault();" id="form_cadastro">
                        @csrf
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_anternative_4"><p class="title_card">Materia</p></label>
                            <select class="input_form_adm w100" name="form_material" id="form_anternative_correta">
                                @foreach($materiais as $material)
                                    <option class="backPadrao" value="{{$material->id}}">{{$material->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_titulo"><p class="title_card">Titulo:</p></label>
                            <textarea  class="input_form_adm w100" rows="3" cols="100" id="form_titulo" name="form_titulo"></textarea >
                        </div>
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_anternative_1"><p class="title_card">Alternativa 1</p></label>
                            <input class="input_form_adm w100" id="form_anternative_1" name="form_anternative_1" autocomplete="off">
                        </div>
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_anternative_2"><p class="title_card">Alternativa 2</p></label>
                            <input class="input_form_adm w100" id="form_anternative_2" name="form_anternative_2" autocomplete="off">
                        </div>
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_anternative_3"><p class="title_card">Alternativa 3</p></label>
                            <input class="input_form_adm w100" id="form_anternative_3" name="form_anternative_3" autocomplete="off">
                        </div>
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_anternative_4"><p class="title_card">Alternativa 4</p></label>
                            <input class="input_form_adm w100" id="form_anternative_4" name="form_anternative_4" autocomplete="off">
                        </div>
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_anternative_4"><p class="title_card">Alternativa Correta</p></label>
                            <select class="input_form_adm w100" name="form_anternative_correta" id="form_anternative_correta">
                                <option class="backPadrao" value="form_anternative_1">Alternativa 1</option>
                                <option class="backPadrao" value="form_anternative_2">Alternativa 2</option>
                                <option class="backPadrao" value="form_anternative_3">Alternativa 3</option>
                                <option class="backPadrao" value="form_anternative_4">Alternativa 4</option>
                            </select>
                        </div>
                        <div class="element_cad">
                            <div>
                                <button id="envia_dados">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#envia_dados').on('click', function(){
            $.ajax({
                type: "POST",
                url: `{{Route('newPergunta')}}`,
                data:$('#form_cadastro').serialize(),
                datatype: 'json',
                beforeSend: function() {
                    Swal.fire({
                        title:'Carregando',
                        showConfirmButton: false,
                        background:'#272a2b',
                        color:'#fff',
                        html:`
                            <div class="div_load">
                                <div class="carregando_espera"></div>
                            </div>
                        `
                    })
                },
                success: function(volta){
                    Swal.close();
                    if(volta == 'ok'){
                        Swal.fire({
                            position: 'Center',
                            icon: 'success',
                            background:'#272a2b',
                            color:'#fff',
                            title: 'Cadastro Realizado com Sucesso !',                            
                            showConfirmButton: true,                    
                        });
                    }else if(volta == 'erro'){
                        Swal.fire({
                            position: 'Center',
                            icon: 'error',
                            color:'#fff',
                            background:'#272a2b',
                            title: 'Falha ao realizar o Cadastro da Pergunta !',                            
                            showConfirmButton: true,                    
                        });  
                    }  
                }, 
                error: function(volta) { 
                    Swal.close();
                    if(volta == 'erro'){
                        Swal.fire({
                            position: 'Center',
                            icon: 'error',
                            color:'#fff',
                            background:'#272a2b',
                            title: 'Falha ao realizar o Cadastro da Pergunta !',                        
                            showConfirmButton: true,                    
                        }); 
                    }else{
                        Swal.fire({
                            position: 'Center',
                            icon: 'error',
                            color:'#fff',
                            background:'#272a2b',
                            title: 'Falha ao realizar o Cadastro da Pergunta !',                        
                            showConfirmButton: true,                    
                        });
                    }
                },
            });
        });
    </script>
@endsection