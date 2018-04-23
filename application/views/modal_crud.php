
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
			<div class="modal-body form">
				<form action="#" id="form" class="form-horizontal">
					<div id="tabs">
						<ul>
							<li><a href="#paciente">Paciente</a></li>
							<li><a href="#endereco">Endereço</a></li>
						</ul>
						<div id="paciente">
							<input type="hidden" value="" name="id" />
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
							</div>
						</div>
						<div id="endereco">
							<p>Conteudo da aba 2.</p>
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