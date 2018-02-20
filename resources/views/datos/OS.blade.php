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
						<div class="col-md-5 col-md-offset-1">
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
							<td>{{ $OSReg->notas }}</td>
							<td>{{ $OSReg->fecha }}</td>
							<td>
								<a id="boton-{{ $OSReg->id }}" class="btn btn-flat btn-block btn-info boton" role="button" name="{{ $OSReg->id }}" data-toggle="modal">Items P. Final</a>
								<a id="boton-{{ $OSReg->id }}" class="btn btn-flat btn-block btn-info boton" role="button" name="{{ $OSReg->id }}" data-toggle="modal">Items Material</a>
								<a id="boton-{{ $OSReg->id }}" class="btn btn-flat btn-block btn-info boton" role="button" name="{{ $OSReg->id }}" data-toggle="modal">Items Servicio</a>
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
						<div class="col-md-5 col-md-offset-1">
							{{$result->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Items Producto terminado</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-xs-5">
							<table id="modal-table1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Existencia</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>ID</td>
										<td>Fecha de Impresion</td>
										<td>Cliente</td>
										<td>Vendedor</td>
										<td>Ciudad</td>
										<td>Observaciones</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Existencia</th>
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
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title2" id="myModalLabel">Items Material</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-xs-6">
							<table id="modal-table1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>ID</td>
										<td>Fecha de Impresion</td>
										<td>Cliente</td>
										<td>Vendedor</td>
										<td>Ciudad</td>
									</tr>
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
<div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Items Maquinado o servicio</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-xs-6">
							<table id="modal-table3" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Fecha</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>ID</td>
										<td>Fecha de Impresion</td>
										<td>Cliente</td>
										<td>Vendedor</td>
										<td>Ciudad</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
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
		$('#modal-table1').DataTable({
			buttons: [
			'copy', 'excel', 'pdf'
			],
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>
<script>
	$(function () {
		$('#modal-table2').DataTable({
			buttons: [
			'copy', 'excel', 'pdf'
			],
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>
<script>
	$(function () {
		$('#modal-table3').DataTable({
			buttons: [
			'copy', 'excel', 'pdf'
			],
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>
@stop