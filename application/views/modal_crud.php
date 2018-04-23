
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title">Cadastro do paciente</h3>
			</div>
			<div class="alert alert-danger print-error-msg" style="display: none"></div>
			<div class="modal-body form">
				<form action="#" id="form" class="form-horizontal">
					<div id="tabs">
						<ul>
							<li><a href="#paciente">Paciente</a></li>
							<li><a href="#endereco">Endereço</a></li>
						</ul>
						<div id="paciente">
							<input type="hidden" name="paciente_id" /> <input type="hidden"
								name="endereco_id" />
							<div class="form-body">
								<div class="form-group">
									<label class="control-label col-md-3">Nome:</label>
									<div class="col-md-9">
										<input name="nome" placeholder="Nome do paciente"
											class="form-control" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Nome da mãe:</label>
									<div class="col-md-9">
										<input name="nome_mae" placeholder="Nome da mãe"
											class="form-control" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Nome do pai:</label>
									<div class="col-md-9">
										<input name="nome_pai" placeholder="Nome do pai"
											class="form-control" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Email:</label>
									<div class="col-md-9">
										<input name="email" placeholder="Email" class="form-control"
											type="email">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Status:</label>
									<div class="col-md-9">
										<div class="radio-inline">
											<input type="radio" name="status" value="1" checked> Ativo
										</div>
										<div class="radio-inline">
											<input type="radio" name="status" value="0">Inativo<br>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="endereco">
							<div class="form-group">
								<label for="nome_bairro" class="col-md-4 control-label">Nome
									Bairro</label>
								<div class="col-md-8">
									<input type="text" name="nome_bairro" class="form-control"
										id="nome_bairro" />
								</div>
							</div>
							<div class="form-group">
								<label for="rua" class="col-md-4 control-label">Rua</label>
								<div class="col-md-8">
									<input type="text" name="rua" class="form-control" id="rua" />
								</div>
							</div>
						</div>
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()"
					class="btn btn-primary">Salvar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>