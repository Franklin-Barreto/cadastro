<?php


class Cadastro_test extends TestCase
{

    
    public function test_adicionarPaciente_nome_obrigatorio_falha(){
        $_POST['nome'] = '';
        $output = $this->request('POST', 'cadastro/adicionarPaciente',$_POST);
        $output =json_decode($output);
        $this->assertEquals(FALSE, $output->status);
        
    }
    public function test_adicionarPaciente_tres_letras_iguais_falha(){
        $_POST['nome'] = 'Fraaanklin';
        $output = $this->request('POST', 'cadastro/adicionarPaciente',$_POST);
        $output =json_decode($output);
        $this->assertEquals(FALSE, $output->status);
        
    }
    public function test_adicionarPaciente__mae_nome_obrigatorio_falha(){
        $_POST['nome_mae'] = '';
        $output = $this->request('POST', 'cadastro/adicionarPaciente',$_POST);
        $output =json_decode($output);
        $this->assertEquals(FALSE, $output->status);
        
    }
    public function test_adicionarPaciente_email_obrigatorio(){
        $_POST['email'] = '';
        $output = $this->request('POST', 'cadastro/adicionarPaciente',$_POST);
        $output =json_decode($output);
        $this->assertEquals(FALSE, $output->status);
        
    }
    public function test_adicionarPaciente_email_valido_falha(){
        $_POST['email'] = 'franklin.com.br';
        $output = $this->request('POST', 'cadastro/adicionarPaciente',$_POST);
        $output =json_decode($output);
        $this->assertEquals(FALSE, $output->status);
        
    }
    public function test_adicionarPaciente_acerto(){
        $_POST['nome'] = 'Franklin Pereira Barreto';
        $_POST['nome_mae'] = 'Francisca Pereira da Silva';
        $_POST['email'] = 'franklin-barreto@hotmail.com';
        $output = $this->request('POST', 'cadastro/adicionarPaciente',$_POST);
        $output =json_decode($output);
        $this->assertEquals(TRUE, $output->status);
        
    }

}
