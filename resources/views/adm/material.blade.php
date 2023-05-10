@extends('site.template')
@section('style')
<link href="{{ asset('/css/geral.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
@endsection
@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <div class="group_element">
                    <form  class="form_block" onsubmit="event.preventDefault();" id="form_cadastro" enctype="multipart/form-data">
                        @csrf
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_anternative_4"><p class="title_card">Materia</p></label>
                            <select class="input_form_adm w100" name="form_material" id="form_anternative_correta">
                                @foreach($materiais as $material)
                                    <option class="backPadrao" value="{{$material->id}}">{{$material->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_titulo"><p class="title_card">Titulo:</p></label>
                            <input class="input_form_adm w100" id="form_titulo" name="form_titulo" autocomplete="off">
                        </div>
                        <div class="element_cad w100">
                            <label class="title_card_label" for="form_anexo"><p class="title_card">Material:</p></label>
                            <input type="file" class="input_form_adm w100" id="form_anexo" name="form_anexo" accept="application/pdf" >
                        </div>
                        <div class="element_cad">
                            <div>
                                <button id="envia_dados">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#envia_dados').click(sendFromData);
        function sendFromData(){
            let form = $('#form_cadastro').get(0);
            let formData = new FormData(form);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: `{{Route('newMaterial')}}`,
                data:formData,                
                processData: false,
                contentType: false,
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
                        });
                    }else if(volta == 'erro'){
                        Swal.fire({
                            position: 'Center',
                            icon: 'error',
                            color:'#fff',
                            background:'#272a2b',
                            title: 'Falha ao realizar o Cadastro do Material !',                            
                            showConfirmButton: true,                    
                        });  
                    }  
                }, 
                error: function(volta) { 
                    Swal.close();
                    if(volta == 'erro'){
                        Swal.fire({
                            position: 'Center',
                            icon: 'error',
                            color:'#fff',
                            background:'#272a2b',
                            title: 'Falha ao realizar o Cadastro do Material !',                        
                            showConfirmButton: true,                    
                        }); 
                    }else{
                        Swal.fire({
                            position: 'Center',
                            icon: 'error',
                            color:'#fff',
                            background:'#272a2b',
                            title: 'Falha ao realizar o Cadastro do Material !',                        
                            showConfirmButton: true,                    
                        });
                    }
                },
            });
        }
    </script>
@endsection