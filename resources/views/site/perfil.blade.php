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
            width: 100%;
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
        .campo_endereco{
            display:flex;
            margin-right: 10px;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .w100{
            width: 100%;
        }
        .w20{
            width: 20%;
        }
        .w40{
            width: 40%;
        }
        .w50{
            width: 50%;
        }
        .w10{
            width: 10%;
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
                        <div class="perfil_campo">  
                            <label class="labelUser" for="form_nome_register">Nome</label>
                            <input class="campoUser_input" type="email" id="form_nome_register" name="form_nome_register" required>
                        </div>
                        <div class="flex w100" style="justify-content: space-between;margin: 0px 10px 10px 0px;">
                            <div class="w50">  
                                <label class="labelUser" for="form_date_register">Data de Nascimento</label>
                                <input class="campoUser_input" type="date" id="form_date_register" name="form_date_register" required>
                            </div>
                            <div style="width: 47%;">  
                                <label class="labelUser" for="sexo_aluno">Sexo</label>
                                <select class="campoUser_input">
                                    <option value="PREFIRO NÃO IDENTIFICAR">Prefiro não identificar</option>
                                    <option value="FEMININO">Feminino</option>
                                    <option value="MASCULINO">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class=" perfil_campo">
                            <label class="labelUser" for="form_color">Cor do Perfil</label>
                            <input class="campoUser_input" type="color" id="form_color" name="form_color" required>
                        </div> -->
                        <div class="perfil_campo">
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
                        <div class="campo_endereco w100">
                            <div class="w20">
                                <div class="perfil_campo">
                                    <label class="labelUser" for="cep_registro">CEP</label>
                                    <input class="campoUser_input" type="email" id="cep_registro" name="cep_registro">
                                </div>
                            </div>
                            <div class="w30">
                                <div class="perfil_campo">
                                    <label class="labelUser" for="estado_casa">Estado</label>
                                    <select class="campoUser_input" id="estado_casa" name="estado_casa">
                                        <option value="">Selecione o estado</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w40">
                                <div class="perfil_campo">
                                    <label class="labelUser" for="cidade_casa">Cidade</label>
                                    <input class="campoUser_input" type="email" id="cidade_casa" name="cidade_casa">
                                </div>
                            </div>
                            <div class="w40">
                                <div class="perfil_campo">
                                    <label class="labelUser" for="bairro_casa">Bairro</label>
                                    <input class="campoUser_input" type="email" id="bairro_casa" name="bairro_casa">
                                </div>
                            </div>
                            <div class="w40">
                                <div class="perfil_campo">
                                    <label class="labelUser" for="rua_casa">Rua</label>
                                    <input class="campoUser_input" type="email" id="rua_casa" name="rua_casa">
                                </div>
                            </div>
                            <div class="w10">
                                <div class="perfil_campo">
                                    <label class="labelUser" for="numero_casa">N°</label>
                                    <input class="campoUser_input" type="email" id="numero_casa" name="numero_casa">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--<form id="formLogin" onsubmit="event.preventDefault();" class="formulario_login flex">
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
                    </form>-->
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $("#cep_registro").mask("99999-999");
    $(function() {
        $('#cep_registro').change(function() {
        const cep = this.value.replace("-","");
        $.ajax({
            method: 'GET',
            mode: 'cors',
            cache: 'default',       
            url: `https://brasilapi.com.br/api/cep/v2/${cep}`,  
            dataType: 'json',        
            success: function(result){
                if(result != 'erro'){
                    document.getElementById("rua_casa").value = result.street;
                    document.getElementById("bairro_casa").value = result.neighborhood;
                    document.getElementById("cidade_casa").value = result.city;
                    document.getElementById("estado_casa").value = result.state
                }             
            }            
        });
        });
    });
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