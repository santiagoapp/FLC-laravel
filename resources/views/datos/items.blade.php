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
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Codigo</th>
							<th>Descripción</th>
							<th>Existencias</th>
						</tr>
					</thead>
					<tbody>
						@foreach($result as $ItemReg)
						<tr>
							<td>{{ $ItemReg->id }}</td>
							<td>{{ $ItemReg->codigo }}</td>
							<td>{{ $ItemReg->descripcion }}</td>
							<td>{{ $ItemReg->existencias }}</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Codigo</th>
							<th>Descripción</th>
							<th>Existencias</th>
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

@stop

@section('js')

@stop