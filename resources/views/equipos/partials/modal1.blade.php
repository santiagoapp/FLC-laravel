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
								
								<div id="image_preview">
									
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12" style="margin-top: 18px;">
											<div class="form-group">
												<label for="imagen">Imágen</label>
												<input type="file" id="imagen" name="imagen">

												<p class="help-block">Archivos jpg, jpeg o png, (Peso máximo 3000 kb).</p>
											</div>
										</div>
										<div class="col-xs-12" >
											<label>Documentos</label>
										</div>
										<div class="col-xs-6">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="catalogo" name="catalogo">
													Catalogo
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" id="dibujo" name="dibujo">
													Dibujo
												</label>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="checkbox">
												<label>
													<input type="checkbox" id="diagrama_electrico" name="diagrama_electrico">
													Diagrama Eléctrico
												</label>
											</div>
											<div class="checkbox">
												<label>
													<input type="checkbox" id="manual" name="manual">
													Manual
												</label>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group has-feedback">
												<label>Marca</label>
												<input type="text" id="marca" name="marca" class="form-control" placeholder="Marca" required>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group has-feedback">
												<label>Modelo</label>
												<input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo" required>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group has-feedback">
												<label>Factura</label>
												<input type="text" id="factura" name="factura" class="form-control" placeholder="Factura" required>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group has-feedback">
												<label>Corriente</label>
												<input type="text" id="corriente" name="corriente" class="form-control" placeholder="Corriente" required>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group has-feedback">
												<label>Voltaje</label>
												<input type="text" id="voltaje" name="voltaje" class="form-control" placeholder="Voltaje" required>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group has-feedback">
												<label>Procedencia</label>
												<input type="text" id="procedencia" name="procedencia" class="form-control" placeholder="Procedencia" required>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group has-feedback">
									<input type="hidden" id="hidden" name="hidden" class="form-control">
									<label>Nombre</label>
									<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
								</div>
								<div class="form-group has-feedback">
									<label>ID Maquina</label>
									<input type="text" id="maquina_id" name="maquina_id" class="form-control" placeholder="Maquina ID" required>
								</div>
								<div class="form-group has-feedback">
									<label>Zona</label>
									<select id="zona" name="zona" class="form-control" required>
										@foreach($zonas as $zona)
										<option value="{{$zona->id}}">{{$zona->nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group has-feedback">
									<label>Clasificación</label>
									<select id="clasificacion" name="clasificacion" class="form-control" required>
										@foreach($clasificacions as $clasificacion)
										<option value="{{$clasificacion->id}}">{{$clasificacion->nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group has-feedback">
									<label>Encargado</label>
									<select id="operario" name="operario" class="form-control" required>
										@foreach($operarios as $operario)
										<option value="{{$operario->id}}">{{$operario->nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group has-feedback">
									<label>Descripcción</label>
									<textarea type="text" id="descripcion" name="descripcion" class="form-control textarea" rows="3" placeholder="Descripcción"></textarea>
								</div>
								<div class="form-group has-feedback">
									<label>Observación</label>
									<textarea type="text" id="observacion" name="observacion" class="form-control textarea" rows="3" placeholder="Observacion"></textarea>
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