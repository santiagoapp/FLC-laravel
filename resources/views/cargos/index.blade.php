@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

@stop

@section('content_header')
<h1>Cargos</h1>
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
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $cargo)
				<tr id="tr-{{$cargo->id}}" class="filas">
					<td>{{$cargo->id}}</td>
					<td>{{$cargo->nombre}}</td>
					<td>
						<a id="editar-{{$cargo->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$cargo->id}}" data-toggle="modal">Editar</a>
						<a id="eliminar-{{$cargo->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$cargo->id}}" data-toggle="modal">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@include('cargos.partials.modal1')

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
				editarCargo();
			}else{
				agregarCargo();
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
				text: "Una vez eliminado el cargo, se eliminaran todas los operarios relacionadas con este",
				icon: "warning",
				buttons: ["Cancelar", "Continuar"],
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					eliminarCargo(id_boton);
					swal("El cargo ha sido eliminado", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			});
		});


		function agregarCargo(){
			$.ajax({
				type: "POST",
				url: '{{ action('CargoController@store')}}',
				data : $("#registrar").serialize(),
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function eliminarCargo(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('CargoController@index')}}/eliminar',
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
		
		function editarCargo(){
			$.ajax({
				type: "POST",
				url: '{{ action('CargoController@index')}}/actualizar',
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

