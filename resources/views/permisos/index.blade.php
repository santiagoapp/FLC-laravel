@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1>Permisos</h1>
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
					<div class="col-md-2 justify-content-right">
						<a href="#" class="btn btn-flat btn-primary" role="<b></b>utton"><span class="fa fa-plus"></span> Agregar Nuevo</a>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Usuario</th>
							<th>Correo</th>
							<th>Permisos</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Santiago Andrés Pereira Pabón</td>
							<td>santiagoapp@gmail.com</td>
							<td>
								<div class="btn-group btn-group-justified" role="group">
									<a href="#" class="btn btn-primary" role="button">Compras</a>
									<a href="#" class="btn btn-default" role="button">Ventas</a>
									<a href="#" class="btn btn-default" role="button">Producción</a>
								</div>
								<div class="btn-group btn-group-justified" role="group">
									<a href="#" class="btn btn-default" role="button">Ingeniería</a>
									<a href="#" class="btn btn-default" role="button">Contabilidad</a>
									<a href="#" class="btn btn-default" role="button">Rq. Humanos</a>
								</div>
								<div class="btn-group btn-group-justified" role="group">
									<a href="#" class="btn btn-default" role="button">Almacén</a>
									<a href="#" class="btn btn-default" role="button">Laboratorio</a>
									<a href="#" class="btn btn-default" role="button">Gerencia</a>
								</div>
								<div class="btn-group btn-group-justified" role="group">
									<a href="#" class="btn btn-default" role="button">Super Su</a>
								</div>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Usuario</th>
							<th>Correo</th>
							<th>Permisos</th>
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
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>
@stop