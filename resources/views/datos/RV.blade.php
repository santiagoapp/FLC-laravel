@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Remisiones</h1>
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
							<th>ID (OT)</th>
							<th>Fecha de expedicion</th>
							<th>Fecha de Vencimiento</th>
							<th>Cliente</th>
							<th>Items</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>asd</td>
							<td>asd</td>
							<td>asd</td>
							<td>asd</td>
							<td>asd</td>
							<td>
								<a href="#" class="btn btn-flat btn-primary" role="button" data-toggle="modal" data-target="#myModal">Ver items</a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>ID (OT)</th>
							<th>Fecha de expedicion</th>
							<th>Fecha de Vencimiento</th>
							<th>Cliente</th>
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
										<th>Item</th>
										<th>Nota</th>
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
										<th>Item</th>
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
		$('#modal-table').DataTable({
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