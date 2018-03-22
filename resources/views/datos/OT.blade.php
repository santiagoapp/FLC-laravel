@extends('adminlte::page')

@section('title', 'Ordenes de trabajo')

@section('content_header')
<h1>Ordenes de trabajo</h1>
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
						<div class="col-md-5 ">
							{{$result->links()}}
						</div>
					</div>
				</div>
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Fecha de Impresion</th>
							<th>Cliente</th>
							<th>Vendedor</th>
							<th>Ciudad</th>
							<th>Observaciones</th>
							<th>Transporta</th>
							<th>Items</th>
						</tr>
					</thead>
					<tbody>
						@foreach($result as $OTReg)
						<tr>
							<td>{{ $OTReg->id }}</td>
							<td>{{ Carbon\Carbon::parse($OTReg->fecha_impresion)->format('Y-m-d') }}</td>
							<td>{{ $OTReg->cliente }}</td>
							<td>{{ $OTReg->vendedor }}</td>
							<td>{{ $OTReg->ciudad }}</td>
							<td>{{ $OTReg->observacion }}</td>
							<td>{{ $OTReg->transporte }}</td>
							<td>
								<a id="boton-{{ $OTReg->id }}" class="btn btn-flat btn-block btn-primary boton" role="button" name="{{ $OTReg->id }}" data-toggle="modal">Ver Items</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Fecha de Impresion</th>
							<th>Cliente</th>
							<th>Vendedor</th>
							<th>Ciudad</th>
							<th>Observaciones</th>
							<th>Transporta</th>
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
						<div class="col-md-6 ">
							{{$result->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modal-title"> </h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-xs-7 col-md-offset-1">
							<table id="table-modal" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>F. Entrega</th>
										<th>Existencia</th>
									</tr>
								</thead>
								<tbody id="tabla-body">
									
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>F. Entrega</th>
										<th>Existencia</th>
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
			// alert(id_boton);
			$.ajax({
			    url : '{{ action('OTController@mostrarItems') }}', // la URL para la petición	    
			    data : { id : id_boton }, // la información a enviar (también es posible utilizar una cadena de datos)
			    type : 'POST', // especifica si será una petición POST o GET
			    // dataType : 'json', // el tipo de información que se espera de respuesta
			    success : function(respuesta) {
			    	document.getElementById("modal-title").innerHTML = 'Items de OT' + id_boton;
			    	document.getElementById("tabla-body").innerHTML = '';	
			    	for (var i = 0; i < respuesta.id.length; i++) {
			    		$("#table-modal > #tabla-body").prepend('<tr><td>' + respuesta.id[i] + '</td><td>' + respuesta.codigo[i] + '</td><td>' + respuesta.descripcion[i] + '</td><td>' + respuesta.cantidad[i] + '</td><td>' + respuesta.fecha_entrega[i] + '</td><td>' + respuesta.existencias[i] + '</td></tr>');
			    	}
			    	$('#modal').modal('show');
			    	console.log(respuesta.id);
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