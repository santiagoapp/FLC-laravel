@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="row">

					<div class="col-md-10">
						<h3 class="box-title">Permisos</h3>
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
								<a href="#" class="btn btn-flat btn-block btn-primary" role="button">Ver Items</a>
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
@stop