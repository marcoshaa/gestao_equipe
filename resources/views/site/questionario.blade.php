@extends(site.template)

@section('style')
    <style>
        .painel_forme_inicio{
            display:flex;
        }
        .topo_info_questionario{
            width:100%;
            padding:0px 10px;
        }
        .total_largura{
            width:100%;
        }
        .form_total{
            display:flex;
        }
    </style>
@endsection

@section('content')
    <div class="painel_forme_inicio">
        <div class="topo_info_questionario">

        </div>
        <div class="form_total">
            <form class="form_total total_largura">
                <div class="total_largura"><span></span></div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>

    </script>
@endsection