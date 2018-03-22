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
		<h3 class="box-title"><i class="fa fa-plus "></i> Agregar Orden de Trabajo</h3>
	</div>
	<div class="box-body">
		<form class="" >
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="OTs">Orden de trabajo</label>
						<div class="input-group date">
							<div class="input-group-addon">
								OT
							</div>
							<select class="form-control pull-right select2" id="OTs" style="width: 100%;">
								<!-- <option selected="selected">Alabama</option> -->
								<option></option>
								@foreach($OTs as $ot)
								<option value="{{$ot->id}}">{{$ot->id}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="OTs">Requisición</label>
						<div class="input-group date">
							<div class="input-group-addon">
								RQ
							</div>
							<input type="text" class="form-control pull-right" id="RQ" readonly>
						</div>
					</div>
				</div>	
				<div class="col-md-2">

				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="departamento">Departamento</label>

						<select class="form-control select2" id="departamento" style="width: 100%;">
							<!-- <option selected="selected">Alabama</option> -->
							<option></option>
							@foreach($departaments as $departament)
							<option value="{{$departament->id}}">{{$departament->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="ciudad">Ciudad</label>
						
						<select class="form-control select2" id="ciudad" style="width: 100%;">

						</select>
					</div>
				</div>
				<div class="col-md-3">
					<!-- Date -->
					<div class="form-group">
						<label>Fecha Impresión:</label>

						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="datepicker2" readonly>
						</div>
					</div>
					<!-- Date -->
					<div class="form-group">
						<label>Fecha Recibido de Producción:</label>

						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="datepicker1">
						</div>
					</div>

				</div>
				
			</div>
		</form>
	</div>
</div>


<div class="box box-default color-palette-box" id="items" hidden>
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-tag "></i> Items OT</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-xs-12">
				<table id="table-modal" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th id="num-items">ID</th>
							<th>Código</th>
							<th>Descripción</th>
							<th>Cantidad</th>
							<th>F. Entrega Almacén</th>
							<th>F. Entrega Destino</th>
						</tr>
					</thead>
					<tbody id="tabla-body">

					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Código</th>
							<th>Descripción</th>
							<th>Cantidad</th>
							<th>F. Entrega Almacén</th>
							<th>F. Entrega Destino</th>
						</tr>
					</tfoot>
				</table>
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
		var dias_ciudad = [];
		
		var fecha_almacen = [];
		var fecha_destino = [];

		var n = new Date();
		// var hoy = fecha(n);
		var hoy = moment().format('L');
		// console.log(hoy)
		$('#datepicker1').val(hoy);

		$('#datepicker1').datepicker({
			autoclose: true
		});

		$('#departamento').select2();
		$('#OTs').select2();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('#ciudad').on('change', function() {

			ciudad = $("#ciudad option:selected").val()
			
			$.ajax({
				type: "POST",
				url: '{{ action('CitiesController@buscarHoras')}}',
				data : { 
					ciudad : ciudad,
				},
				success: function (data) {
					// console.log(data)
					var items = $('#num-items').attr('name');
					// console.log(items)
					for (var i = 1; i <= items; i++) {
						fecha_destino[i] = $('#f2-' + i).html();
						var fecha = new Date(fecha_destino[i])
						fecha_almacen[i] = moment(fecha).subtract(data[0].dias_envio, 'hours').format('L')
						$('#f1-' + i).html(fecha_almacen[i]);
					}

				},
				error: function (data) {
					console.log('Error:', data);
				}
			});

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
					// console.log(data)
					var text = '{ "results" : [';
					

					for (var i = 0; i < data.length; i++) {
						arr[i] = data[i].name
					}

					$("#ciudad").empty().trigger('change')
					$('#ciudad').select2({
						data: arr
					});
					$('#ciudad').val() = arr[4]
					arr = [];
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		});

		$('#OTs').on('change', function() {

			id = $("#OTs option:selected").val()
			$.ajax({
				type: "POST",
				url: '{{ action('AgregarController@mostrarInformacion')}}',
				data : { 
					id 		: id,
				},
				success: function (data) {
					if (data == null) {
						respuesta = "No hay registros"
					}else{
						respuesta = data[0][0].id
					}
					console.log(data)
					document.getElementById('RQ').value = respuesta
					document.getElementById("tabla-body").innerHTML = '';

					id = $("#items").show()
					// console.log(data)
					// console.log(data[2].fecha_impresion)
					fecha_impresion = moment(data[2].fecha_impresion).format('L');

					$('#datepicker2').val(fecha_impresion);
					// console.log(data);
					$('#num-items').attr('name', data[1].length);
					for (var i = 0; i < data[1].length; i++) {

						fecha_entrega = new Date(data[1][i].fecha_entrega);
						fecha_entrega = moment(fecha_entrega).format('L')
						$("#table-modal > #tabla-body").prepend(
							'<tr><td>' + (data[1].length-i) +'</td>' +
							'<td>llenar</td>' +
							'<td>llenar</td>' +
							'<td>' + data[1][i].cantidad + '</td>'+
							'<td id="f1-' + (data[1].length-i) + '"></td>'+
							'<td id="f2-' + (data[1].length-i) + '">' + fecha_entrega + '</td></tr>'
							);
					}
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
				dia = "0" + dia
			}

			return mes + "/" + dia + "/" + año
		}

	});
</script>


@stop

