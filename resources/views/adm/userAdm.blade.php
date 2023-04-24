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
                    <form class="form_block" onsubmit="event.preventDefault();" id="form_cadastro">
                        @csrf
                        <div class="element_cad">
                            <label class="title_card_label" for="form_nome"><p class="title_card">Nome:</p></label>
                            <input class="input_form_adm" class="input_form_adm" type="text" id="form_nome" name="form_nome">
                        </div>
                        <div class="element_cad">
                            <label class="title_card_label" for="form_email"><p class="title_card">Email:</p></label>
                            <input class="input_form_adm" type="email" id="form_email" name="form_email">
                        </div>
                        <div class="element_cad">
                            <label class="title_card_label" for="form_data_nascimento"><p class="title_card">Data Nascimento:</p></label>
                            <input class="input_form_adm" type="date" id="form_data_nascimento" name="form_data_nascimento">
                        </div>
                        <div class="element_cad">
                            <label class="title_card_label" for="form_senha"><p class="title_card">Senha:</p></label>
                            <input class="input_form_adm" type="password" id="form_senha" name="form_senha" maxlength="6" minlength="6">
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
                url: `{{Route('newAdm')}}`,
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
                    }else if(volta == 'fail'){
                        Swal.fire({
                            position: 'Center',
                            icon: 'error',
                            color:'#fff',
                            background:'#272a2b',
                            title: 'Falha ao realizar o Cadastro !',
                            html:`<div id="resolErros">${volta}</div>`,
                            showConfirmButton: true,                    
                        });  
                    }  
                }, 
                error: function(volta) { 
                    Swal.close();
                    Swal.fire({
                        position: 'Center',
                        icon: 'error',
                        color:'#fff',
                        background:'#272a2b',
                        title: 'Falha ao realizar o Cadastro !',
                        html:`<div id="resolErros">${volta}</div>`,
                        showConfirmButton: true,                    
                    });           
                },
            });
        });
    </script>
@endsection