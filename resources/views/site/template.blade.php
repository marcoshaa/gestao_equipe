<?php
use App\Http\Controllers\site\InicialController;

$user = $this->getUser();


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLATAFORMA EDUCACIONAL LP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        :root {
            --background_site: #1e90ff;
            --background_topo: #ffffff;
            --cor_bt:#000;
            --cor_bt_hover:#fff;
            --text_padrao:#000;
            --text_offPadrao:#010;
            --cor_linha: linear-gradient(to right, rgb(235 129 23) 0%,rgb(6 251 0) 23%,rgb(0 154 0) 35%,rgb(0 80 0) 57%,rgba(0,2,2,1) 100%);
        }
        .content{
            display: flex;
        }
        .topo_content{
            width: 100%;
            height: 45px;
        }
        .item_menu{
            height:20px;
            width:100%;
            display:flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .topo_first_element{
            width:120px;
        }
    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>       
    @yield('style')
</head>
<body>
    <div class="content">
        <div class="topo_content">
            <div class="topo_first_element"><img src="" alt=""></div>
        </div>
        <div class="menu">
            <ul>
                @foreach($menu as $item)
                    <li class="item_menu">
                        <a href="{{$item->url}}">$item->title</a><i class="{{$item->icon}}"></i>
                    </li>
                @endforeach
            </ul>
        </div>
        @yield('content')
    </div>
</body>
</html>