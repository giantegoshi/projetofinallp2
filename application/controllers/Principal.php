<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'My_Controller.php';

class Principal extends My_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('principal_model');
    }

	public function index(){
        $data['title'] = 'Home';
        $this->load->view('common/header');
        $data['menu'] = $this->principal_model->get_menu_principal();
        $data['home_value'] = $this->principal_model->get_home();
        $this->load->view('principal/home', $data);
        $this->load->view('common/footer');
	}

    public function sobre(){
        $data['title'] = 'Sobre';
        $this->load->view('common/header');
        $data['menu'] = $this->principal_model->get_menu_principal();
        $data['sobre_value'] = $this->principal_model->get_sobre();
        $this->load->view('principal/sobre', $data);
        $this->load->view('common/footer');
    }

    public function trabalho(){
        $data['title'] = 'Trabalho';
        $this->load->view('common/header');
        $data['menu'] = $this->principal_model->get_menu_principal();
        $data['trabalho_value'] = $this->principal_model->get_trabalho();
        $this->load->view('principal/trabalho', $data);
        $this->load->view('common/footer');
    }

    public function contato(){
        $data['title'] = 'Contato';
        $data['erro'] = '';
        $this->load->view('common/header');
        $data['menu'] = $this->principal_model->get_menu_principal();
        $this->load->view('principal/contato', $data);
        $this->load->view('common/footer');
    }

    public function formacao(){
        $data['title'] = 'Formação';
        $this->load->view('common/header');
        $data['menu'] = $this->principal_model->get_menu_principal();
        $data['formacao_value'] = $this->principal_model->get_formacao();
        $this->load->view('principal/formacao', $data);
        $this->load->view('common/footer');
    }

    public function pdf(){
        $data['sobre_value'] = $this->principal_model->get_pdf();
        $html=$this->load->view('pdf_output', $data, true); 
        $pdfFilePath = "Curriculo_GianSeijiTegoshi.pdf";
        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
    }

    public function inserirContato(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_message('max_lenght', 'O campo %s deve ser menor que 80 letras.');
        $this->form_validation->set_message('valid_email', 'O campo %s deve possuir um email valido.');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Contato";
            $data['menu'] = $this->principal_model->get_menu_principal();
            $this->load->view('common/header');
            $this->load->view('principal/contato', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->principal_model->inserirContato();
            $data['title'] = "Contato";
            $data['menu'] = $this->principal_model->get_menu_principal();
            $data['erro'] = "Contato enviado";
            $this->load->view('common/header');
            $this->load->view('principal/contato', $data);
            $this->load->view('common/footer');
        }
    }        
        
}