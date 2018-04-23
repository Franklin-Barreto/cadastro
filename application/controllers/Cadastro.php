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
        $data = array(
            'nome' => $this->input->post('nome'),
            'nome_mae' => $this->input->post('nome_mae'),
            'nome_pai' => $this->input->post('nome_pai'),
            'book_category' => $this->input->post('book_category'),
        );
        $insert = $this->book_model->book_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function editarPaciente($id)
    {
        $data = $this->Paciente_model->buscar_paciente($id);
        echo json_encode($data);
    }
}
