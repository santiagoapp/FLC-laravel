@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1>Permisos</h1>
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="row">
					<div class="col-md-10">
						<h3 class="box-title">Registros</h3>
					</div>
					<div class="col-md-2 justify-content-right">
						<a id="agregar-nuevo" class="btn btn-flat btn-primary" role="button"><span class="fa fa-plus"></span> Agregar Nuevo</a>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Usuario</th>
							<th>Correo</th>
							<th>Opciones</th>
							<th>Permisos</th>
						</tr>
					</thead>
					<tbody>
						@foreach($result as $user)
						<tr id="{{$user->id}}-tr">
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>
								@can('edit articles')
								<a href="#" class="btn btn-info btn-block editar" role="button" name="{{$user->id}}">Editar</a>
								@endcan
								<a href="#" class="btn btn-danger btn-block borrar" role="button" name="{{$user->id}}">Eliminar</a>
							</td> 
							<td value = "{{$user->getAllPermissions()}}">
								<div class="btn-group btn-group-justified" role="group">
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-compras">Compras</a>
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-ventas">Ventas</a>
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-produccion">Producción</a>
								</div>
								<div class="btn-group btn-group-justified" role="group">
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-ingenieria">Ingeniería</a>
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-contabilidad">Contabilidad</a>
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-rqhumanos">Rq. Humanos</a>
								</div>
								<div class="btn-group btn-group-justified" role="group">
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-almacen">Almacén</a>
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-laboratorio">Laboratorio</a>
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-gerencia">Gerencia</a>
								</div>
								<div class="btn-group btn-group-justified" role="group">
									<a class="btn btn-default permiso" role="button" name="{{$user->id}}-supersu">Super Usuario</a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Usuario</th>
							<th>Correo</th>
							<th>Opciones</th>
							<th>Permisos</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>


@stop

@section('js')
<script src="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script>
	$(function () {

		function borrarUsuario(id_boton){
			
			$.ajax({
				type: "DELETE",
				url: '{{ action('UserController@index')}}/'+ id_boton,
				success: function (data) {
					if (data != "No tiene permisos para realizar esta operación.") {
						if (data) {
							swal("¡Buen Trabajo!","Usuario eliminado con éxito.", "success");
							$('#' + id_boton + '-tr').remove();
						}else{
							swal("Lo sentimos","El usuario no pudo ser eliminado.", "error");
						}
					}else{
						swal("Lo sentimos",data, "error");
					}

				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}
		function editarUsuario(){

			$.ajax({
				type: "GET",
				url: '{{ action('UserController@index')}}/'+ id_boton + 'edit',
				success: function (data) {
					if (data != "No tiene permisos para realizar esta operación.") {
						if (data) {
							swal("¡Buen Trabajo!","Usuario editado con éxito.", "success");
							// $('#' + id_boton + '-tr').remove();
						}else{
							swal("Lo sentimos","El usuario no pudo ser eliminado.", "error");
						}
					}else{
						swal("Lo sentimos",data, "error");
					}

				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}

		$('.editar').click(function () {
			var id_boton = $(this).prop("name");
			editarUsuario(id_boton);

		});

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.permiso').click(function () {

			var variable = $(this).prop("name");
			var variable_arr = variable.split("-");
			var id_boton = variable_arr[0];
			var permiso = variable_arr[1];

			if ($(this).hasClass("btn-default")) {
				$.ajax({
					type: "POST",
					url: '{{ action('UserController@agregarPermiso')}}',
					data : { 
						id 		: id_boton,
						permiso : permiso
					},
					success: function (data) {
						$('[name="' + variable +'"]').attr("class", "btn btn-primary permiso");
						swal("Exito!","Permiso agregado", "success");
					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
				// actualizar boton
			}else{
				$.ajax({
					type: "POST",
					url: '{{ action('UserController@eliminarPermiso')}}',
					data : { 
						id 		: id_boton,
						permiso : permiso
					},
					success: function (data) {
						$('[name="' + variable +'"]').attr("class", "btn btn-default permiso");
						swal("¡Exito!","Permiso eliminado", "success");
					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
				// actualizar boton
			}

		});

		$('.borrar').click(function () {
			var id_boton = $(this).prop("name");
			swal({
				title: "¿Está seguro de eliminar el usuario?",
				text: "Una vez eliminado no podrá recuperar la información!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				buttons: ["Cancelar", "Continuar"],
			})
			.then((willDelete) => {
				if (willDelete) {
					borrarUsuario(id_boton);
				}
			});
		});

		var usuarios = @json($result);
		var permisos = [];
		// console.log(usuarios);
		for (var i = 0; i < usuarios.length; i++) {
			permisos[i] = usuarios[i].permissions
			
			permisos[i].forEach(function(permiso){
				console.log(permiso.name);
				switch(permiso.name){
					case "compras":
					$('[name="' + usuarios[i].id + '-compras"]').attr("class", "btn btn-primary permiso");
					break;
					case "ventas":
					$('[name="' + usuarios[i].id + '-ventas"]').attr("class", "btn btn-primary permiso");
					break;
					case "produccion":
					$('[name="' + usuarios[i].id + '-produccion"]').attr("class", "btn btn-primary permiso");
					break;
					case "ingenieria":
					$('[name="' + usuarios[i].id + '-ingenieria"]').attr("class", "btn btn-primary permiso");
					break;
					case "contabilidad":
					$('[name="' + usuarios[i].id + '-contabilidad"]').attr("class", "btn btn-primary permiso");
					break;
					case "rqhumanos":
					$('[name="' + usuarios[i].id + '-rqhumanos"]').attr("class", "btn btn-primary permiso");
					break;
					case "almacen":
					$('[name="' + usuarios[i].id + '-almacen"]').attr("class", "btn btn-primary permiso");
					break;
					case "laboratorio":
					$('[name="' + usuarios[i].id + '-laboratorio"]').attr("class", "btn btn-primary permiso");
					break;
					case "gerencia":
					$('[name="' + usuarios[i].id + '-gerencia"]').attr("class", "btn btn-primary permiso");
					break;
					case "supersu":
					$('[name="' + usuarios[i].id + '-supersu"]').attr("class", "btn btn-primary permiso");
					break;

				}
			});
		}

		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		});
	});

</script>
@stop