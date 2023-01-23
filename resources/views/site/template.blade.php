<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLATAFORMA EDUCACIONAL LP</title>
    <style>
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
    <script src="jquery-3.6.1.min.js"></script>
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
                <li><a href="{{}}">Inicio</a></li>
                <li><a href="">Meu Perfil</a></li>
                <li><a href="">Cursos</a></li>
            </ul>
        </div>
        @yield('content')
    </div>
</body>
</html>