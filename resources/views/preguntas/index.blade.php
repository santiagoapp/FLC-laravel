@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

@stop

@section('content_header')
<h1>Preguntas</h1>
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
					<th>Pregunta</th>
					<th>Clasificación</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $pregunta)
				<tr id="tr-{{$pregunta->id}}" class="filas">
					<td>{{$pregunta->id}}</td>
					<td>{{$pregunta->pregunta}}</td>
					<td value ="{{$pregunta->clasificacion_id}}">{{$pregunta->clasificacion->nombre}}</td>
					<td>
						<a id="editar-{{$pregunta->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$pregunta->id}}" data-toggle="modal">Editar</a>
						<a id="eliminar-{{$pregunta->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$pregunta->id}}" data-toggle="modal">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@include('preguntas.partials.modal1')

@stop

@section('js')

<script src="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script>

	$(function () {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('#actualizar').click(function () {
			if($('#actualizar').html() == "Actualizar"){
				editarPregunta();
			}else{
				agregarPregunta();
			}
		});
		$('.editar').click(function () {
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];
			var pregunta = $('#tr-'+id_boton+'>td:nth-of-type(2)').html();
			var clasificacion = $('#tr-'+id_boton+'>td:nth-of-type(3)').attr("value");

			$('#pregunta').val(pregunta)
			$('#clasificacion option[value='+ clasificacion +']').attr("selected", true);
			$('#hidden').val(id_boton)
			$('#actualizar').html("Actualizar")

			$('#modal1').modal('show');
		});
		$('.agregar').click(function () {
			$('#pregunta').val("")
			$('#clasificacion_id').val("")
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
				text: "Una vez eliminada la pregunta, los registros de mantenimientos realizados serán eliminados de forma permanente",
				icon: "warning",
				buttons: ["Cancelar", "Continuar"],
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					eliminarPregunta(id_boton);
					swal("La pregunta ha sido eliminada", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			});
		});

		function eliminarPregunta(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('PreguntaController@index')}}/eliminar',
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

		function agregarPregunta(){
			$.ajax({
				type: "POST",
				url: '{{ action('PreguntaController@store')}}',
				data : $("#registrar").serialize(),
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function editarPregunta(){
			$.ajax({
				type: "POST",
				url: '{{ action('PreguntaController@index')}}/actualizar',
				data : $("#registrar").serialize(),
				success: function (data) {
					$('#tr-'+data.id+'>td:nth-of-type(2)').html(data.pregunta);
					$('#tr-'+data.id+'>td:nth-of-type(3)').html(data.clasificacion.nombre);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}
	});
</script>
@stop

