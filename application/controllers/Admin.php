<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'My_Controller.php';

class Admin extends My_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('admin_model');
    }

	public function index(){
            if(!$this->session->userdata('usuario')){
                redirect(base_url('admin'));
            }
            $data['title'] = 'Home';
            $data['erro'] = '';
            $this->load->view('common/header');
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['home_value'] = $this->admin_model->get_home();
            $this->load->view('admin/home', $data);
            $this->load->view('common/footer');
	}

    public function sobre(){
            if(!$this->session->userdata('usuario')){
                redirect(base_url('admin'));
            }
            $data['title'] = 'Sobre';
            $data['erro'] = '';
            $this->load->view('common/header');
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['sobre_value'] = $this->admin_model->get_sobre();
            $this->load->view('admin/sobre', $data);
            $this->load->view('common/footer');
    }

    public function formacao(){
            if(!$this->session->userdata('usuario')){
                redirect(base_url('admin'));
            }
            $data['title'] = 'Formação';
            $data['erro'] = '';
            $this->load->view('common/header');
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['formacao_value'] = $this->admin_model->get_form_formacao();
            $this->load->view('admin/formacao', $data);
            $this->load->view('common/footer');
    }

    public function trabalho(){
            if(!$this->session->userdata('usuario')){
                redirect(base_url('admin'));
            }
            $data['title'] = 'Trabalho';
            $data['erro'] = '';
            $this->load->view('common/header');
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['trabalho_value'] = $this->admin_model->get_form_trabalho();
            $this->load->view('admin/trabalho', $data);
            $this->load->view('common/footer');
    }

    public function contato(){
            if(!$this->session->userdata('usuario')){
                redirect(base_url('admin'));
            }
            $data['title'] = 'Contato';
            $data['erro'] = '';
            $this->load->view('common/header');
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['contato_value'] = $this->admin_model->get_list_contato();
            $this->load->view('admin/contato', $data);
            $this->load->view('common/footer');
    }

    public function usuario(){
            if(!$this->session->userdata('usuario')){
                redirect(base_url('admin'));
            }
            $data['title'] = 'Usuário';
            $data['erro'] = '';
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['usuario_value'] = $this->admin_model->get_login($this->session->userdata('usuario'));
            $this->load->view('common/header');
            $this->load->view('admin/usuario', $data);
            $this->load->view('common/footer');
    }
        
    public function login() {
        if($this->session->userdata('usuario')){
            redirect(base_url('admin/home'));
        }
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $this->load->library('encrypt');
        
        $data['erro'] = "";
        $data['menu_off'] = "true";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido.');
        $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required|xss_clean');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('common/header',$data);
            $this->load->view('admin/login',$data);
            $this->load->view('common/footer');
        }
        else{
            $valores['usuario'] = $this->input->post('usuario');
            $valores['senha'] = $this->input->post('senha');
            $login = $this->admin_model->get_login($valores['usuario']);
            //$login['senha'] = $this->encrypt->decode($login['senha']);
            $teste = $this->encrypt->decode($login['senha']);
            if($login['usuario'] == $valores['usuario'] && $login['senha'] == $valores['senha']){
                $sessao = array('usuario'=>$login['usuario']);
                $this->session->set_userdata($sessao);
                $data['title'] = $teste;
                redirect(base_url('admin/home'));
            }
            else{
                $data['erro'] = "Usuário ou Senha incorreto.";
                $this->load->view('common/header',$data);
                $this->load->view('admin/login',$data);
                $this->load->view('common/footer');
            }
        }
    }

    public function recuperaSenha(){
        if($this->session->userdata('usuario')){
            redirect(base_url('admin/home'));
        }
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        $data['menu_off'] = "true";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido.');
        $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required|xss_clean');
        $this->form_validation->set_rules('resposta', 'Resposta', 'trim|required|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('common/header', $data);
            $data['usuario_value'] = $this->admin_model->get_login('admin');
            $this->load->view('admin/recuperaSenha', $data);
            $this->load->view('common/footer');
        }
        else{
            $data['usuario_value'] = $this->admin_model->get_login('admin');
            $resp = $this->admin_model->get_login('admin');
            if($this->input->post('resposta')==$resp['resposta']){
                $this->admin_model->reset_login();
                $data['erro'] = "Senha Redefinida";
            }
            else{
                $data['erro'] = "Resposta errada";
            }
            $this->load->view('common/header', $data);
            $this->load->view('admin/recuperaSenha', $data);
            $this->load->view('common/footer');
        }
    }

    public function alterarHome(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_rules('titulo', 'Titulo', 'trim');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Home";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['home_value'] = $this->HomeDAO->buscaHome();
            $this->load->view('common/header');
            $this->load->view('admin/home', $data);
            $this->load->view('common/footer');
        }
        else{
            $valores['usuario'] = $this->input->post('usuario');
            $this->HomeDAO->alterarHome();
            $data['title'] = "Home";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['home_value'] = $this->HomeDAO->buscaHome();
            $data['erro'] = "Home alterada";
            $this->load->view('common/header');
            $this->load->view('admin/home', $data);
            $this->load->view('common/footer');
        }
    }

    public function deletarFormacao(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O %s não foi encontrado.');
        $this->form_validation->set_rules('id', 'ID', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Formação";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['formacao_value'] = $this->admin_model->get_form_formacao();
            $this->load->view('common/header');
            $this->load->view('admin/formacao', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->deletarFormacao();
            $data['title'] = "Formação";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['formacao_value'] = $this->admin_model->get_form_formacao();
            $data['erro'] = "Formação deletada";
            $this->load->view('common/header');
            $this->load->view('admin/formacao', $data);
            $this->load->view('common/footer');
        }
    }

    public function alterarFormacao(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_rules('titulo', 'Titulo', 'trim');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Formação";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['formacao_value'] = $this->admin_model->get_form_formacao();
            $this->load->view('common/header');
            $this->load->view('admin/formacao', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->alterarFormacao();
            $data['title'] = "Formação";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['formacao_value'] = $this->admin_model->get_form_formacao();
            $data['erro'] = "Formação alterada";
            $this->load->view('common/header');
            $this->load->view('admin/formacao', $data);
            $this->load->view('common/footer');
        }
    }

    public function inserirFormacao(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_rules('titulo', 'Titulo', 'trim');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Formação";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['formacao_value'] = $this->admin_model->get_form_formacao();
            $this->load->view('common/header');
            $this->load->view('admin/formacao', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->inserirFormacao();
            $data['title'] = "Formação";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['formacao_value'] = $this->admin_model->get_form_formacao();
            $data['erro'] = "Formação inserida";
            $this->load->view('common/header');
            $this->load->view('admin/formacao', $data);
            $this->load->view('common/footer');
        }
    }

    public function deletarTrabalho(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O %s não foi encontrado.');
        $this->form_validation->set_rules('id', 'ID', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Trabalho";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['trabalho_value'] = $this->admin_model->get_form_trabalho();
            $this->load->view('common/header');
            $this->load->view('admin/trabalho', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->deletarTrabalho();
            $data['title'] = "Formação";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['trabalho_value'] = $this->admin_model->get_form_trabalho();
            $data['erro'] = "Formação deletada";
            $this->load->view('common/header');
            $this->load->view('admin/trabalho', $data);
            $this->load->view('common/footer');
        }
    }

    public function alterarTrabalho(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_rules('titulo', 'Titulo', 'trim');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Trabalho";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['trabalho_value'] = $this->admin_model->get_form_trabalho();
            $this->load->view('common/header');
            $this->load->view('admin/trabalho', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->alterarTrabalho();
            $data['title'] = "Trabalho";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['trabalho_value'] = $this->admin_model->get_form_trabalho();
            $data['erro'] = "Trabalho alterado";
            $this->load->view('common/header');
            $this->load->view('admin/trabalho', $data);
            $this->load->view('common/footer');
        }
    }

    public function inserirTrabalho(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_rules('titulo', 'Titulo', 'trim');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Trabalho";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['trabalho_value'] = $this->admin_model->get_form_trabalho();
            $this->load->view('common/header');
            $this->load->view('admin/trabalho', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->inserirTrabalho();
            $data['title'] = "Trabalho";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['trabalho_value'] = $this->admin_model->get_form_trabalho();
            $data['erro'] = "Trabalho inserido";
            $this->load->view('common/header');
            $this->load->view('admin/trabalho', $data);
            $this->load->view('common/footer');
        }
    }

    public function deletarContato(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O %s não foi encontrado.');
        $this->form_validation->set_rules('id', 'ID', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Contato";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['contato_value'] = $this->admin_model->get_list_contato();
            $this->load->view('common/header');
            $this->load->view('admin/contato', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->deletarContato();
            $data['title'] = "Contato";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['contato_value'] = $this->admin_model->get_list_contato();
            $data['erro'] = "Contato deletado";
            $this->load->view('common/header');
            $this->load->view('admin/contato', $data);
            $this->load->view('common/footer');
        }
    }

    public function alterarSobre(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_rules('nome', 'Nome', 'trim');
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim');
        
        if($this->form_validation->run() === FALSE){
            $data['title'] = "Sobre";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['sobre_value'] = $this->admin_model->get_sobre();
            $this->load->view('common/header');
            $this->load->view('admin/sobre', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->alterarSobre();
            $data['title'] = "Sobre";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['sobre_value'] = $this->admin_model->get_sobre();
            $data['erro'] = "Sobre alterado";
            $this->load->view('common/header');
            $this->load->view('admin/sobre', $data);
            $this->load->view('common/footer');
        }
    }

    public function alterarUsuario(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $data['erro'] = "";
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        $this->form_validation->set_rules('confSenha', 'Confirmar Senha', 'trim|required');
        $this->form_validation->set_rules('pergunta', 'Pergunta Secreta', 'trim|required');
        $this->form_validation->set_rules('resposta', 'Resposta', 'trim|required');
        
        if($this->form_validation->run() === FALSE || $this->input->post('senha')!=$this->input->post('confSenha')){
            if($this->input->post('senha')!=$this->input->post('confSenha')){
                $data['erro'] = "Senha e Confirmar Senha devem ser iguais.";
            }
            else{
                $data['erro'] = "";
            }
            $data['title'] = "Usuário";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['usuario_value'] = $this->admin_model->get_login($this->session->userdata('usuario'));
            $this->load->view('common/header');
            $this->load->view('admin/usuario', $data);
            $this->load->view('common/footer');
        }
        else{
            $this->admin_model->alterarUsuario();
            $data['title'] = "Usuário";
            $data['menu'] = $this->admin_model->get_menu_admin();
            $data['usuario_value'] = $this->admin_model->get_login($this->session->userdata('usuario'));
            $data['erro'] = "Usuário alterado";
            $this->load->view('common/header');
            $this->load->view('admin/usuario', $data);
            $this->load->view('common/footer');
        }
    }

    public function deslogar(){
        $this->session->sess_destroy();
        redirect(base_url('admin'));
    }       
        
}