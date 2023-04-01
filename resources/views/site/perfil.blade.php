@extends('site.template')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
    <style>
        .flex{
            display:flex;
            flex-wrap: wrap;
        }
        .formulario_login{
            width: 100%;
            flex-wrap: wrap;
            justify-content: center;
            padding: 10px 60px;
            /* margin: 20px;
            padding: 10px;
            border: 1px solid; */
            border-radius: 5px;
        }
        .perfil_campo{
            width:100%;
            margin-bottom:10px;
            margin-right: 10px;
        }
        .campoUser_input{
            border-radius:5px;
            padding: 5px;
            outline: none;
            border: none;
            width: 95%;
        }
        .labelUser{
            color: white;
            font-size: 16px;
            font-weight: bold;
        }
        .botao_perfil{
            padding: 5px;
            border-radius: 5px;
            border: none;
            background: #ff3d00;
            color: white;
            font-weight: bold;
            width: 100px;
            cursor: pointer;
        }
        .div_element_50{
            width: 50%;
        }
        .title_perfil{
            text-align-last: center;
            color: white;
            margin: 10px;
        }
        .borderDivi{
            border-right: 1px solid white;
        }
        .h100{
            height: 100%;
        }
        .perfil_campo_swal{
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin:7px;
        }
    </style>
@endsection
@section('content')
    <div class="page_content">
        <div class="flex h100">
            <div class="div_element_50 borderDivi">
                <h2 class="title_perfil">Dados do Aluno</h2>
                <div class="topo_content flex">
                    <form id="formLogin" onsubmit="event.preventDefault();" class="formulario_login flex">
                        @csrf
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_nome_register">Nome</label>
                            <input class="campoUser_input" type="email" id="form_nome_register" name="form_nome_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_date_register">Data de Nascimento</label>
                            <input class="campoUser_input" type="date" id="form_date_register" name="form_date_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="sexo_aluno">Sexo</label>
                            <select class="campoUser_input">
                                <option value="PREFIRO NÃO IDENTIFICAR">Prefiro não identificar</option>
                                <option value="FEMININO">Feminino</option>
                                <option value="MASCULINO">Masculino</option>
                            </select>
                        </div>
                        <!-- <div class=" perfil_campo">
                            <label class="labelUser" for="form_color">Cor do Perfil</label>
                            <input class="campoUser_input" type="color" id="form_color" name="form_color" required>
                        </div> -->
                        <div class=" perfil_campo">
                            <label class="labelUser" for="form_color">Formação</label>
                            <select class="campoUser_input">
                                <option value="NAO_ALFABETIZADO">Não Alfabetizado</option>
                                <option value="ENSINO_FUNDAMENTAL_INCOMPLETO">Ensino Fundamental Incompleto</option>
                                <option value="ENSINO_FUNDAMENTAL_COMPLETO">Ensino Fundamental Completo</option>
                                <option value="ENSINO_MEDIO_INCOMPLETO">Ensino Medio Incompleto</option>
                                <option value="ENSINO_MEDIO_COMPLETO">Ensino Medio Completo</option>
                                <option value="ENSINO_SUPERIOR_INCOMPLETO">Ensino Superior Incompleto</option>
                                <option value="ENSINO_SUPERIOR_COMPLETO">Ensino Superior Completo</option>
                                <option value="POS_GRADUACAO">Pos Graduação</option>
                            </select>
                        </div>
                    </form>
                    <!-- <form id="formLogin" onsubmit="event.preventDefault();" class="formulario_login flex">
                        @csrf
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_nome_register">Email Institucional</label>
                            <input class="campoUser_input" type="email" id="form_nome_register" name="form_nome_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_nome_register">RA</label>
                            <input class="campoUser_input" type="email" id="form_nome_register" name="form_nome_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_email_register">Instituição</label>
                            <input class="campoUser_input" type="email" id="form_email_register" name="form_email_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_email_register">Unidade</label>
                            <input class="campoUser_input" type="email" id="form_email_register" name="form_email_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_date_register">Data de Inicio do Curso</label>
                            <input class="campoUser_input" type="date" id="form_date_register" name="form_date_register" required>
                        </div>                                      
                    </form>                     -->
                </div>
                <div class="flex" style="justify-content: space-evenly;">
                    <div>
                        <button type="button" class="botao_perfil" id="envia_dados">Salvar</button> 
                    </div>
                    <div>
                        <button type="button" class="botao_perfil" id="trocaSenha">Trocar Senha</button> 
                    </div>                       
                </div>
            </div>
            <div class="div_element_50">
                <div class="dados_ensino">
                    <h2 class="title_perfil">Resultados do Aluno</h2>
                </div>
            </div>  
        </div>
    </div>
@endsection

@section('script')
<script>
    $('#trocaSenha').click(function(){
        swal.fire({
            customClass: {
                confirmButton: 'botao_perfil'                
            },
            buttonsStyling: false,
            title:'Alterar Senha',
            allowOutsideClick: false,
            showCloseButton: true,
            showConfirmButton: true,
            confirmeBackgroud:'#ff3d00',
            confirmButtonText:'Enviar',
            background:'#272a2b',
            color:"#fff",
            html:`
                <div class=" perfil_campo_swal">  
                    <label class="labelUser" for="senha_atual">senha atual</label>
                    <input class="campoUser_input" type="password" id="senha_atual" name="senha_atual" required maxlength="6" minlength="6">
                </div>
                <div class=" perfil_campo_swal">  
                    <label class="labelUser" for="senha_nova">Nova senha</label>
                    <input class="campoUser_input" type="password" id="senha_nova" name="senha_nova" required maxlength="6" minlength="6">
                </div>
                <div class=" perfil_campo_swal">  
                    <label class="labelUser" for="senha_nova_cf">Confirma nova senha</label>
                    <input class="campoUser_input" type="password" id="senha_nova_cf" name="senha_nova_cf" required maxlength="6" minlength="6">
                </div>
            `
        }).then(function(isConfirm){
            if(isConfirm){
                let pAtu =document.getElementById("senha_atual").value;
                let pNew =document.getElementById("senha_nova").value;
                let pNewCf =document.getElementById("senha_nova_cf").value;
                $.ajax({
                    'type':post,
                    'url':`{{route('trocaSenha')}}`,
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'senhaAtual':pAtu,
                        'senhaNova':pNew,
                        'confirmSenhaNova':pNewCf,
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
                });         
            }
        })
    })
</script>
@endsection