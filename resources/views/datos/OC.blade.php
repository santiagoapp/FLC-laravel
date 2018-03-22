@extends('adminlte::page')

@section('title', 'Ordenes de compra')

@section('content_header')
<h1>Ordenes de compra</h1>
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
							<th>Proveedor</th>
							<th>Formas de pago</th>
							<th>Notas</th>
							<th>Fecha</th>
							<th>Items</th>
						</tr>
					</thead>
					<tbody>
						@foreach($result as $OCReg)
						<tr>
							<td>{{ $OCReg->id }}</td>
							<td>{{ $OCReg->proveedor }}</td>
							<td>{{ $OCReg->pago }}</td>
							<td>{{ $OCReg->nota }}</td>
							<td>{{ Carbon\Carbon::parse($OCReg->fecha_impresion)->format('Y-m-d') }}</td>
							<td>
								<a id="boton-{{ $OCReg->id }}" class="btn btn-flat btn-block btn-primary boton" role="button" name="{{ $OCReg->id }}" data-toggle="modal">Ver Items</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Proveedor</th>
							<th>Formas de pago</th>
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
										<th>Item</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Estado</th>
										<th>Fecha</th>
										<th>Tipo</th>
									</tr>
								</thead>
								<tbody id="tabla-body">
									
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Item</th>
										<th>Código</th>
										<th>Descripción</th>
										<th>Cantidad</th>
										<th>Estado</th>
										<th>Fecha</th>
										<th>Tipo</th>
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

@stop