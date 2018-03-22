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
					<th>Maq. ID</th>
					<th>Imagen</th>
					<th>Encargado</th>
					<th>Zona</th>
					<th>Clasificacion</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $equipo)
				<tr id="tr-{{$equipo->id}}" class="filas">
					<td>{{$equipo->maquina_id}}</td>
					<td><img src="{{asset('img/equipos/')}}/{{$equipo->ruta_imagen}}" alt="imagen" style=" height: 150px;"></td>
					<td value ="{{$equipo->operario_id}}">{{$equipo->operario->nombre}}</td>
					<td value ="{{$equipo->zona_id}}">{{$equipo->zona->nombre}}</td>
					<td value ="{{$equipo->clasificacion_id}}">{{$equipo->clasificacion->nombre}}</td>
					<td>
						@if($equipo->estado == "activo")
						<a class="btn btn-flat btn-primary"><span class="fa fa-check"></span></a>
						@else
						<a class="btn btn-flat btn-danger"><span class="fa fa-close"></span></a>
						@endif
					</td>
					<td>
						<a id="editar-{{$equipo->id}}" class="btn btn-flat btn-info btn-block editar" role="button" name="editar-{{$equipo->id}}" data-toggle="modal">Editar</a>
						<a id="eliminar-{{$equipo->id}}" class="btn btn-flat btn-warning btn-block eliminar" role="button" name="eliminar-{{$equipo->id}}" data-toggle="modal">Eliminar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@include('equipos.partials.modal1')

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

		var imagen = $("#imagen").change(function (){
			imagen_valida = fileValidation('imagen');

			if (imagen_valida != false)
			{
				$('#actualizar').click(function () {
					if($('#actualizar').html() == "Actualizar"){
						editarEquipo();
					}else{
						agregarEquipo();
					}
				});

			}else{
				$('#actualizar').click(function () {
					
				});
			}

		});


		$('.agregar').click(function () {

			$('#catalogo').prop('checked',false)
			$('#dibujo').prop('checked',false)
			$('#diagrama_electrico').prop('checked',false)
			$('#manual').prop('checked',false)
			$('#nombre').val("")
			$('#maquina_id').val("")
			$('#marca').val("")
			$('#modelo').val("")
			$('#factura').val("")
			$('#corriente').val("")
			$('#voltaje').val("")
			$('#procedencia').val("")
			$('#descripcion').val("")
			$('#observacion').val("")
			$('#zona').val("")
			$('#clasificacion').val("")
			$('#operario').val("")
			$('#hidden').val("")
			$('#imagen').prop('files')[0]

			$('#actualizar').html("Guardar")
			$('#modal1').modal('show');

		});


		$('.eliminar').click(function () {

			var name = $(this).prop("name");
			var res = name.split("-");
			var id_boton = res[1];
			
			swal({
				title: "¿Estás seguro?",
				text: "Una vez eliminado el equipo, su información no se podrá recuperar",
				icon: "warning",
				buttons: ["Cancelar", "Continuar"],
				dangerMode: true,
			})
			
			.then((willDelete) => {
				if (willDelete) {
					eliminarEquipo(id_boton);
					swal("El equipo ha sido eliminado", {
						icon: "success",
					});
				} else {
					swal("Será en otra ocasión :)");
				}
			});
		});
		function agregarEquipo(){

			var form_data = new FormData();

			var catalogo = $('#catalogo').prop('checked') ? 1 : 0;
			var dibujo = $('#dibujo').prop('checked') ? 1 : 0;
			var diagrama_electrico = $('#diagrama_electrico').prop('checked') ? 1 : 0;
			var manual = $('#manual').prop('checked') ? 1 : 0;
			var nombre = $('#nombre').val()
			var maquina_id = $('#maquina_id').val()
			var marca = $('#marca').val()
			var modelo = $('#modelo').val()
			var factura = $('#factura').val()
			var corriente = $('#corriente').val()
			var voltaje = $('#voltaje').val()
			var procedencia = $('#procedencia').val()
			var descripcion = $('#descripcion').val()
			var observacion = $('#observacion').val()
			var zona = $('#zona').val()
			var clasificacion = $('#clasificacion').val()
			var operario = $('#operario').val()
			var hidden = $('#hidden').val()
			var imagen = $('#imagen').prop('files')[0]

			form_data.append('operario', operario);
			form_data.append('catalogo', catalogo);
			form_data.append('dibujo', dibujo);
			form_data.append('diagrama_electrico', diagrama_electrico);
			form_data.append('manual', manual);
			form_data.append('nombre', nombre);
			form_data.append('maquina_id', maquina_id);
			form_data.append('marca', marca);
			form_data.append('modelo', modelo);
			form_data.append('factura', factura);
			form_data.append('corriente', corriente);
			form_data.append('voltaje', voltaje);
			form_data.append('procedencia', procedencia);
			form_data.append('descripcion', descripcion);
			form_data.append('observacion', observacion);
			form_data.append('zona', zona);
			form_data.append('clasificacion', clasificacion);
			form_data.append('hidden', hidden);
			form_data.append('imagen', imagen);

			console.log(form_data)
			$.ajax({
				type: "POST",
				url: '{{ action('EquipoController@store')}}',
				data : form_data,
				contentType: false,
				processData: false,
				success: function (data) {
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		}
		function eliminarEquipo(id_boton){
			$.ajax({
				type: "POST",
				url: '{{ action('EquipoController@index')}}/eliminar',
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

		function fileValidation(imagen){
			var fileInput = document.getElementById(imagen);
			var filePath = fileInput.value;
			var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
			if(!allowedExtensions.exec(filePath)){
				$('.help-block').html('El archivo solo puede ser del tipo .jpeg/.jpg/.png/.')
				fileInput.value = '';
				return false;
			}else{
        	//Image preview
        	if (fileInput.files && fileInput.files[0]) {
        		var reader = new FileReader();
        		reader.onload = function(e) {
        			document.getElementById('image_preview').innerHTML = '<img src="'+e.target.result + '" style="width:100%;"/>';
        		};
        		reader.readAsDataURL(fileInput.files[0]);
        		return $('#imagen')[0].files
        	}
        }

    }
});

</script>
@stop

