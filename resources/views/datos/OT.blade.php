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
						<tr>
							<td>ID</td>
							<td>Fecha de Impresion</td>
							<td>Cliente</td>
							<td>Vendedor</td>
							<td>Ciudad</td>
							<td>Observaciones</td>
							<td>Transporta</td>
							<td>
								<a href="#" class="btn btn-flat btn-block btn-primary" role="button" data-toggle="modal" data-target="#myModal">Ver Items</a>
							</td>
						</tr>
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
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Items</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-xs-5">
							<table id="modal-table" class="table table-bordered table-hover">
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
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<script>
	$(function () {
		$('#example2').DataTable({
			buttons: [
			'copy', 'excel', 'pdf'
			],
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>

<script>
	$(function () {
		$('#modal-table').DataTable({
			buttons: [
			'copy', 'excel', 'pdf'
			],
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>
@stop