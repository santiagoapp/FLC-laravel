@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

@stop

@section('content_header')
<h1>Clasifiaciones de los equipos</h1>
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
					<th>Clasificacion</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $clasificacion)
				<tr id="tr-{{$clasificacion->id}}" class="filas">
					<td>{{$clasificacion->id}}</td>
					<td>{{$clasificacion->nombre}}</td>
					<td>
						<a id="editar-{{$clasificacion->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$clasificacion->id}}" data-toggle="modal">Editar</a>
						<a id="eliminar-{{$clasificacion->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$clasificacion->id}}" data-toggle="modal">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@include('clasificacions.partials.modal1')

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
				editarClasificacion();
			}else{
				agregarClasificacion();
			}
		});

		$('.agregar').click(function () {
			
			$('#nombre').val("")
			$('#hidden').val("")
			$('#actualizar').html("Guardar")
			$('#modal1').modal('show');

		});

		$('.editar').click(function () {
			$('#modal1').modal('show');
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];
			var nombre = $('#tr-'+id_boton+'>td:nth-of-type(2)').html();
			
			$('#nombre').val(nombre)
			$('#hidden').val(id_boton)
			$('#actualizar').html("Actualizar")

		});

		$('.eliminar').click(function () {
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];
			swal({
				title: "¿Estás seguro?",
				text: "Una vez eliminado la clasificacion, se eliminaran todas los equipos relacionadas con este",
				icon: "warning",
				buttons: ["Cancelar", "Continuar"],
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					eliminarClasificacion(id_boton);
					swal("La clasificacion ha sido eliminada", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			});
		});


		function agregarClasificacion(){
			$.ajax({
				type: "POST",
				url: '{{ action('ClasificacionController@store')}}',
				data : $("#registrar").serialize(),
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function eliminarClasificacion(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('ClasificacionController@index')}}/eliminar',
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
		
		function editarClasificacion(){
			$.ajax({
				type: "POST",
				url: '{{ action('ClasificacionController@index')}}/actualizar',
				data : $("#registrar").serialize(),
				success: function (data) {
					$('#tr-'+data.id+'>td:nth-of-type(2)').html(data.nombre);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

	});

</script>


@stop

