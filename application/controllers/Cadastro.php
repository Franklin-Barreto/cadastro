<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cadastro extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * http://example.com/index.php/welcome
     * - or -
     * http://example.com/index.php/welcome/index
     * - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    
    /*
     * (non-PHPdoc)
     * @see CI_Controller::__construct()
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Paciente_model');
        $this->load->model('Endereco_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('cadastro/index?');
        $config['total_rows'] = $this->Paciente_model->contar_todos_pacientes();
        $this->pagination->initialize($config);
        
        $data['pacientes'] = $this->Paciente_model->listar_pacientes($params);
        
        $this->load->view('cadastro_view', $data);
    }

    public function adicionarPaciente()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'validar_nome');
        $this->form_validation->set_rules('nome_mae', 'Nome da mãe', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode([
                'error' => $errors
            ]);
        } else {
            $dataPaciente = array(
                'nome' => $this->input->post('nome'),
                'nome_mae' => $this->input->post('nome_mae'),
                'nome_pai' => $this->input->post('nome_pai'),
                'email' => $this->input->post('email')
            );
            
            $pacienteId = $this->Paciente_model->adicionar_paciente($dataPaciente);
            
            $dataEndereco = array(
                'status' => 1,
                'paciente_id' => $pacienteId,
                'nome_bairro' => $this->input->post('nome_bairro'),
                'rua' => $this->input->post('rua')
            );
            $this->Endereco_model->adicionar_endereco($dataEndereco);
            echo json_encode(array(
                "status" => TRUE
            ));
        }
    }

    public function atualizarPaciente()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'validar_nome');
        $this->form_validation->set_rules('nome_mae', 'Nome da mãe', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode([
                'error' => $errors
            ]);
        } else {
            $dataPaciente = array(
                'nome' => $this->input->post('nome'),
                'nome_mae' => $this->input->post('nome_mae'),
                'nome_pai' => $this->input->post('nome_pai'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            );
            
            $this->Paciente_model->atualizar_paciente($this->input->post('paciente_id'), $dataPaciente);
            
            $dataEndereco = array(
                
                'nome_bairro' => $this->input->post('nome_bairro'),
                'rua' => $this->input->post('rua')
            );
            $this->Endereco_model->atualizar_endereco($this->input->post('endereco_id'), $dataEndereco);
            echo json_encode(array(
                "status" => TRUE
            ));
        }
    }

    public function editarPaciente($id)
    {
        $data = $this->Paciente_model->buscar_paciente($id);
        echo json_encode($data);
    }

    public function removerPaciente($id)
    {
        $this->Paciente_model->remover_paciente($id);
        echo json_encode(array(
            "status" => TRUE
        ));
    }
}
