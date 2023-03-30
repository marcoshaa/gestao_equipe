@extends('site.template')
@section('style')
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
    </style>
@endsection
@section('content')
    <div class="page_content">
        <div class="flex">
            <div class="div_element_50">
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
                            <label class="labelUser" for="form_color">Cor do Perfil</label>
                            <input class="campoUser_input" type="color" id="form_color" name="form_color" required>
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
                <div class="flex" style="justify-content: center;">
                    <div>
                        <button type="button" class="botao_perfil" id="envia_dados">Salvar</button> 
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
@endsection