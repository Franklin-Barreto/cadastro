<?php

class Paciente_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /*
     * Obter paciente por id
     */
    function buscar_paciente($id)
    {
        $query = $this->db->select(
            'p.id as paciente_id,
            p.nome,p.nome_mae,
            p.nome_pai,p.email,
            p.status as paciente_status,
            e.nome_bairro,e.rua,
            e.id as endereco_id')
            ->from('paciente as p')
            ->join('endereco as e', 'p.id = e.paciente_id')
            ->where('p.id', $id)
            ->get()
         ->row_array();
        //echo $this->db->last_query();
        return $query;
    }

    /*
     * Contar todos os pacientes
     */
    function contar_todos_pacientes()
    {
        $this->db->from('paciente');
        return $this->db->count_all_results();
    }

    /*
     * Obter todos os pacientes
     */
    function listar_pacientes()
    {
        $this->db->order_by('id', 'desc');
        /*if (isset($params) && ! empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }*/
        return $this->db->get('paciente')->result();
    }

    /*
     * adicionar paciente
     */
    function adicionar_paciente($params)
    {
        $this->db->insert('paciente', $params);
        return $this->db->insert_id();
    }

    /*
     * atualizar paciente
     */
    function atualizar_paciente($id, $params)
    {
        $this->db->where('paciente.id', $id);
        return $this->db->update('paciente', $params);
    }

    /*
     * excluir paciente
     */
    function remover_paciente($id)
    {
        return $this->db->delete('paciente', array(
            'id' => $id
        ));
    }
}
