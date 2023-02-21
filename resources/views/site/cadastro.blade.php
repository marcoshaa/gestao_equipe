<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-language" content="pt-br" />
        <link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Cadastro</title>
        <style>
            :root{
                --background_fundo: #002c2b;
                --cor_botao_entrar;
                --cor_botao_cad;
            }
            body{            
                background:var(--background_fundo);
            }
            *{
                margin:0px;
                padding: 0px;
            }
            input:focus-visible,input:focus{
                outline:none;
            }
            .primeiro_pai{
                display: flex;
                justify-content: center;
                margin-top: 80px;
            }
            .primeiro_filho{
                display: flex;
                justify-content: center;
                padding: 50px 10px;
                border-radius: 10px;
                width: 30%;
                background: #0a837f7a;
            }
            .painel_login{
                border-radius: 10px;
                padding: 5px;
            }
            .formulario_login{
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
            }
            .elemento_login{
                display: flex;
                flex-direction: column;
            }
            .labelLogin{
                color:white;
                font-size:15px;
                font-weight: 600;
                font-family: serif;
                margin-bottom: 10px;
            }
            .campoLogin{
                padding: 3px 5px;
                border-radius: 5px;
                border: 1px solid #fafafa;
                width: 250px;
            }
            .grupo_botao_login{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
            }
            .botao_login{
                width: 100px;
                border: none;
                border-radius: 5px;
                padding: 7px 0px;
                color: white;
                background: #ff3d00;
                font-size: 14px;
                cursor: pointer;
                margin-top: 10px;
            }
            .espaco_form_login{
                margin: 10px 5px 0px;
            }
            .invi{
                display:none;
            }
            .viewElement{
                display:contents;
                color:#f82f2f;
            }
        </style>
    </head>
<body>        
    <div class="primeiro_pai">
        <div class="primeiro_filho">
            <div class="painel_login">
                <form id="formLogin" onsubmit="event.preventDefault();" class="formulario_login">
                    @csrf
                    <div class="elemento_login espaco_form_login">  
                        <label class="labelLogin" for="form_nome_register">Nome</label>
                        <input class="campoLogin" type="email" id="form_nome_register" name="form_nome_register" required>
                    </div>
                    <div class="elemento_login espaco_form_login">  
                        <label class="labelLogin" for="form_email_register">Email</label>
                        <input class="campoLogin" type="email" id="form_email_register" name="form_email_register" required>
                    </div>
                    <div class="elemento_login espaco_form_login">  
                        <label class="labelLogin" for="form_date_register">Data de Nascimento</label>
                        <input class="campoLogin" type="date" id="form_date_register" name="form_date_register" required>
                    </div>
                    <div class="elemento_login espaco_form_login">
                        <label class="labelLogin" for="form_color">Cor do Perfil</label>
                        <input class="campoLogin" type="color" id="form_color" name="form_color" required>
                    </div>
                    <div class="elemento_login espaco_form_login">
                        <label class="labelLogin" for="form_senha">Senha <span id="invalidacao_senha"  class="invi">*</span></label>
                        <input class="campoLogin" type="password" id="form_senha" name="form_senha" required>
                    </div>
                    <div class="elemento_login espaco_form_login">
                        <label class="labelLogin" for="form_senha_confirm">Confirma Senha <span id="invalidacao_senha2" class="invi">*</span></label>
                        <input class="campoLogin" type="password" id="form_senha_confirm" name="form_senha_confirm" required>
                    </div>
                    <div class="grupo_botao_login espaco_form_login">
                        <div>
                            <button type="button" class="botao_login" id="envia_dados" disabled>Cadastrar-se</button> 
                        </div>                       
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#envia_dados').on('click', function(){
            $.ajax({
                type: "POST",
                url: `{{Route('new_user')}}`,
                data:$('#formLogin').serialize(),
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
                success: function(volta){
                    Swal.close();
                    if(volta == 'ok'){
                        Swal.fire({
                            position: 'Center',
                            icon: 'success',
                            title: 'Cadastro Realizado com Sucesso !',                            
                            showConfirmButton: true,                    
                        }).then(function(isConfirm) {
                            if (isConfirm) {
                                window.location.href = "{{route('login')}}";
                            }
                        })
                    }else if(volta == 'fail'){
                        Swal.fire({
                            position: 'Center',
                            icon: 'error',
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
                        title: 'Falha ao realizar o Cadastro !',
                        html:`<div id="resolErros">${volta}</div>`,
                        showConfirmButton: true,                    
                    });           
                },
            });
        });

        $('#form_senha_confirm').on('change', function(){
           let senhaUm = document.getElementById("form_senha").value;
           let senhaDois = document.getElementById("form_senha_confirm").value;
           if(senhaUm == senhaDois){
            document.getElementById("envia_dados").disabled = false;
           }else{
                Swal.fire({
                    position: 'Center',
                    icon: 'error',
                    title: 'As senhas devem ser iguais !',
                    showConfirmButton: true,                    
                }).then(function(){ 
                    document.getElementById('form_senha_confirm').focus();
                    document.getElementById("invalidacao_senha").classList.add('viewElement');
                    document.getElementById("invalidacao_senha2").classList.add('viewElement');

                    document.getElementById("invalidacao_senha").classList.remove('invi');
                    document.getElementById("invalidacao_senha2").classList.remove('invi');
                })               
           }
        });
    </script>
</body>
</html>