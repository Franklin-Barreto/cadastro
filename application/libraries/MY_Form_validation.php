<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{

    public function __construct($rules = array())
    {
        parent::__construct($rules);
    }

    public function validar_nome($nome)
    {
        $sucesso = false;
        
        if (! preg_match('/([a-z-A-Z])\1{2,}/', $nome)) {
            $sucesso = true;
        }
        $this->CI->form_validation->set_message('validar_nome', 'O campo {field} não podem ter três letras sequenciais repetidas');
        return $sucesso;
    }
}