$(document).ready(function() {
	$('#table_id').DataTable();
	$( "#tabs" ).tabs();
});
var save_method; // for save method string
var table;

function add_paciente() {
	save_method = 'add';
	$('#form')[0].reset();
	$('#modal_form').modal('show');
	$('.modal-title').text('Incluir paciente'); // Set Title to Bootstrap modal
	// title
}

function editar_paciente(id) {
	save_method = 'update';
	$('#form')[0].reset(); // reset form on modals

	// Ajax Load data from ajax
	$.ajax({
		url : 'cadastro/editarPaciente/' + id,
		type : "GET",
		dataType : "JSON",
		success : function(data) {

			$('[name="id"]').val(data.id);
			$('[name="nome"]').val(data.nome);
			$('[name="nome_mae"]').val(data.nome_mae);
			$('[name="nome_pai"]').val(data.nome_pai);
			$('[name="email"]').val(data.email);

			$('#modal_form').modal('show');
			$('.modal-title').text('Atualizar Paciente');

		},
		error : function(jqXHR, textStatus, errorThrown) {
			alert('Error get data from ajax');
		}
	});
}

function save() {
	var url;
	if (save_method == 'add') {
		url = "cadastro/";
	} else {
		url = "index.php/book/book_update";
	}

	// ajax adding data to database
	$.ajax({
		url : url,
		type : "POST",
		data : $('#form').serialize(),
		dataType : "JSON",
		success : function(data) {
			// if success close modal and reload ajax table
			$('#modal_form').modal('hide');
			location.reload();// for reload a page
		},
		error : function(jqXHR, textStatus, errorThrown) {
			alert('Error adding / update data');
		}
	});
}

function delete_book(id) {
	if (confirm('Tem certeza que deseja excluir o paciente?')) {

		$.ajax({
			url : "<?php echo site_url('index.php/book/book_delete')?>/" + id,
			type : "POST",
			dataType : "JSON",
			success : function(data) {

				location.reload();
			},
			error : function(jqXHR, textStatus, errorThrown) {
				alert('Error deleting data');
			}
		});

	}
}
