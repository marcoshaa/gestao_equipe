<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-language" content="pt-br" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Login</title>
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
                margin-top: 150px;
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
        </style>
    </head>
<body>        
    <div class="primeiro_pai">
        <div class="primeiro_filho">
            <div class="painel_login">
                <form id="formLogin" onsubmit="event.preventDefault();" class="formulario_login">
                    @csrf
                    <div class="elemento_login espaco_form_login">  
                        <label class="labelLogin" for="email_login">Login</label>
                        <input class="campoLogin" type="email" id="email_login" name="email_login" required>
                    </div>
                    <div class="elemento_login espaco_form_login">
                        <label class="labelLogin" for="senha_login">Email</label>
                        <input class="campoLogin" type="password" id="senha_login" name="senha_login" required>
                    </div>
                    <div class="grupo_botao_login espaco_form_login">
                        <div>
                            <button type="button" class="botao_login" id="envia_bt_entrar">Entrar</button> 
                        </div>
                        <div>
                            <button type="button" class="botao_login" id="cad_novo_usuario">Cadastrar-se</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        
        $('#envia_bt_entrar').on('click', function(){
            $.ajax({
                type: "POST",
                url: `{{Route('login_validacao')}}`,
                data:$('#formLogin').serialize(),
                datatype: 'json',
            }).then(function(volta){
                if(volta != 'Email e/ou Senha incorretos'){
                    window.location.href = volta;
                }else{
                    Swal.fire({
                        position: 'Center',
                        icon: 'error',
                        title: 'Falha ao realizar o Login !',
                        html:`<div id="resolErros">${volta}</div>`,
                        showConfirmButton: true,                    
                    });   
                }              
            });
        });
        $('#cad_novo_usuario').on('click', function(){
            window.location.href = "{{route('cad_novo_us')}}";
        });
    </script>
</body>
</html>