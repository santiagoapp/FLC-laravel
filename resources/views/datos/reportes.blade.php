@extends('adminlte::page')

@section('title', 'Items')

@section('content_header')
<h1>Items</h1>
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
						<div class="col-md-4" style="margin-top: 20px; margin-bottom: 20px;">
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
						</div>
					</div>
				</div>
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>OT</th>
							<th>Codigo</th>
							<th>Cliente</th>
							<th>F. recibido</th>
							<th>Dif. F. recibido y F. de Impresion</th>
							<th>F. expedicion</th>
							<th>F. entrega</th>
						</tr>
					</thead>
					<tbody>
						@foreach($OTs as $ot)
						<tr>
							<td>{{ $ot->id }}</td>
							<td>{{ $ot->codigo }}</td>
							<td>{{ $ot->cliente }}</td>
							<td>{{ $ot->fecha_recibido_produccion }}</td>
							<td>
								{{ Carbon\Carbon::parse($ot->fecha_recibido_produccion)->diffInDays(Carbon\Carbon::parse($ot->fecha_impresion)) }}
							</td>
							<td>{{ $ot->expedicion }}</td>
							<td>{{ $ot->fecha_entrega }}</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>OT</th>
							<th>Codigo</th>
							<th>Cliente</th>
							<th>F. recibido</th>
							<th>Dif. F. recibido y F. de Impresion</th>
							<th>F. expedicion</th>
							<th>F. entrega</th>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('js')
<script src="{{asset('vendor/adminlte/vendor/fullcalendar/js/moment.js')}}"></script>

@stop