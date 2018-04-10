@extends('adminlte::page')

@section('title', 'Remisiones')

@section('content_header')
<h1>OTs Ofimatica</h1>
@stop

@section('content')
<div id="app" class="row">
	<template v-for="(ot, index) in ots">

		<div class="col-md-12 container">
			<div class="row">
				<div class="col-md-5">
					<!-- Custom Tabs -->
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a :href="'#tab_1_'+parseInt(ot.ID)" data-toggle="tab" aria-expanded="true">ORDEN DE TRABAJO</a></li>
						</ul>
						<div class="tab-content">
							<b>Consecutivo</b>
							<p>OT@{{ parseInt(ot.ID) }}</p>
							<b>Cliente</b>
							<p>@{{ ot.CLIENTE }}</p>
							<b>Observaciones</b>
							<p>@{{ ot.OBSERVACIONES }}</p>
							<b>Vendedor</b>
							<p>@{{ ot.VENDEDOR }}</p>
							<b>Ciudad</b>
							<p>@{{ ot.CALI }}</p>
							
							<form action="POST" :id="'i-'+index" class="form-group">
								<input type="hidden" v-model="index">
								<button class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar</button>
							</form>

						</div>
						<!-- /.tab-content -->
					</div>
					<!-- nav-tabs-custom -->
				</div>
				<div class="col-md-7">
					<!-- Custom Tabs -->
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a :href="'#tab_1_'+parseInt(ot.ID)" data-toggle="tab" aria-expanded="true">ITEMS</a></li>
							<li class=""><a :href="'#tab_2_'+parseInt(ot.ID)" data-toggle="tab" aria-expanded="false">RQ</a></li>
						</ul>
						<div class="tab-content">
							
							<div :id="'tab_1_'+parseInt(ot.ID)" class="tab-pane active" >
								<div class="table-responsive">
									<table class="table table-hover table-striped">
										<tr>
											<th width="15%">CODIGO</th>
											<th width="10%">ITEM</th>
											<th width="45%">DESCRIPCION</th>
											<th width="15%">FECHA</th>
										</tr>
										<tr v-for="item in ot.items">
											<td>@{{ item.CODIGO_ITEM }}</td>
											<td>@{{ item.ITEM }}</td>
											<td>@{{ item.DESCRIPCION }}</td>
											<td><span class="label label-success">@{{ item.FECHA }}</span></td>
										</tr>
									</table>
								</div>
							</div>
							<!-- /.tab-pane -->
							<div :id="'tab_2_'+parseInt(ot.ID)" class="tab-pane">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi dolorem doloremque dolore similique labore ut est nemo fugiat, necessitatibus itaque, repellendus nihil deserunt! Modi necessitatibus temporibus dolor quia at. Dolor?</p>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- nav-tabs-custom -->
				</div>
				
			</div>
		</div>
		
	</template>
</div>

@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>

<script>

</script>
@stop