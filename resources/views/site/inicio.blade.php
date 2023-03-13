@extends('site.template')

@section('content')
    <div class="page_content">
        <div class="all_elements">
            <div class="topo_content">
                <!-- grafico -->
                <div id="in"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['Matematica', 3],
            ['Logica', 2],
            ['Algoritmo', 2],
            ['LGPD', 2],
            ['Logica Mat.', 2]
        ]);

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
        drawChart();
    </script>
@endsection