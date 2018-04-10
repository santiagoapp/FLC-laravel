@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')

@stop

@section('content_header')
<h1>Bajas</h1>
@stop

@section('content')

<div class="box box-default color-palette-box">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-tag"></i> Información general  </h3>
		<a class="btn btn-flat btn-primary agregar"><i class="fa fa-plus"></i> Nuevo Registro</a>
	</div>
	<div class="box-body">
		<div class="box-body table-responsive no-padding">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Equipo</th>
						<th>Motivo</th>
						<th>Autorizó</th>
						<th>Cargo</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					@foreach($result as $baja)
					<tr id="tr-{{$baja->id}}" class="filas">
						<td>{{$baja->id}}</td>
						<td value ="{{$baja->equipo_id}}">{{$baja->equipo->maquina_id}}</td>
						<td>{{$baja->motivo}}</td>
						<td value ="{{$baja->autoriza_id}}">{{$baja->autoriza->nombre}}</td>
						<td>{{$baja->autoriza->cargo->nombre}}</td>
						<td>
							<a id="pdf-{{$baja->id}}" class="btn btn-flat btn-info btn-block" role="button" name="pdf-{{$baja->id}}" href="{{ action('BajaController@show',$baja->id) }}"><span class="fa fa-file-pdf-o"></span> PDF</a>
							<a id="editar-{{$baja->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$baja->id}}" data-toggle="modal">Editar</a>
							<a id="eliminar-{{$baja->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$baja->id}}" data-toggle="modal">Eliminar</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
</div>

@include('bajas.partials.modal1')

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
				editarBaja();
			}else{
				agregarBaja();
			}
		});

		$('.editar').click(function () {
			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];

			var equipo = $('#tr-'+id_boton+'>td:nth-of-type(2)').attr("value");
			var motivo = $('#tr-'+id_boton+'>td:nth-of-type(3)').html();
			var autoriza = $('#tr-'+id_boton+'>td:nth-of-type(4)').attr("value");

			$('#equipo option[value='+ equipo +']').attr("selected", true);
			$('#motivo').val(motivo)
			$('#autoriza option[value='+ equipo +']').attr("selected", true);
			$('#hidden').val(id_boton)

			$('#actualizar').html("Actualizar")
			$('#modal1').modal('show');
		});
		$('.agregar').click(function () {

			$('#equipo').val("")
			$('#motivo').val("")
			$('#autoriza').val("")
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
					eliminarBaja(id_boton);
					swal("El registro ha sido eliminado", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			}); 
		});

		function eliminarBaja(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('BajaController@index')}}/eliminar',
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

		function agregarBaja(){
			$.ajax({
				type: "POST",
				url: '{{ action('BajaController@store')}}',
				data : $("#registrar").serialize(),
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		function editarBaja(){
			$.ajax({
				type: "POST",
				url: '{{ action('BajaController@index')}}/actualizar',
				data : $("#registrar").serialize(),
				success: function (data) {
					$('#tr-'+data.id+'>td:nth-of-type(2)').html(data.equipo.maquina_id);
					$('#tr-'+data.id+'>td:nth-of-type(3)').html(data.motivo);
					$('#tr-'+data.id+'>td:nth-of-type(4)').html(data.autoriza.nombre);
					$('#tr-'+data.id+'>td:nth-of-type(5)').html(data.autoriza.nombre.cargo);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

	});
</script>
@stop

