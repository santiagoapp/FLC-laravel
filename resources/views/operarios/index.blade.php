@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

@stop

@section('content_header')
<h1>Operarios</h1>
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
					<th>Apellido</th>
					<th>Cargo</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $operario)
				<tr id="tr-{{$operario->id}}" class="filas">
					<td>{{$operario->id}}</td>
					<td>{{$operario->nombre}}</td>
					<td>{{$operario->apellido}}</td>
					<td value ="{{$operario->cargo_id}}">{{$operario->cargo->nombre}}</td>
					<td>
						<a id="editar-{{$operario->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$operario->id}}" data-toggle="modal">Editar</a>
						<a id="eliminar-{{$operario->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$operario->id}}" data-toggle="modal">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@include('operarios.partials.modal1')

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
				editarOperario();
			}else{
				agregarOperario();
			}
		});

		$('.editar').click(function () {
			$('#modal1').modal('show');
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];
			var nombre = $('#tr-'+id_boton+'>td:nth-of-type(2)').html();
			var apellido = $('#tr-'+id_boton+'>td:nth-of-type(3)').html();
			var cargo = $('#tr-'+id_boton+'>td:nth-of-type(4)').attr("value");
			
			$('#nombre').val(nombre)
			$('#apellido').val(apellido)
			$('#hidden').val(id_boton)
			$('#cargo option[value='+ cargo +']').attr("selected", true);
			$('#actualizar').html("Actualizar")

		});

		$('.agregar').click(function () {
			
			$('#nombre').val("")
			$('#apellido').val("")
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
				text: "Una vez eliminado el registro, no podrá recuperar su información",
				icon: "warning",
				buttons: ["Cancelar", "Continuar"],
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					eliminarOperario(id_boton);
					swal("El registro ha sido eliminada", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			});
		});

		function eliminarOperario(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('OperarioController@index')}}/eliminar',
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

		function agregarOperario(){
			$.ajax({
				type: "POST",
				url: '{{ action('OperarioController@store')}}',
				data : $("#registrar").serialize(),
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function editarOperario(){
			$.ajax({
				type: "POST",
				url: '{{ action('OperarioController@index')}}/actualizar',
				data : $("#registrar").serialize(),
				success: function (data) {
					$('#tr-'+data.id+'>td:nth-of-type(2)').html(data.nombre);
					$('#tr-'+data.id+'>td:nth-of-type(3)').html(data.apellido);
					$('#tr-'+data.id+'>td:nth-of-type(4)').html(data.cargo.nombre);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}


	});
</script>
@stop

