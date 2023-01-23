<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLATAFORMA EDUCACIONAL LP</title>
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
    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>       
    @yield('style')
</head>
<body>
    <div class="content">
        <div class="topo_content"></div>
        <div class="menu">

        </div>
        @yield('content')
    </div>
</body>
</html>