@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')
<link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/fullcalendar/css/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/fullcalendar/css/fullcalendar.print.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

@stop

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')

<div class="box box-default color-palette-box">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-tag"></i> Información general</h3>
	</div>
	<div class="box-body">
		<div class="row">
			
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3>95<sup style="font-size: 20px">%</sup></h3>

						<p>Conformidades</p>
					</div>
					<div class="icon">
						<i class="ion ion-thumbsup"></i>
					</div>
					<a href="{{action('ItemController@index')}}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-purple">
					<div class="inner">
						<h3>{{$result->where('estado','Activo')->count()}}</h3>

						<p>Ordenes Activas</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>{{$result->where('estado','Pendiente')->count()}}</h3>

						<p>Ordendes Pendientes</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-pulse"></i>
					</div>
					<a href="#" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>{{$result->where('estado','Entregado')->count()}}</h3>

						<p>Ordenes Entregadas</p>
					</div>
					<div class="icon">
						<i class="ion-ios-pricetags-outline"></i>
					</div>
					<a href="{{action('ItemController@index')}}" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('js')

<script src="{{asset('vendor/adminlte/vendor/fullcalendar/js/moment.js')}}"></script>
<script src="{{asset('vendor/adminlte/vendor/fullcalendar/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>

	$(function () {
		var arr = [];
		var n = new Date();
		var hoy = fecha(n);

		$('#datepicker1').val(hoy);

		$('#datepicker1').datepicker({
			autoclose: true
		});

		$('#datepicker2').val(hoy);

		$('#datepicker2').datepicker({
			autoclose: true
		});

		$('#departamento').select2();
		$('#OTs').select2();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});


		$('#departamento').on('change', function() {

			id = $("#departamento option:selected").val()
			$.ajax({
				type: "POST",
				url: '{{ action('CitiesController@verCiudades')}}',
				data : { 
					id 		: id,
				},
				success: function (data) {
					for (var i = 0; i < data.length; i++) {
						arr[i] = data[i].name
					}
					$("#ciudad").empty().trigger('change')
					$('#ciudad').select2({
						data: arr
					});
					arr = [];
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		});




		function fecha(valor) {

			mes = valor.getMonth()
			dia = valor.getDate()
			año = valor.getFullYear()

			if (mes<10) {
				mes = mes + 1
				mes = "0" + mes
			} 
			if(dia<10){
				dia = "0"
			}

			return mes + "/" + dia + "/" + año
		}

	});
</script>


@stop

