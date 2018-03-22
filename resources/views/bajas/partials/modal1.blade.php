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
						<div class="col-xs-4">
							<img src="{{asset('img/logo.png')}}" alt="" style="width: 100%">
						</div>
						<div class="col-xs-4 col-md-offset-1">
							
							<form id="registrar">
								{{ csrf_field() }}
								@method('POST')
								<div class="form-group has-feedback">
									<label>Equipo</label>
									<select id="equipo" name="equipo" class="form-control" required>
										@foreach($equipos as $equipo)
										<option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group has-feedback">
									<label>Motivo</label>
									<input type="hidden" id="hidden" name="hidden" class="form-control">
									<textarea type="text" id="motivo" name="motivo" class="form-control textarea" rows="3" placeholder="Motivo"></textarea>
								</div>
								<div class="form-group has-feedback">
									<label>Autoriza</label>
									<input type="text" id="autoriza" name="autoriza" class="form-control" placeholder="Autoriza" required>
								</div>
								<div class="form-group has-feedback">
									<label>Cargo</label>
									<select id="cargo" name="cargo" class="form-control" required>
										@foreach($cargos as $cargo)
										<option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
										@endforeach
									</select>
								</div>
								
							</form>
						</div>
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