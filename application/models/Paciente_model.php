<?php
class Paciente_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	
	/*
	 * Obter paciente por id
	 */
	function buscar_paciente($id) {
		return $this->db->get_where ( 'paciente', array (
				'id' => $id 
		) )->row_array ();
	}
	
	/*
	 * Contar todos os pacientes
	 */
	function contar_todos_pacientes() {
		$this->db->from ( 'paciente' );
		return $this->db->count_all_results ();
	}
	
	/*
	 * Obter todos os pacientes
	 */
	function listar_pacientes($params = array()) {
		$this->db->order_by ( 'id', 'desc' );
		if (isset ( $params ) && ! empty ( $params )) {
			$this->db->limit ( $params ['limit'], $params ['offset'] );
		}
		return $this->db->get('paciente')->result();
	}
	
	/*
	 * adicionar paciente
	 */
	function adicionar_paciente($params) {
		$this->db->insert ( 'paciente', $params );
		return $this->db->insert_id ();
	}
	
	/*
	 * atualizar paciente
	 */
	function atualizar_paciente($id, $params) {
		$this->db->where ( 'id', $id );
		return $this->db->update ( 'paciente', $params );
	}
	
	/*
	 * excluir paciente
	 */
	function remover_paciente($id) {
		return $this->db->delete ( 'paciente', array (
				'id' => $id 
		) );
	}
}
