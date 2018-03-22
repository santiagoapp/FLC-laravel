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
									<input type="hidden" id="hidden" name="hidden" class="form-control">
									<input type="text" id="nombre" name="name" class="form-control" placeholder="Nombre" required>
								</div>
								<div class="form-group has-feedback">
									<input type="text" id="abreviacion" name="abreviacion" class="form-control" placeholder="abreviacion" required>
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