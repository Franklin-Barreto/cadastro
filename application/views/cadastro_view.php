<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro de Paciente</title>
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/jquery-ui.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/jquery-ui.theme.min.css')?>" rel="stylesheet">

<script src="<?php echo base_url('assets/jquery/jquery-3.1.0.min.js')?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery-ui.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url();?>assets/js/arquivo.js"></script>
</head>
<body>
	<div class="container">
		</center>
		<h3>Cadastro Paciente</h3>
		<br />
		<button class="btn btn-success" onclick="adicionar_paciente()">
			<i class="glyphicon glyphicon-plus"></i> Incluir
		</button>
		<br /> <br />
		<table id="table_id" class="table table-striped table-bordered"
			cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Nome Mãe</th>
					<th>Nome Pai</th>
					<th>Email</th>
					<th>Status</th>
					<th style="width: 120px;">Operações
						</p>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($pacientes as $p){ ?>
			  <tr>
					<td><?php echo $p->nome; ?></td>
					<td><?php echo $p->nome_mae; ?></td>
					<td><?php echo $p->nome_pai; ?></td>
					<td><?php echo $p->email; ?></td>
					<td><?php echo $p->status==1?'Ativo':'Inativo'; ?></td>
					<td>
						<button class="btn btn-warning"
							onclick="editar_paciente(<?php echo $p->id;?>)">
							<i class="glyphicon glyphicon-pencil"></i>
						</button>
						<button class="btn btn-danger"
							onclick="deletar_paciente(<?php echo $p->id;?>)">
							<i class="glyphicon glyphicon-remove"></i>
						</button>
					</td>
				</tr>
				     <?php }?>
      </tbody>
		</table>
	</div>
<?php require_once 'modal_crud.php'; ?>
</body>
</html>
