@extends('adminlte::page')

@section('title', 'Ordenes de servicio')

@section('content_header')
<h1>Ordenes de servicio</h1>
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
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="container">
					<div class="row">
						<div class="col-md-4" style="margin-top: 20px;">
							<!-- search form -->
							<form action="#" method="get">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Buscar...">
									<span class="input-group-btn">
										<button type="submit" name="search" class="btn btn-flat"><i class="fa fa-search"></i>
										</button>
									</span>
								</div>
							</form>
							<!-- /.search form -->
						</div>
						<div class="col-md-6">
							{{$result->links()}}
						</div>
					</div>
				</div>
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>ID (RQ)</th>
							<th>Proveedor</th>
							<th>Formas de Pago</th>
							<th>Notas</th>
							<th>Fecha</th>
							<th>Items</th>
						</tr>
					</thead>
					<tbody>
						@foreach($result as $OSReg)
						<tr>
							<td>{{ $OSReg->id }}</td>
							<td>{{ $OSReg->rq_id}}</td>
							<td>{{ $OSReg->proveedor }}</td>
							<td>{{ $OSReg->pago }}</td>
							<td>{{ $OSReg->nota }}</td>
							<td>{{ $OSReg->fecha }}</td>
							<td>
								@if($OSReg->find($OSReg->id)->prfItemHasOS)
								<a id="boton-{{ $OSReg->id }}-1" class="btn btn-flat btn-block btn-info boton1" role="button" name="{{ $OSReg->id }}" data-toggle="modal">Items P. Final</a>
								@endif
								@if($OSReg->find($OSReg->id)->matItemHasOS)
								<a id="boton-{{ $OSReg->id }}-2" class="btn btn-flat btn-block btn-info boton2" role="button" name="{{ $OSReg->id }}" data-toggle="modal">Items Material</a>
								@endif
								@if($OSReg->find($OSReg->id)->maqItemHasOS)
								<a id="boton-{{ $OSReg->id }}-3" class="btn btn-flat btn-block btn-info boton3" role="button" name="{{ $OSReg->id }}" data-toggle="modal">Items Servicio</a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>ID (RQ)</th>
							<th>Proveedor</th>
							<th>Formas de Pago</th>
							<th>Notas</th>
							<th>Fecha</th>
							<th>Items</th>
						</tr>
					</tfoot>
				</table>
				<div class="container">
					<div class="row">
						<div class="col-md-4" style="margin-top: 20px;">

							<!-- search form -->
							<form action="#" method="get">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Buscar...">
									<span class="input-group-btn">
										<button type="submit" name="search" class="btn btn-flat"><i class="fa fa-search"></i>
										</button>
									</span>
								</div>
							</form>
							<!-- /.search form -->
						</div>
						<div class="col-md-6">
							{{$result->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modal-title1"> </h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-xs-7 col-md-offset-1">
							<table id="table-modal1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody id="tabla-body1">
									
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Estado</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				@include('partials.botones_modal')
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modal-title2"> </h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-xs-7 col-md-offset-1">
							<table id="table-modal2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody id="tabla-body2">
									
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Estado</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				@include('partials.botones_modal')
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modal-title3"> </h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-xs-7 col-md-offset-1">
							<table id="table-modal3" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Existencia</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody id="tabla-body3">
									
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Existencia</th>
										<th>Fecha</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				@include('partials.botones_modal')
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<script>
	$(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.boton1').click(function () {
			var id_boton = $(this).prop("name");
			$.ajax({
			    url : '{{ action('OSController@mostrarItemsPrf')}}', // la URL para la petición	    
			    data : { id : id_boton }, // la información a enviar (también es posible utilizar una cadena de datos)
			    type : 'POST', // especifica si será una petición POST o GET
			    // dataType : 'json', // el tipo de información que se espera de respuesta
			    success : function(respuesta) {
			    	document.getElementById("modal-title1").innerHTML = 'Items PFT de OS' + id_boton;
			    	document.getElementById("tabla-body1").innerHTML = '';
			    	for (var i = 0; i < respuesta.id.length; i++) {
			    		$("#table-modal1 > #tabla-body1").prepend('<tr><td>' + respuesta.id[i] + '</td><td>' + respuesta.codigo[i] + '</td><td>' + respuesta.descripcion[i] + '</td><td>' + respuesta.cantidad[i] + '</td><td>' + respuesta.estado[i] + '</td></tr>');
			    	}

			    	// $('#table-modal').DataTable().ajax.reload();
			    	$('#modal1').modal('show');
			    	console.log(respuesta)
			    },
			    error : function(xhr, status) {
			    	alert('No se pudo realizar la petición');
			    	console.log(xhr);
			    },
			});
		});


		$('.boton2').click(function () {
			var id_boton = $(this).prop("name");
			$.ajax({
			    url : '{{ action('OSController@mostrarItemsMat')}}', // la URL para la petición	    
			    data : { id : id_boton }, // la información a enviar (también es posible utilizar una cadena de datos)
			    type : 'POST', // especifica si será una petición POST o GET
			    // dataType : 'json', // el tipo de información que se espera de respuesta
			    success : function(respuesta) {
			    	document.getElementById("modal-title2").innerHTML = 'Items MAT de OS' + id_boton;
			    	document.getElementById("tabla-body2").innerHTML = '';
			    	for (var i = 0; i < respuesta.id.length; i++) {
			    		$("#table-modal2 > #tabla-body2").prepend('<tr><td>' + respuesta.id[i] + '</td><td>' + respuesta.codigo[i] + '</td><td>' + respuesta.descripcion[i] + '</td><td>' + respuesta.cantidad[i] + '</td><td>' + respuesta.estado[i] + '</td></tr>');
			    	}

			    	// $('#table-modal').DataTable().ajax.reload();
			    	$('#modal2').modal('show');
			    	console.log(respuesta)
			    },
			    error : function(xhr, status) {
			    	alert('No se pudo realizar la petición');
			    	console.log(xhr);
			    },
			});
		});


		$('.boton3').click(function () {
			var id_boton = $(this).prop("name");
			$.ajax({
			    url : '{{ action('OSController@mostrarItemsMaq')}}', // la URL para la petición	    
			    data : { id : id_boton }, // la información a enviar (también es posible utilizar una cadena de datos)
			    type : 'POST', // especifica si será una petición POST o GET
			    // dataType : 'json', // el tipo de información que se espera de respuesta
			    success : function(respuesta) {
			    	document.getElementById("modal-title3").innerHTML = 'Items MAQ de OS' + id_boton;
			    	document.getElementById("tabla-body3").innerHTML = '';
			    	for (var i = 0; i < respuesta.id.length; i++) {
			    		$("#table-modal3 > #tabla-body3").prepend('<tr><td>' + respuesta.id[i] + '</td><td>' + respuesta.codigo[i] + '</td><td>' + respuesta.descripcion[i] + '</td><td>' + respuesta.cantidad[i] + '</td><td>' + respuesta.existencia[i] + '</td><td>' + respuesta.fecha[i] + '</td></tr>');
			    	}

			    	// $('#table-modal').DataTable().ajax.reload();
			    	$('#modal3').modal('show');
			    	console.log(respuesta)
			    },
			    error : function(xhr, status) {
			    	alert('No se pudo realizar la petición');
			    	console.log(xhr);
			    },
			});
		});
	});
</script>
@stop