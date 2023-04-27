@extends('site.template')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/css/loading.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/geral.css')}}">
    <style>
        .flex{
            display:flex;
            flex-wrap: wrap;
        }
        .formulario_login{
            width: 100%;
            flex-wrap: wrap;
            justify-content: center;
            padding: 10px 60px;
            /* margin: 20px;
            padding: 10px;
            border: 1px solid; */
            border-radius: 5px;
        }
        .perfil_campo{
            width:100%;
            margin-bottom:10px;
            margin-right: 10px;
            display: flex;
            flex-direction: column;
        }
        .campoUser_input {
            padding: 7px;
            border: 1px solid white;
            background:none;
            border-radius:5px;
            color:white;
            width: 100%;
        }
        .labelUser{
            color:#AE0233;            
            font-size: 18px;
            font-weight: bold;
            margin-bottom:10px;
        }
        .botao_perfil{
            padding: 10px 1px;
            border-radius: 5px;
            border: none;
            background: #AE0233;
            color: white;
            font-weight: bold;
            width: 100px;
            cursor: pointer;
        }
        .div_element_50{
            width: 50%;
        }
        .title_perfil{
            text-align-last: center;
            color: white;
            margin: 10px;
        }
        .borderDivi{
            border-right: 1px solid white;
        }
        .h100{
            height: 100%;
        }
        .perfil_campo_swal{
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin:7px;
        }
        .campo_endereco{
            display:flex;
            margin-right: 10px;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .w100{
            width: 100%;
        }
        .w20{
            width: 20%;
        }
        .w40{
            width: 40%;
        }
        .w50{
            width: 50%;
        }
        .w10{
            width: 10%;
        }
        .w30{
            width: 30%;
        }
        .w80{
            width: 80%;
        }
        .auto_largura_maior{
            flex: auto;            
        }
        .div_divis{
            margin-right: 15px;
        }
        .auto_largura_menor{
            flex: inherit;
        }
        .completa_line{
            flex: auto;
        }
        .div_graficos_elemento{
            width: 100%;
            display: flex;
            justify-content: center;
        }
        #form_data_nascimento{
            color-scheme: dark;
        }
    </style>
@endsection
@section('content')
    <div class="page_content">
        <div class="flex h100">
            <div class="div_element_50 borderDivi">
                <h2 class="title_perfil">Dados do Aluno</h2>
                <div class="topo_content flex">
                    <form id="formLogin" onsubmit="event.preventDefault();" class="formulario_login flex">
                        @csrf
                        <div class="perfil_campo">  
                            <label class="labelUser" for="form_nome_register">Nome</label>
                            <input class="campoUser_input " type="email" id="form_nome_register" name="form_nome_register" required>
                        </div>
                        <div class="flex w100" style="justify-content: space-between;margin: 0px 10px 10px 0px;">
                            <div class="perfil_campo w50">  
                                <label class="labelUser" for="form_date_register">Data de Nascimento</label>
                                <input class="campoUser_input " type="date" id="form_data_nascimento" name="form_date_register" required>
                            </div>
                            <div class="perfil_campo" style="width: 47%;">  
                                <label class="labelUser" for="sexo_aluno">Sexo</label>
                                <select class="campoUser_input ">
                                    <option value="PREFIRO NÃO IDENTIFICAR">Prefiro não identificar</option>
                                    <option value="FEMININO">Feminino</option>
                                    <option value="MASCULINO">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class=" perfil_campo">
                            <label class="labelUser" for="form_color">Cor do Perfil</label>
                            <input class="campoUser_input " type="color" id="form_color" name="form_color" required>
                        </div> -->
                        <div class="perfil_campo">
                            <label class="labelUser" for="form_color">Formação</label>
                            <select class="campoUser_input ">
                                <option value="NAO_ALFABETIZADO">Não Alfabetizado</option>
                                <option value="ENSINO_FUNDAMENTAL_INCOMPLETO">Ensino Fundamental Incompleto</option>
                                <option value="ENSINO_FUNDAMENTAL_COMPLETO">Ensino Fundamental Completo</option>
                                <option value="ENSINO_MEDIO_INCOMPLETO">Ensino Medio Incompleto</option>
                                <option value="ENSINO_MEDIO_COMPLETO">Ensino Medio Completo</option>
                                <option value="ENSINO_SUPERIOR_INCOMPLETO">Ensino Superior Incompleto</option>
                                <option value="ENSINO_SUPERIOR_COMPLETO">Ensino Superior Completo</option>
                                <option value="POS_GRADUACAO">Pos Graduação</option>
                            </select>
                        </div>
                        <div class="campo_endereco w100">
                            <div class="flex w100">
                                <div class="w20 div_divis">
                                    <div class="perfil_campo">
                                        <label class="labelUser" for="cep_registro">CEP</label>
                                        <input class="campoUser_input " type="email" id="cep_registro" name="cep_registro">
                                    </div>
                                </div>
                                <div class="w30 div_divis">
                                    <div class="perfil_campo">
                                        <label class="labelUser" for="estado_casa">Estado</label>
                                        <select class="campoUser_input " id="estado_casa" name="estado_casa">
                                            <option value="">Selecione o estado</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="completa_line">
                                    <div class="perfil_campo">
                                        <label class="labelUser" for="cidade_casa">Cidade</label>
                                        <input class="campoUser_input " type="email" id="cidade_casa" name="cidade_casa">
                                    </div>
                                </div>
                            </div>
                            <div class="flex w100">
                                <div class="w40 div_divis">
                                    <div class="perfil_campo">
                                        <label class="labelUser" for="bairro_casa">Bairro</label>
                                        <input class="campoUser_input " type="email" id="bairro_casa" name="bairro_casa">
                                    </div>
                                </div>
                                <div class="auto_largura_maior div_divis">
                                    <div class="perfil_campo">
                                        <label class="labelUser" for="rua_casa">Rua</label>
                                        <input class="campoUser_input " type="email" id="rua_casa" name="rua_casa">
                                    </div>
                                </div>
                                <div class="">
                                    <div class="perfil_campo">
                                        <label class="labelUser" for="numero_casa">N°</label>
                                        <input class="campoUser_input " type="email" id="numero_casa" name="numero_casa">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--<form id="formLogin" onsubmit="event.preventDefault();" class="formulario_login flex">
                        @csrf
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_nome_register">Email Institucional</label>
                            <input class="campoUser_input " type="email" id="form_nome_register" name="form_nome_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_nome_register">RA</label>
                            <input class="campoUser_input " type="email" id="form_nome_register" name="form_nome_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_email_register">Instituição</label>
                            <input class="campoUser_input " type="email" id="form_email_register" name="form_email_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_email_register">Unidade</label>
                            <input class="campoUser_input " type="email" id="form_email_register" name="form_email_register" required>
                        </div>
                        <div class=" perfil_campo">  
                            <label class="labelUser" for="form_date_register">Data de Inicio do Curso</label>
                            <input class="campoUser_input " type="date" id="form_date_register" name="form_date_register" required>
                        </div>                                      
                    </form>-->
                </div>
                <div class="flex" style="justify-content: space-evenly;">
                    <div>
                        <button type="button" class="botao_perfil" id="envia_dados">Salvar</button> 
                    </div>
                    <div>
                        <button type="button" class="botao_perfil" id="trocaSenha">Trocar Senha</button> 
                    </div>                       
                </div>
            </div>
            <div class="div_element_50">
                <div class="dados_ensino">
                    <h2 class="title_perfil">Resultados do Aluno</h2>
                </div>
                <div class="div_graficos_elemento" id="in"></div>
            </div>  
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $("#cep_registro").mask("99999-999");
    $(function() {
        $('#cep_registro').change(function() {
        const cep = this.value.replace("-","");
        $.ajax({
            method: 'GET',
            mode: 'cors',
            cache: 'default',       
            url: `https://brasilapi.com.br/api/cep/v2/${cep}`,  
            dataType: 'json',        
            success: function(result){
                if(result != 'erro'){
                    document.getElementById("rua_casa").value = result.street;
                    document.getElementById("bairro_casa").value = result.neighborhood;
                    document.getElementById("cidade_casa").value = result.city;
                    document.getElementById("estado_casa").value = result.state
                }             
            }            
        });
        });
    });
    $('#trocaSenha').click(function(){
        swal.fire({
            customClass: {
                confirmButton: 'botao_perfil'                
            },
            buttonsStyling: false,
            title:'Alterar Senha',
            allowOutsideClick: false,
            showCloseButton: true,
            showConfirmButton: true,
            confirmeBackgroud:'#ff3d00',
            confirmButtonText:'Enviar',
            background:'#272a2b',
            color:"#fff",
            html:`
                <div class=" perfil_campo_swal">  
                    <label class="labelUser" for="senha_atual">senha atual</label>
                    <input class="campoUser_input " type="password" id="senha_atual" name="senha_atual" required maxlength="6" minlength="6">
                </div>
                <div class=" perfil_campo_swal">  
                    <label class="labelUser" for="senha_nova">Nova senha</label>
                    <input class="campoUser_input " type="password" id="senha_nova" name="senha_nova" required maxlength="6" minlength="6">
                </div>
                <div class=" perfil_campo_swal">  
                    <label class="labelUser" for="senha_nova_cf">Confirma nova senha</label>
                    <input class="campoUser_input " type="password" id="senha_nova_cf" name="senha_nova_cf" required maxlength="6" minlength="6">
                </div>
            `
        }).then(function(isConfirm){
            if(isConfirm){
                let pAtu =document.getElementById("senha_atual").value;
                let pNew =document.getElementById("senha_nova").value;
                let pNewCf =document.getElementById("senha_nova_cf").value;
                $.ajax({
                    'type':post,
                    'url':`{{route('trocaSenha')}}`,
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'senhaAtual':pAtu,
                        'senhaNova':pNew,
                        'confirmSenhaNova':pNewCf,
                    },
                    datatype: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title:'Carregando',
                            showConfirmButton: false,
                            background:'#272a2b',
                            color:"#fff",
                            html:`
                                <div class="div_load">
                                    <div class="carregando_espera"></div>
                                </div>
                            `
                        })
                    },
                });         
            }
        })
    })

    $('#cep_registro').on('change',function(){
        let cep = document.getElementById("cep_registro").value;
        $.ajax({
            type:'get',
            url:`https://brasilapi.com.br/api/cep/v1/${cep}`,
            datatype:'json',
        }).then(function(volta){
            document.getElementById("estado_casa").value = volta.state;
            document.getElementById("cidade_casa").value = volta.city;
            document.getElementById("bairro_casa").value = volta.neighborhood;
            document.getElementById("rua_casa").value = volta.street;
        })
    })
</script>
<script>
    $(function() {        
        $.ajax({
            method: 'POST',
            url: "{{route('PrimeiroGrafico')}}",
            data:{"_token":"{{ csrf_token() }}"},
            dataType: 'json',        
            success: function(result){
                drawChart(result);           
            }            
        });
    });
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function dadosReal(dados){
        let x='';
        for(var i = 0; i<dados.length; i++ ){
           x=x+`['${Object.keys(dados[i])}', ${dados[i][Object.keys(dados[i])]}],`;
        }
        return x;
    } 
    function drawChart(dados) {
        // console.log(dados[0][Object.keys(dados[0])]);
        // console.log(Object.keys(dados[0]));
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        let x='';
        x = dadosReal(dados);
        console.log(x);
        data.addRows([['Matematica', 1],['Logica', 2],['Algoritmo', 0],['Estrutura de repeticao', 0]])        
            // ['Matematica', 3],
            // ['Logica', 2],
            // ['Algoritmo', 2],
            // ['Estrutura de repeticao', 2],
        // Set chart options
        var options = {            
            'title':'Resumo',
            'titleTextStyle':{'color':'#fff','bold':true,'fontSize':20},
            'width':600,
            'height':300,
            'is3D': true,
            'legend': { 'textStyle': { 'fontSize': 12,'color':'#fff' } },
            'backgroundColor': '#272a2b'
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('in'));
        chart.draw(data, options);
    }    
</script>
@endsection