@extends('adminlte::page')

@section('title', 'Requisiciones')

@section('content_header')
<h1>Requisiciones</h1>
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
						<div class="col-md-6 ">
							{{$result->links()}}
						</div>
					</div>
				</div>
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>ID (OT)</th>
							<th>Solicita</th>
							<th>Autoriza</th>
							<th>Cliente</th>
							<th>Fecha</th>
							<th>Items</th>
						</tr>
					</thead>
					<tbody>
						@foreach($result as $rq)
						<tr>
							<td>{{$rq->id}}</td>
							<td>{{$rq->find($rq->ot_id)->oT->id}}</td>
							<td>{{$rq->solicita}}</td>
							<td>{{$rq->autoriza}}</td>
							<td>{{$rq->find($rq->ot_id)->oT->cliente}}</td>
							<td>{{$rq->fecha}}</td>
							<td>
								<a id="boton-{{ $rq->id }}" class="btn btn-flat btn-block btn-primary boton" role="button" name="{{ $rq->id }}" data-toggle="modal">Ver Items</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>ID (OT)</th>
							<th>Solicita</th>
							<th>Autoriza</th>
							<th>Cliente</th>
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
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="container">
			<div class="row">
				<div class="col-xs-9">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modal-title"></h4>
						</div>
						<div class="modal-body">
							<div class="container">
								<div class="row">
									<div class="col-xs-6">
										<table id="table-modal" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>ID</th>
													<th>Codigo</th>
													<th>Descripción</th>
													<th>Cantidad</th>
													<th>Compra</th>
													<th>Servicio</th>
													<th>Estado</th>
													<th>Existencia</th>
													<th>Fecha</th>
												</tr>
											</thead>
											<tbody id="tabla-body">

											</tbody>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Codigo</th>
													<th>Descripción</th>
													<th>Cantidad</th>
													<th>Compra</th>
													<th>Servicio</th>
													<th>Estado</th>
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
		</div>
	</div>
</div>
@stop

@section('js')

<script>
	$(function () {		

		$('#table-modal').DataTable({
			// 'lengthMenu': [[2 ,5], [2, 5]],
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			"language": {
				"search":"Buscar: ",
				"lengthMenu": "_MENU_ registros por página",
				"zeroRecords": "No se encuentran registros",
				"info": "Página _PAGE_ of _PAGES_",
				"infoEmpty": "Sin registros disponibles",
				"infoFiltered": "(filtered from _MAX_ total records)",
				"paginate": {
					"first":      "Primero",
					"last":       "Ultimo",
					"next":       "Siguiente",
					"previous":   "Anterior"
				},
			}
		});

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.boton').click(function () {
			var id_boton = $(this).prop("name");
			$.ajax({
			    url : '{{ action('RQController@index')}}/'+ id_boton, // la URL para la petición	    
			    // data : { id : 123 }, // la información a enviar (también es posible utilizar una cadena de datos)
			    type : 'GET', // especifica si será una petición POST o GET
			    // dataType : 'json', // el tipo de información que se espera de respuesta
			    success : function(respuesta) {
			    	document.getElementById("modal-title").innerHTML = 'Items de RQ' + id_boton;
			    	document.getElementById("tabla-body").innerHTML = '';
			    	for (var i = 0; i < respuesta.id.length; i++) {

			    		$("#table-modal > #tabla-body").prepend('<tr><td>' + respuesta.id[i] + '</td><td>' + respuesta.codigo[i] + '</td><td>' + respuesta.descripcion[i] + '</td><td>' + respuesta.cantidad[i] + '</td><td>' + respuesta.compra[i] + '</td><td>' + respuesta.servicio[i] + '</td><td>' + respuesta.estado[i] + '</td><td>' + respuesta.existencias[i] + '</td><td>' + respuesta.fecha[i] + '</td></tr>');
			    	}
			    	$('#table-modal').DataTable().ajax.reload();
			    	$('#modal').modal('show');
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