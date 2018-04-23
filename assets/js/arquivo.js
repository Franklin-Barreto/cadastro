$(document).ready(function() {
	$('#table_id').DataTable();
	$("#tabs").tabs();
});
var save_method;
var table;

function adicionar_paciente() {
	save_method = 'add';
	$('#form')[0].reset();
	$('#modal_form').modal('show');
	$('.modal-title').text('Incluir paciente');

}

function editar_paciente(id) {
	save_method = 'update';
	$('#form')[0].reset();

	$.ajax({
		url : 'cadastro/editarPaciente/' + id,
		type : "GET",
		dataType : "JSON",
		success : function(data) {

			$('[name="paciente_id"]').val(data.paciente_id);
			$('[name="nome"]').val(data.nome);
			$('[name="nome_mae"]').val(data.nome_mae);
			$('[name="nome_pai"]').val(data.nome_pai);
			$('[name="email"]').val(data.email);
			$("[name=status]").val([ data.paciente_status ]);

			$('[name="rua"]').val(data.rua);
			$('[name="nome_bairro"]').val(data.nome_bairro);
			$('[name="endereco_id"]').val(data.endereco_id);

			$('#modal_form').modal('show');
			$('.modal-title').text('Atualizar Paciente');

		},
		error : function(jqXHR, textStatus, errorThrown) {
			alert('Erro ao editar paciente');
		}
	});
}

function save() {
	var url;
	if (save_method == 'add') {
		url = "cadastro/adicionarPaciente";
	} else {
		url = "cadastro/atualizarPaciente";
	}

	$.ajax({
		url : url,
		type : "POST",
		data : $('#form').serialize(),
		dataType : "JSON",
		success : function(data) {
			if ($.isEmptyObject(data.error)) {
				$(".print-error-msg").css('display', 'none');
				$('#modal_form').modal('hide');
				location.reload();

			} else {
				$(".print-error-msg").css('display', 'block');
				$(".print-error-msg").html(data.error);
			}
		},
		error : function(jqXHR, textStatus, errorThrown) {
			console.log("Log 1" + JSON.stringify(jqXHR));
			console.log("Log 2" + textStatus);
			console.log("Log 3" + errorThrown);
			alert('Erro ao adicionar ou atualizar paciente');
		}
	});
}

function deletar_paciente(id) {
	if (confirm('Tem certeza que deseja excluir o paciente?')) {

		$.ajax({
			url : "cadastro/removerPaciente/" + id,
			type : "POST",
			dataType : "JSON",
			success : function(data) {

				location.reload();
			},
			error : function(jqXHR, textStatus, errorThrown) {
				alert('Erro ao deletar paciente');
			}
		});

	}
}
