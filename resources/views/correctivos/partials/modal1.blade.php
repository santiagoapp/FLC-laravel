<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Editar Registro</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<form id="registrar">
							{{ csrf_field() }}
							@method('POST')
							<div class="col-md-5">
								<img src="{{asset('img/logo.png')}}" alt="" style="width: 95%">
								
								<div class="form-group has-feedback">
									<label>Causa</label>
									<input type="hidden" id="hidden" name="hidden" class="form-control">
									<textarea type="text" id="causa" name="causa" class="form-control textarea" rows="3" placeholder="Causa"></textarea>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label>Estado</label>
											<input type="text" id="estado" name="estado" class="form-control" placeholder="Estado" required>
										</div>
									</div>
									<div class="col-md-6">

										<div class="form-group has-feedback">
											<label>Falla</label>
											<input type="text" id="falla" name="falla" class="form-control" placeholder="Falla" required>
										</div>
									</div>
									<div class="col-md-6">

										<div class="form-group has-feedback">
											<label>Equipo</label>
											<select class="form-control pull-right select2" id="equipo" name="equipo" style="width: 100%;" required>
												<option></option>
												@foreach($equipos as $equipo)
												<option value="{{$equipo->id}}">{{$equipo->maquina_id}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">

										<div class="form-group has-feedback">
											<label>Operario</label>
											<select class="form-control pull-right select2" id="operario" name="operario" style="width: 100%;" required>
												<option></option>
												@foreach($operarios as $operario)
												<option value="{{$operario->id}}">{{$operario->nombre}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">

										<!-- Date -->
										<div class="form-group has-feedback">
											<label>Fecha de inicio:</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="fecha_inicio" name="fecha_inicio">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<!-- Date -->
										<div class="form-group has-feedback">
											<label>Fecha de finalización:</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="fecha_fin" name="fecha_fin">
											</div>
										</div>
									</div>
								</div>

								<div class="form-group has-feedback">
									<label>Observaciones</label>
									<textarea type="text" id="observacion" name="observacion" class="form-control textarea" rows="3" placeholder="Observaciones"></textarea>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="actualizar" class="btn btn-flat btn-default" data-dismiss="modal">Actualizar</button>
				<button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>