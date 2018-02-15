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
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>ID (RQ)</th>
							<th>Proveedor</th>
							<th>Formas de pago</th>
							<th>Notas</th>
							<th>Fecha</th>
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
							<td>asd</td>
							<td>
								<a href="#" class="btn btn-flat btn-primary" role="button">P. Final</a>
								<a href="#" class="btn btn-flat btn-primary" role="button">Material</a>
								<a href="#" class="btn btn-flat btn-primary" role="button">Servicio</a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>ID (RQ)</th>
							<th>Proveedor</th>
							<th>Formas de pago</th>
							<th>Notas</th>
							<th>Fecha</th>
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