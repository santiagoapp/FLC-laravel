@extends('adminlte::page')

@section('title', 'Entradas')

@section('content_header')
<h1>Entradas</h1>
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
							<th>Fecha de Recibido</th>
							<th>Proveedor</th>
							<th>Items</th>
						</tr>
					</thead>
					<tbody>
						@foreach($result as $re)
						<tr>
							<td>{{$re->id}}</td>
							<td>{{$re->ot_id}}</td>
							<td>{{ Carbon\Carbon::parse($re->fecha)->format('Y-m-d') }}</td>
							<td>{{$re->proveedor}}</td>
							<td>
								<a id="boton-{{ $re->id }}" class="btn btn-flat btn-block btn-primary boton" role="button" name="{{ $re->id }}" data-toggle="modal">Ver Items</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>ID (OT)</th>
							<th>Fecha de Recibido</th>
							<th>Proveedor</th>
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
										<th>Producto</th>
										<th>Nota</th>
									</tr>
								</thead>
								<tbody id="tabla-body">
									
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Producto</th>
										<th>Nota</th>
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

		$('.boton').click(function () {
			var id_boton = $(this).prop("name");
			$.ajax({
			    url : '{{ action('REController@mostrarItems')}}', // la URL para la petición	    
			    data : { id : id_boton }, // la información a enviar (también es posible utilizar una cadena de datos)
			    type : 'POST', // especifica si será una petición POST o GET
			    // dataType : 'json', // el tipo de información que se espera de respuesta
			    success : function(respuesta) {
			    	document.getElementById("modal-title").innerHTML = 'Items de RE' + id_boton;
			    	document.getElementById("tabla-body").innerHTML = '';
			    	for (var i = 0; i < respuesta.id.length; i++) {
			    		$("#table-modal > #tabla-body").prepend('<tr><td>' + respuesta.id[i] + '</td><td>' + respuesta.codigo[i] + '</td><td>' + respuesta.descripcion[i] + '</td><td>' + respuesta.producto[i] + '</td><td>' + respuesta.nota[i] + '</td></tr>');
			    	}

			    	// $('#table-modal').DataTable().ajax.reload();
			    	$('#modal').modal('show');
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