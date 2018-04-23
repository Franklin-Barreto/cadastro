<?php


class Cadastro_test extends TestCase
{
    public function test_index()
    {
        $output = $this->request('GET', 'cadastro/index');
        $this->assertContains('<title>Welcome to CodeIgniter</title>', $output);
    }
    
    public function test_adicionarPaciente(){
        
    }

}
