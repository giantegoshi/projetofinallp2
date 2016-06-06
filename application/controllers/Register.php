<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'My_Controller.php';

class Register extends My_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('dao/UserDAO');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

	public function index(){
        $this->form_validation->set_message('required', 'Preencha o campo %s.');
        $this->form_validation->set_message('min_length', 'O campo %s deve ter no minimo 5 caracteres.');
        $this->form_validation->set_message('max_length', 'O campo %s deve ter no maximo 80 caracteres.');
        $this->form_validation->set_message('valid_email', 'Informe um email valido.');
        $this->form_validation->set_rules('usr_fname','Nome','trim|required|min_length[5]|max_length[80]|xss_clean');
        $this->form_validation->set_rules('usr_lname', 'Sobrenome', 'trim|required|min_length[5]|max_length[80]|xss_clean');
        $this->form_validation->set_rules('usr_email', 'E-mail', 'trim|required|min_length[5]|max_length[80]|valid_email|xss_clean');
        if($this->form_validation->run() === FALSE){
            $data['success'] = false;
            $this->load->view('common/header');
            $this->load->view('users/register', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->UserDAO->cadastraUser();
            $data['success'] = true;
            $this->load->view('common/header');
            $this->load->view('users/register',$data);
            $this->load->view('common/footer');
        }
	}
        
        
}