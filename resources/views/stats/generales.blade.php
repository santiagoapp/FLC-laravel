@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
<h1>Existencias</h1>
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="row">
					<div class="col-md-10">
						<h3 class="box-title">Registros</h3>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div id="tester1" style="height: 500px; width: 90%"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="row">
					<div class="col-md-10">
						<h3 class="box-title">Registros</h3>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div id="tester2" style="height: 500px; width: 90%"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('js')
<script src="{{asset('vendor\adminlte\vendor\plotly\plotly-latest.min.js')}}"></script>
<script>
	$(function () {
		TESTER = document.getElementById('tester1');
		var items = @json($result);
		var x = [];
		for (var i = 1; i < items.length; i++) 
		{
			x[i] = items[i].existencias
		}
		var trace1 = {
			x: x,
			name: 'control',
			autobinx: true, 
			histnorm: "count", 
			marker: {
				color: "rgba(255, 100, 102, 0.9)", 
				line: {
					color:  "rgba(255, 100, 102, 1)", 
					width: 1
				}
			},  
			opacity: 0.8, 
			type: "histogram",
			xbins: {
				end: 11, 
				size: 1, 
				start: 0
			}
		};

		var data = [trace1];
		var layout = {
			bargap: 0.05, 
			bargroupgap: 0.1, 
			barmode: "overlay", 
			title: "Distribucción del stock de items", 
			xaxis: {title: "Existencias"}, 
			yaxis: {title: "Frecuencia"}
		};
		Plotly.newPlot(TESTER, data, layout);
	});

	$(function () {
		TESTER = document.getElementById('tester2');
		var items = @json($result);
		var x = [];
		var y = [];
		var x1 = [];
		var y1 = [];
		var UCL = 0;
		var LCL = 0;
		var suma = 0;
		var j = 0;

		for (var i = 0; i < items.length; i++) {
			x[i] = i
			y[i] = items[i].existencias
			suma = parseFloat(items[i].existencias) + suma;
		}

		C = suma/i;
		UCL = C+3*Math.pow(C,1/2);
		LCL = C-3*Math.pow(C,1/2);

		for (var i = 0; i < items.length; i++) {
			if (y[i]>UCL || y[i]<LCL) {
				x1[j] = i;
				y1[j] = y[i]; 
				j = j+1;
			}
		}
		console.log(UCL);
		console.log(LCL);
		console.log(typeof(C));
		console.log(typeof(i));
		var min = Math.min(y);
		var max = Math.max(y);
		
		var Data = {
			type: 'scatter',
			x: x,
			y: y,
			mode: 'lines+markers',
			name: 'Datos',
			showlegend: true,
			hoverinfo: 'all',
			line: {
				color: 'blue',
				width: 2
			},
			marker: {
				color: 'blue',
				size: 8,
				symbol: 'circle'
			}
		}

		var Viol = {
			type: 'scatter',
			x: x1,
			y: y1,
			mode: 'markers',
			name: 'Fuera de LC',
			showlegend: true,
			marker: {
				color: 'rgb(255,65,54)',
				line: {width: 3},
				opacity: 0.5,
				size: 12,
				symbol: 'circle-open'
			}
		}

		var CL = {
			type: 'scatter',
			x: [0, items.length, null, 0, items.length],
			y: [LCL, LCL, null, UCL, UCL],
			mode: 'lines',
			name: 'LCI/LCS',
			showlegend: true,
			line: {
				color: 'red',
				width: 2,
				dash: 'dash'
			}
		}

		var Centre = {
			type: 'scatter',
			x: [0, items.length],
			y: [C, C],
			mode: 'lines',
			name: 'LC',
			showlegend: true,
			line: {
				color: 'grey',
				width: 2
			}
		}

		var histo = {
			type: 'histogram',
			// x: [1,2,3,4,5],
			y: y,
			name: 'Distribución',
			orientation: 'h',
			marker: {
				color: "rgba(50, 50, 255, 0.9)",
				line: {
					color: "rgba(0, 0, 0, 1)", 
					width: 0.9
				}
			},
			opacity: 0.8, 
			xaxis: 'x2',
			yaxis: 'y2'
		}

		var data = [Data,Viol,CL,Centre,histo]

		// layout
		var layout = {
			title: 'Gráfico de Control Estadístico',
			xaxis: {
    		domain: [0, 0.7], // 0 to 70% of width
    		zeroline: false

    	},
    	yaxis: {
    		range: [min,max],
    		zeroline: false,
    		title: "Tiempo Promedio"
    	},
    	xaxis2: {
			domain: [0.8, 1], // 70 to 100% of width
			title: "Frecuencia"
		},
		yaxis2: {
			anchor: 'x2',
			showticklabels: true,
			title: "Experimientos"
		}
	}

	Plotly.plot(TESTER, data,layout);
});

</script>
@stop