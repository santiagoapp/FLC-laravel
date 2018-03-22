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
		<form class="formulario", id="formulario" >
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="OTs">Orden de trabajo</label>
						<div class="input-group date">
							<div class="input-group-addon">
								OT
							</div>
							<select class="form-control pull-right select2" id="OT" style="width: 100%;">
								<!-- <option selected="selected">Alabama</option> -->
								<option></option>
								@foreach($OTs as $ot)
								<option value="{{$ot->id}}">{{$ot->id}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>	

				<div class="col-md-6">
					<div class="form-group">
						<label>Cliente:</label>

						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-person"></i>
							</div>
							<input type="text" class="form-control pull-right" id="cliente" readonly>
						</div>
					</div>
					<div class="form-group">
						<label>Vendedor:</label>

						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-person"></i>
							</div>
							<input type="text" class="form-control pull-right" id="vendedor" readonly>
						</div>
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
							<input type="text" class="form-control pull-right" id="fecha_impresion" readonly>
						</div>
					</div>
					<!-- Date -->
					<div class="form-group">
						<label>Fecha Recibido de Producción:</label>

						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="fecha_recibido">
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="button" class="btn btn-info btn-flat btn-block" id="submit">Guardar</button>
			</div>
		</form>
	</div>
</div>

@stop

@section('js')

<script src="{{asset('vendor/adminlte/vendor/fullcalendar/js/moment.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script>

	$(function () {
		
		var arr = [];
		var n = new Date();
		var hoy = moment().format('L');

		$('#fecha_recibido').datepicker({
			autoclose: true
		});

		$('#OT').select2();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})

		$('#OT').on('change', function() {

			$('#fecha_recibido').val(hoy);
			id = $("#OT option:selected").val()
			$.ajax({
				type: "POST",
				url: '{{ action('AgregarOTController@mostrarOT')}}',
				data : { 
					id 		: id,
				},
				success: function (data) {
					fecha_impresion = moment(data.fecha_impresion).format('L');

					$('#fecha_impresion').val(fecha_impresion);

					$('#cliente').val(data.cliente);
					$('#vendedor').val(data.vendedor);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		});
		$('#submit').click(function () {

			id = $("#OT option:selected").val();
			fecha_recibido = $("#fecha_recibido").val();

			$.ajax({
				type: "POST",
				url: '{{ action('AgregarOTController@guardarFechaRecibido')}}',
				data : { 
					fecha_recibido 	: fecha_recibido,
					id 				: id,
				},
				success: function (data) {
					if (data == "Registro actualizado") {
						swal("Exito",data, "success");
					}else{
						swal("Fallido",data, "error");
					}
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		});
	});
</script>


@stop

