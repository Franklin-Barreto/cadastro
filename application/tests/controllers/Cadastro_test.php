<?php


class Cadastro_test extends TestCase
{
   /* public function test_index()
    {
        $output = $this->request('GET', 'cadastro/index');
        $this->assertContains('<title>Welcome to CodeIgniter</title>', $output);
    }*/
    
    public function test_adicionarPaciente_falha(){
        $_POST['nome'] = 'Fraaanklin';
        $_POST['nome_mae'] = 'Fraaanklin';
        $_POST['email'] = 'franklin-barreto@hotmail.com';
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
