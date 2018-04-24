<?php

class Cadastro_test extends TestCase
{

    public function test_adicionarPaciente_nome_obrigatorio_falha()
    {
        $_POST['nome'] = '';
        $_POST['nome_mae'] = 'Francisca Pereira da Silva';
        $_POST['nome_pai'] = 'Francisca Alves Barreto';
        $_POST['status'] = 1;
        $_POST['email'] = 'franklin-barreto@hotmail.com';
        $_POST['nome_bairro'] = 'Jardim Marilia';
        $_POST['rua'] = 'Pedro de Mena, 76';
         
        $output = $this->request('POST', 'cadastro/adicionarPaciente', $_POST);
        $output = json_decode($output);
        $this->assertEquals(FALSE, $output->status);
    }

    public function test_adicionarPaciente_tres_letras_iguais_falha()
    {
        $_POST['nome'] = 'Fraaanklin';
        $_POST['nome_mae'] = 'Francisca Pereira da Silva';
        $_POST['nome_pai'] = 'Francisca Alves Barreto';
        $_POST['status'] = 1;
        $_POST['email'] = 'franklin-barreto@hotmail.com';
        $_POST['nome_bairro'] = 'Jardim Marilia';
        $_POST['rua'] = 'Pedro de Mena, 76';
         
        $output = $this->request('POST', 'cadastro/adicionarPaciente', $_POST);
        $output = json_decode($output);
        $this->assertEquals(FALSE, $output->status);
    }

    public function test_adicionarPaciente__mae_nome_obrigatorio_falha()
    {
        $_POST['nome'] = 'Franklin Pereira Barreto';
        $_POST['nome_mae'] = '';
        $_POST['nome_pai'] = 'Francisca Alves Barreto';
        $_POST['status'] = 1;
        $_POST['email'] = 'franklin-barreto@hotmail.com';
        $_POST['nome_bairro'] = 'Jardim Marilia';
        $_POST['rua'] = 'Pedro de Mena, 76';
         
        $output = $this->request('POST', 'cadastro/adicionarPaciente', $_POST);
        $output = json_decode($output);
        $this->assertEquals(FALSE, $output->status);
    }

    public function test_adicionarPaciente_email_obrigatorio()
    {
        $_POST['nome'] = 'Franklin Pereira Barreto';
        $_POST['nome_mae'] = 'Francisca Pereira da Silva';
        $_POST['nome_pai'] = 'Francisca Alves Barreto';
        $_POST['status'] = 1;
        $_POST['email'] = '';
        $_POST['nome_bairro'] = 'Jardim Marilia';
        $_POST['rua'] = 'Pedro de Mena, 76';
        
        $output = $this->request('POST', 'cadastro/adicionarPaciente', $_POST);
        $output = json_decode($output);
        $this->assertEquals(FALSE, $output->status);
    }

    public function test_adicionarPaciente_email_valido_falha()
    {
        $_POST['nome'] = 'Franklin Pereira Barreto';
        $_POST['nome_mae'] = 'Francisca Pereira da Silva';
        $_POST['nome_pai'] = 'Francisca Alves Barreto';
        $_POST['status'] = 1;
        $_POST['email'] = 'franklin.com.br';
        $_POST['nome_bairro'] = 'Jardim Marilia';
        $output = $this->request('POST', 'cadastro/adicionarPaciente', $_POST);
        $output = json_decode($output);
        $this->assertEquals(FALSE, $output->status);
    }

    public function test_adicionarPaciente_acerto()
    {
        $_POST['nome'] = 'Franklin Pereira Barreto';
        $_POST['nome_mae'] = 'Francisca Pereira da Silva';
        $_POST['nome_pai'] = 'Francisca Alves Barreto';
        $_POST['status'] = 1;
        $_POST['email'] = 'franklin-barreto@hotmail.com';
        $_POST['nome_bairro'] = 'Jardim Marilia';
        $_POST['rua'] = 'Pedro de Mena, 76';
        
        $output = $this->request('POST', 'cadastro/adicionarPaciente', $_POST);
        $output = json_decode($output);
        $this->assertEquals(TRUE, $output->status);
    }
}
