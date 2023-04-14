<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\site\InicialController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect;

$user = User::where('id', Auth::id())->first();

if(empty(Auth::check())){
    return redirect ('/login');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLATAFORMA EDUCACIONAL LP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">    
    <link href="{{ asset('/css/newblade.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>    
    
    <style>
        :root {
            --background_site: #1e90ff;
            --background_topo: #ffffff;
            --background_fundo: #000;
            --cor_bt:#000;
            --corIconMenu:#fff;
            --corMenuLateal:#05566a;
            --cor_bt_hover:#fff;
            --text_padrao:#000;
            --text_offPadrao:#010;
            --cor_linha: linear-gradient(to right, rgb(235 129 23) 0%,rgb(6 251 0) 23%,rgb(0 154 0) 35%,rgb(0 80 0) 57%,rgba(0,2,2,1) 100%);
            --corNewblade:#272a2b;
        }
        body, html{
            height: 100%;
            margin: 0px;          
        }
        html{
            background:var(--background_fundo);
        }

        .content{
            display: flex;
            flex-wrap: wrap;
            height: 100%;
        }
        .topo_content_banner{
            width: 100%;
            height: 45px;
            display: flex;
            justify-content: space-between;
            margin: 0px 10px 10px 0px;
            align-items: center;
            background: var(--corMenuLateal);
        }
        .item_menu{
            height: 25px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            text-decoration: none;
            align-items: center;
        }
        .topo_first_element{
            margin-left: 10px;
        }
        .menu_lista{
            list-style: none !important;
            padding: 0px 8px;
            width: 90px;
        }        
        li{
            padding: 8px 0px;
        }
        .leg{
            color: white;
            margin-left: 10px;            
        }
        .page_content{
            width: 100%;
            height: 100%;
            border-radius: 5px;
            background: var(--corNewblade);
        }
        .banner{
            display: flex;
            width: 100%;
            height: 100%;
        }
        .menu{
            background: var(--corMenuLateal);
            border-radius: 0px 10px 10px 0px;
        }
        .menu_icon{
            color: var(--corIconMenu);
        }
        .topo_logout_banner{
            display:flex;            
        }
        .sair_sistema{
            text-decoration: none;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }
        .a_sair_sistema{
            text-decoration: none;
        }
        .logo{
            position: absolute;
            top: 6%;
            left: 4%;
            font-size:20px;
            color: white;
            font-weight: bold;
        }
        canvas.particles-js-canvas-el {
            position: absolute;
        }
        #corpo_html{
            height: 80%;
            z-index: 1;
        }
        .all_elements{
            height: 100%;
            display: flex;
            flex-wrap: wrap;
        }
        .firstline{
            font-size: 30px;
            color:white;
        }
        #userLogado{
            font-variant: petite-caps;
            font-weight: 200;
        }
    </style>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>       
    @yield('style')
</head>
<body>
    <div id="particles"></div>
    <div id="all">
        <div class="cursor"></div>
        <div id="breaker">
        
        </div>
        <div id="breaker-two">

        </div>
        <div id="navigation-content">
            <div class="logo">
            <span class="color">Usuário: </span><span id="userLogado"><?php echo $user->name?></span>
            </div>
            <div class="navigation-close">
                <span class="close-first"></span>
                <span class="close-second"></span>
            </div>
            <div class="navigation-links">
                <a href="{{route('inicio')}}" data-text="INÍCIO" id="home-link" >INÍCIO</a>
                <a href="{{route('perfil')}}" data-text="PERFIL" id="about-link" >PERFIL</a>
                <a href="{{route('quiz')}}" data-text="QUIZ" id="quiz-link" >QUIZ</a>
                <a href="{{route('perfil')}}" data-text="MATERIAL" id="mat-link" >MATERIAL</a>
                <a href="{{route('logout')}}" data-text="SAIR" id="mat-link" >SAIR</a>
            </div>
        </div>
        <div id="navigation-bar">     
            <div class="firstline"><span class="color">Lógica </span>de Programação</div>       
            <div class="menubar">
                <span class="first-span"></span>
                <span class="second-span"></span>
                <span class="third-span"></span>
            </div>
        </div>
        <div id="corpo_html">
            @yield('content')
        </div>
            <div class="footer">
                <div class="footer-text">
                    Trabalho De Conclusao De Curso UNIP
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/particles.js')}}"></script>
    <script src="{{asset('js/particles.min.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
    <script>
        particlesJS("particles", {"particles":{"number":{"value":40,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});
    </script>
    @yield('script')
</body>
</html>