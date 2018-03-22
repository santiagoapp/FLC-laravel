@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

@stop

@section('content_header')
<h1>Instalaciones</h1>
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
					<th>Nombre</th>
					<th>Abreviación</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $planta)
				<tr id="tr-{{$planta->id}}" class="filas">
					<td>{{$planta->id}}</td>
					<td>{{$planta->nombre}}</td>
					<td>{{$planta->abreviacion}}</td>
					<td>
						<a id="editar-{{$planta->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$planta->id}}" data-toggle="modal">Editar</a>
						<a id="eliminar-{{$planta->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$planta->id}}" data-toggle="modal">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@include('plantas.partials.modal1')

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
				editarPlanta();
			}else{
				agregarPlanta();
			}
		});

		$('.agregar').click(function () {
			
			$('#nombre').val("")
			$('#abreviacion').val("")
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
			var abreviacion = $('#tr-'+id_boton+'>td:nth-of-type(3)').html();
			
			$('#nombre').val(nombre)
			$('#abreviacion').val(abreviacion)
			$('#hidden').val(id_boton)
			$('#actualizar').html("Actualizar")

		});

		$('.eliminar').click(function () {
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];
			swal({
				title: "¿Estás seguro?",
				text: "Una vez eliminada la instalación, se eliminaran todas las zonas relacionadas con este",
				icon: "warning",
				buttons: ["Cancelar", "Continuar"],
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					eliminarPlanta(id_boton);
					swal("La instalación ha sido eliminada", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			});
		});



		function agregarPlanta(){
			$.ajax({
				type: "POST",
				url: '{{ action('PlantaController@store')}}',
				data : $("#registrar").serialize(),
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function eliminarPlanta(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('PlantaController@index')}}/eliminar',
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
		
		function editarPlanta(){
			$.ajax({
				type: "POST",
				url: '{{ action('PlantaController@index')}}/actualizar',
				data : $("#registrar").serialize(),
				success: function (data) {
					$('#tr-'+data.id+'>td:nth-of-type(2)').html(data.nombre);
					$('#tr-'+data.id+'>td:nth-of-type(3)').html(data.abreviacion);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

	});

</script>


@stop

