<!DOCTYPE html>
<html lang="pt-br">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-language" content="pt-br" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="{{ asset('/css/newblade.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>
        <title>Cadastro</title>
        <style>
            :root{
                --background_fundo: #002c2b;
                --cor_botao_entrar;
                --cor_botao_cad;
            }
            /* body{            
                background:var(--background_fundo);
            } */
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
                padding: 20px 10px;
                border-radius: 10px;
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
                height: 32px;
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
                background: #c70039;
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
    <div id="all">
        <div class="cursor"></div>        
        <div id="breaker">
        </div>
        <div id="breaker-two">
        </div>       
        <div id="header">
            <div id="particles"></div>
                <div class="header-content">
                    <div class="header-content-box">
                    <div class="firstline"><span class="color">Lógica </span>de Programação</div>
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
                                    <label class="labelLogin" for="form_senha">Senha <span id="invalidacao_senha"  class="invi">*</span></label>
                                    <input class="campoLogin" type="password" id="form_senha" name="form_senha" required>
                                </div>
                                <div class="elemento_login espaco_form_login">
                                    <label class="labelLogin" for="form_senha_confirm">Confirma Senha <span id="invalidacao_senha2" class="invi">*</span></label>
                                    <input class="campoLogin" type="password" id="form_senha_confirm" name="form_senha_confirm" required>
                                </div>
                                <div class="grupo_botao_login espaco_form_login">
                                    <div>
                                        <button type="button" class="botao_login" id="envia_login">Login</button> 
                                    </div>  
                                    <div>
                                        <button type="button" class="botao_login" id="envia_dados" disabled>Cadastrar-se</button> 
                                    </div>                       
                                </div>
                            </form>
                            </div>
                        </div>                  
                    </div>
                </div>
            </div>    
            <div class="footer">
                <div class="footer-text">
                    Trabalho De Conclusao De Curso UNIP
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/particles.js')}}"></script>
    <script src="{{asset('js/particles.min.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
    <script>
        particlesJS("particles", {"particles":{"number":{"value":40,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});
    </script>
    <script>
        $('#envia_login').on('click',function(){
            window.location.href = "{{route('login')}}";
        })
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
                        }).then(function(isConfirm) {
                            if (isConfirm) {
                                window.location.href = "{{route('login')}}";
                            }
                        })
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