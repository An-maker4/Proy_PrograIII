<?php
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Facturacion por mes</title>

		<style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    min-width: 360px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

		</style>
	</head>
	<body>
<script src="graficos/code/highcharts.js"></script>
<script src="graficos/code/modules/exporting.js"></script>
<script src="graficos/code/modules/export-data.js"></script>
<script src="graficos/code/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
    </p>
</figure>




		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Facturacion por Mes'
    },
    subtitle: {
        text: 'Parte de la adminstracion'
    },
    xAxis: {
        categories: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Oct','Nov','Dic']
    },
    yAxis: {
        title: {
            text: 'cantidad de facturacion'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'MESES',
        data: [0, 1, 0, 3, 5, 9, 4, 4, 1, 2]
    }]
});
		</script>
	</body>
</html>


