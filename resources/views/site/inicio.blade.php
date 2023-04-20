@extends('site.template')

@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <!-- grafico -->                
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if($user->primeiro_acesso == 's')
        <script>
            (function(){
                swal.fire({
                    title:'Primeiro Acesso',
                    icon:'info',
                    allowOutsideClick: false,
                    showConfirmButton: true,
                    background:'#272a2b',
                    color:"#fff",
                    showCancelButton:false,
                    confirmButtonText:'Avançar',
                    text:'Olá <?php echo $user->nome?>, Bem vindo ao seu primeiro acesso, para darmos continuidade ao acesso na plataforma, tera que realizar 10 perguntas Obrigatórias.',
                }).then(function(isConfirm){
                    window.location.href = "{{route('quiz')}}";
                });
            })();
        </script>
    @endif
@endsection