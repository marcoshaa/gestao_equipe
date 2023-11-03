@extends('site.template')
@section('style')
<link href="{{ asset('/css/geral.css') }}" rel="stylesheet">
<style>
    .group_element>table{
        color:white;
        width: 100%;
        margin-top:5%;
    }

    table, th, td {
        border: 1px solid;
    }
    tr>td{
        padding: 4px 3px;
        width: auto;
    }
    .idUserTable{
        text-align: -webkit-center;
        width: 15%;
    }
</style>
@endsection

@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <div class="group_element">
                    <table>
                        <thead>
                            <tr>
                                <td>Título</td>
                                <td class="idUserTable">Id User</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as  $log)
                                <tr>
                                    <td>{{$log->titulo}}</td>
                                    <td class="idUserTable">{{$log->id_user}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection