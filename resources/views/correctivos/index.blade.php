@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')
<link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/fullcalendar/css/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/fullcalendar/css/fullcalendar.print.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

@stop

@section('content_header')
<h1>Zonas</h1>
@stop

@section('content')

<div class="box box-default color-palette-box">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-tag"></i> Información general  </h3>
		<a class="btn btn-flat btn-primary agregar"><i class="fa fa-plus"></i> Nuevo Registro</a>
	</div>
	<div class="box-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>ID Equipo</th>
					<th>Estado</th>
					<th>Falla</th>
					<th>Causa</th>
					<th>Observación</th>
					<th>Operario</th>
					<th>Fecha de inicio</th>
					<th>Fecha de finalizacion</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $correctivo)
				<tr id="tr-{{$correctivo->id}}" class="filas">
					<td>{{$correctivo->id}}</td>
					<td value ="{{$correctivo->equipo_id}}">{{$correctivo->equipo->maquina_id}}</td>
					<td>{{$correctivo->estado}}</td>
					<td>{{$correctivo->falla}}</td>
					<td>{{$correctivo->causa}}</td>
					<td>{{$correctivo->observacion}}</td>
					<td value ="{{$correctivo->operario_id}}">{{$correctivo->operario->nombre}}</td>
					<td>{{$correctivo->fecha_inicio}}</td>
					<td>{{$correctivo->fecha_fin}}</td>
					<td>
						<a id="editar-{{$correctivo->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$correctivo->id}}" data-toggle="modal">Editar</a>
						<a id="eliminar-{{$correctivo->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$correctivo->id}}" data-toggle="modal">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@include('correctivos.partials.modal1')

@stop

@section('js')

<script src="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('vendor/adminlte/vendor/fullcalendar/js/moment.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/fullcalendar/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>

	$(function () {

		var hoy = moment().format('L');
		$('#fecha_inicio').val(hoy);
		$('#fecha_inicio').datepicker({
			autoclose: true
		});	
		$('#fecha_fin').val(hoy);
		$('#fecha_fin').datepicker({
			autoclose: true
		});	

		
		$('#equipo').select2();
		$('#operario').select2();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('#actualizar').click(function () {
			if($('#actualizar').html() == "Actualizar"){
				editarCorrectivo();
			}else{
				agregarCorrectivo();
			}
		});
		$('.editar').click(function () {
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];

			var equipo = $('#tr-'+id_boton+'>td:nth-of-type(2)').attr("value");
			var estado = $('#tr-'+id_boton+'>td:nth-of-type(3)').html();
			var falla = $('#tr-'+id_boton+'>td:nth-of-type(4)').html();
			var causa = $('#tr-'+id_boton+'>td:nth-of-type(5)').html();
			var observacion = $('#tr-'+id_boton+'>td:nth-of-type(6)').html();
			var operario = $('#tr-'+id_boton+'>td:nth-of-type(7)').attr("value");
			var fecha_inicio = $('#tr-'+id_boton+'>td:nth-of-type(8)').html();
			var fecha_fin = $('#tr-'+id_boton+'>td:nth-of-type(9)').html();

			$('#estado').val(estado)
			$('#falla').val(falla)
			$('#causa').val(causa)
			$('#observacion').val(observacion)
			$('#fecha_inicio').val(fecha_inicio)
			$('#fecha_fin').val(fecha_fin)
			$('#equipo').val(equipo).trigger('change')
			$('#operario').val(operario).trigger('change')
			$('#hidden').val(id_boton)
			$('#actualizar').html("Actualizar")

			$('#modal1').modal('show');
		});

		$('.agregar').click(function () {

			$('#estado').val("")
			$('#falla').val("")
			$('#causa').val("")
			$('#observacion').val("")
			$('#fecha_inicio').val("")
			$('#fecha_fin').val("")
			$('#equipo').val("").trigger('change')
			$('#operario').val("").trigger('change')
			$('#hidden').val("")
			$('#actualizar').html("Guardar")

			$('#modal1').modal('show');
		});

		$('.eliminar').click(function () {
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];
			swal({
				title: "¿Estás seguro?",
				text: "Una vez eliminado el registro, no podrá ser recuperado",
				icon: "warning",
				buttons: ["Cancelar", "Continuar"],
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					eliminarCorrectivo(id_boton);
					swal("El registro ha sido eliminado", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			});
		});

		function eliminarCorrectivo(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('CorrectivoController@index')}}/eliminar',
				data :{
					id: id_boton
				},
				success: function (data) {
					$('#tr-' + data.id).html("");
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function agregarCorrectivo(){
			$.ajax({
				type: "POST",
				url: '{{ action('CorrectivoController@store')}}',
				data : $("#registrar").serialize(),
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function editarCorrectivo(){
			$.ajax({

				type: "POST",
				url: '{{ action('CorrectivoController@index')}}/actualizar',
				data : $("#registrar").serialize(),

				success: function (data) {
					console.log(data)
					var fecha_inicio = moment(data.fecha_inicio.date).format('L')
					var fecha_fin = moment(data.fecha_fin.date).format('L')
					$('#tr-'+data.id+'>td:nth-of-type(2)').attr("value",data.equipo_id);
					$('#tr-'+data.id+'>td:nth-of-type(2)').html(data.equipo.maquina_id);
					$('#tr-'+data.id+'>td:nth-of-type(3)').html(data.estado);
					$('#tr-'+data.id+'>td:nth-of-type(4)').html(data.falla);
					$('#tr-'+data.id+'>td:nth-of-type(5)').html(data.causa);
					$('#tr-'+data.id+'>td:nth-of-type(6)').html(data.observacion);
					$('#tr-'+data.id+'>td:nth-of-type(7)').attr("value",data.operario_id);
					$('#tr-'+data.id+'>td:nth-of-type(7)').html(data.operario.nombre);
					$('#tr-'+data.id+'>td:nth-of-type(8)').html(fecha_inicio);
					$('#tr-'+data.id+'>td:nth-of-type(9)').html(fecha_fin);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}
	});
</script>
@stop

