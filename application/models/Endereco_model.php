<?php
 
class Endereco_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function buscar_endereco_paciente($id)
    {
        return $this->db->get_where('endereco',array('paciente_id'=>$id))->row_array();
    }
        
    function adicionar_endereco($params)
    {
        $this->db->insert('endereco',$params);
        return $this->db->insert_id();
    }
    

    function atualizar_endereco($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('endereco',$params);
    }
    

    function remover_endereco($id)
    {
        return $this->db->delete('endereco',array('id'=>$id));
    }
}
