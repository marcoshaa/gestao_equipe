<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\site\InicialController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect;

$user = User::where('id', Auth::id())->first();

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
            margin: 0px 10px 0px 20px;
            border-radius: 5px;
            background:  var(--corMenuLateal);
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
            font-size:20px;
            color: white;
            font-weight: bold;
        }
    </style>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>       
    @yield('style')
</head>
<body>
    <div class="content">
        <div class="topo_content_banner">
            <div class="topo_first_element"><span class="logo">PLATAFORMA EDUCACIONAL LP</span></div>
            <div class="topo_logout_banner"><span class="sair_sistema"> Usuario: {{$user->nome ?? ''}} |</span> <a class="a_sair_sistema" href="{{route('logout')}}"><span class="sair_sistema">Sair</span></a></div>
        </div>
        <div class="banner">
            <div class="menu">
                <ul class="menu_lista">
                    <li>
                        <a class="item_menu" href="{{route('inicio')}}"><i class="fa-solid fa-house menu_icon"></i><span class="leg">Inicio</span></a>
                    </li>
                    <li>
                        <a class="item_menu" href="{{route('perfil')}}"><i class="fa-solid fa-user menu_icon"></i><span class="leg">Perfil</span></a>
                    </li>
                    <li>
                        <a class="item_menu" href="{{route('quiz')}}"><i class="fa-solid fa-question menu_icon"></i><span class="leg">Quiz</span></a>
                    </li>
                    <li>
                        <a class="item_menu" href="{{route('perfil')}}"><i class="fa-solid fa-book menu_icon"></i><span class="leg">Material</span></a>
                    </li>
                </ul>
            </div>
            @yield('content')
        </div>
    </div>    
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    @yield('script')
</body>
</html>