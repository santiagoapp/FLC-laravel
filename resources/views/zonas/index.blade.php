@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

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
					<th>Nombre</th>
					<th>Abreviación</th>
					<th>Planta</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $zona)
				<tr id="tr-{{$zona->id}}" class="filas">
					<td>{{$zona->id}}</td>
					<td>{{$zona->nombre}}</td>
					<td>{{$zona->nomenclatura}}</td>
					<td value ="{{$zona->planta_id}}">{{$zona->planta->nombre}}</td>
					<td>
						<a id="editar-{{$zona->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$zona->id}}" data-toggle="modal">Editar</a>
						<a id="eliminar-{{$zona->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$zona->id}}" data-toggle="modal">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@include('zonas.partials.modal1')

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
				editarZona();
			}else{
				agregarZona();
			}
		});
		$('.editar').click(function () {
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];
			var nombre = $('#tr-'+id_boton+'>td:nth-of-type(2)').html();
			var nomenclatura = $('#tr-'+id_boton+'>td:nth-of-type(3)').html();
			var planta = $('#tr-'+id_boton+'>td:nth-of-type(4)').attr("value");

			$('#nombre').val(nombre)
			$('#nomenclatura').val(nomenclatura)
			$('#planta option[value='+ planta +']').attr("selected", true);
			$('#hidden').val(id_boton)
			$('#actualizar').html("Actualizar")

			$('#modal1').modal('show');
		});
		$('.agregar').click(function () {
			console.log('asd')
			$('#nombre').val("")
			$('#nomenclatura').val("")
			$('#planta_id').val("")
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
				text: "Una vez eliminada la zona, los equipos relacionados serán eliminados",
				icon: "warning",
				buttons: ["Cancelar", "Continuar"],
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					eliminarZona(id_boton);
					swal("La zona ha sido eliminada", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			});
		});

		function eliminarZona(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('ZonaController@index')}}/eliminar',
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

		function agregarZona(){
			$.ajax({
				type: "POST",
				url: '{{ action('ZonaController@store')}}',
				data : $("#registrar").serialize(),
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function editarZona(){
			$.ajax({
				type: "POST",
				url: '{{ action('ZonaController@index')}}/actualizar',
				data : $("#registrar").serialize(),
				success: function (data) {
					$('#tr-'+data.id+'>td:nth-of-type(2)').html(data.nombre);
					$('#tr-'+data.id+'>td:nth-of-type(3)').html(data.nomenclatura);
					$('#tr-'+data.id+'>td:nth-of-type(4)').html(data.planta.nombre);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}
	});
</script>
@stop

