<?php
	class Admin_model extends CI_Model{
		public function __construct(){
			$this->load->database();
        	$this->load->model('dao/FormacaoDAO');
        	$this->load->model('dao/TrabalhoDAO');
        	$this->load->model('dao/ContatoDAO');
        	$this->load->model('dao/SobreDAO');
        	$this->load->model('dao/HomeDAO');
        	$this->load->model('dao/UsuarioDAO');
		}

		public function get_home(){
			return $this->HomeDAO->buscaHome();
		}
		
		public function get_login($usuario){
			return $this->UsuarioDAO->buscaUsuario($usuario);
		}

		public function reset_login(){
			$usuario = $this->input->post('usuario');
			$this->UsuarioDAO->reset_login($usuario);
		}

		public function get_form_formacao(){
        	$this->load->model('dao/FormacaoDAO');
        	$query = $this->FormacaoDAO->buscaFormacao();
        	$html = "";
        	$html = $html.
			'<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">';
						$attributes = array('class'=>'block-center');
						$html = $html.form_open(base_url('admin/inserirFormacao'),$attributes);
						$html = $html.'<div class="form-group">';
								$attributes = array(
									'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
								);
								$html = $html.form_label('Titulo: ', 'titulo',$attributes);
								
								$attributes = array(
									'name' => 'titulo',
									'class' => 'form-control',
									'maxLength' => '80',
									'autofocus'   => 'autofocus',
									'rows' => '5',
								);
								$html = $html.form_textarea($attributes);
						$html = $html.'</div>
						<div class="form-group">';
								$attributes = array(
									'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
								);
								$html = $html.form_label('Descrição: ', 'descricao',$attributes);
								
								$attributes = array(
									'name' => 'descricao',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'rows' => '5',
								);
								$html = $html.form_textarea($attributes);
						$html = $html.'</div>
						<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit" name = "submit">Inserir</button>';
						$html = $html.form_close();
				$html = $html.'</div>';
        	foreach ($query as $value) {
				$html = $html.
			'<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">';
						$attributes = array('class'=>'block-center');
						$html = $html.form_open(base_url('admin/alterarFormacao'),$attributes);
						$html = $html.'<div class="form-group">';
								$attributes = array(
									'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
								);
								$html = $html.form_label('Titulo: ', 'titulo',$attributes);
								
								$attributes = array(
									'name' => 'titulo',
									'class' => 'form-control',
									'maxLength' => '80',
									'autofocus'   => 'autofocus',
									'rows' => '5',
									'value' => $value['titulo']
								);
								$html = $html.form_textarea($attributes);
						$html = $html.'</div>
						<div class="form-group">';
								$attributes = array(
									'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
								);
								$html = $html.form_label('Descrição: ', 'descricao',$attributes);
								
								$attributes = array(
									'name' => 'descricao',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'rows' => '5',
									'value' => $value['descricao']
								);
								$html = $html.form_textarea($attributes);
						$html = $html.'</div>';
						$html = $html.'<input type="text" id="id" name="id" class="hidden" value="'.$value["id"].'">';
						$html = $html.'<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit" name = "submit">Aterar</button><br><br>';
						$html = $html.form_close();
				$attributes = array('class'=>'block-center');
				$html = $html.form_open(base_url('admin/deletarFormacao'),$attributes);
				$html = $html.'<input type="text" id="id" name="id" class="hidden" value="'.$value["id"].'">';
				$html = $html.'<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit" name = "submit">Deletar</button>';
				$html = $html.form_close();
				$html = $html.'</div>';
			}
			return $html;
		}

		public function get_menu_admin(){
			$this->db->select('id, descricao');
			$this->db->from('menuadmin');
			$query=$this->db->get()->result_array();
			$html = '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      					<ul class="nav navbar-nav">
      					<li><a href='.base_url("admin/home").'><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home </a></li>';
			foreach ($query as $value) {
				$html = $html.
			'<li><a href="'.base_url("admin/".$value["descricao"]."").'"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span> '.$value["descricao"].' </a></li>';
			}
			$html = $html.'</ul>
						<ul class="nav navbar-nav nav-tabs navbar-right">
							<p class="navbar-text">'.ucfirst($this->session->userdata("usuario")).'</p>
							<li><a href="'.base_url("admin/deslogar").'">Sair</a></li>
						</ul>
					    </div>
					  </div>
					</nav>';
			return $html;
		}

		function deletarFormacao(){
	        $this->load->helper('array');
	        $id = $this->input->post('id');
	       	$this->FormacaoDAO->deletaFormacao($id);
    	}

    	function alterarFormacao(){
	        $this->load->helper('array');
	        $id = $this->input->post('id');
	        $titulo = $this->input->post('titulo');
	        $descricao = $this->input->post('descricao');
	       	$this->FormacaoDAO->alteraFormacao($id, $titulo, $descricao);
    	}

    	function inserirFormacao(){
	        $this->load->helper('array');
	        $titulo = $this->input->post('titulo');
	        $descricao = $this->input->post('descricao');
	       	$this->FormacaoDAO->insereFormacao($titulo, $descricao);
    	}

    	public function get_form_trabalho(){
        	$this->load->model('dao/TrabalhoDAO');
        	$query = $this->TrabalhoDAO->buscaTrabalho();
        	$html = "";
        	$html = $html.
			'<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">';
						$attributes = array('class'=>'block-center');
						$html = $html.form_open(base_url('admin/inserirTrabalho'),$attributes);
						$html = $html.'<div class="form-group">';
								$attributes = array(
									'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
								);
								$html = $html.form_label('Titulo: ', 'titulo',$attributes);
								
								$attributes = array(
									'name' => 'titulo',
									'class' => 'form-control',
									'maxLength' => '80',
									'autofocus'   => 'autofocus',
									'rows' => '5',
								);
								$html = $html.form_textarea($attributes);
						$html = $html.'</div>
						<div class="form-group">';
								$attributes = array(
									'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
								);
								$html = $html.form_label('Descrição: ', 'descricao',$attributes);
								
								$attributes = array(
									'name' => 'descricao',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'rows' => '5',
								);
								$html = $html.form_textarea($attributes);
						$html = $html.'</div>
						<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit" name = "submit">Inserir</button>';
						$html = $html.form_close();
				$html = $html.'</div>';
        	foreach ($query as $value) {
				$html = $html.
			'<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">';
						$attributes = array('class'=>'block-center');
						$html = $html.form_open(base_url('admin/alterarTrabalho'),$attributes);
						$html = $html.'<div class="form-group">';
								$attributes = array(
									'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
								);
								$html = $html.form_label('Titulo: ', 'titulo',$attributes);
								
								$attributes = array(
									'name' => 'titulo',
									'class' => 'form-control',
									'maxLength' => '80',
									'autofocus'   => 'autofocus',
									'rows' => '5',
									'value' => $value['titulo']
								);
								$html = $html.form_textarea($attributes);
						$html = $html.'</div>
						<div class="form-group">';
								$attributes = array(
									'class' => 'control-label col-sm-4 col-sm-offset-4 text-center',
								);
								$html = $html.form_label('Descrição: ', 'descricao',$attributes);
								
								$attributes = array(
									'name' => 'descricao',
									'class' => 'form-control',
									'autofocus'   => 'autofocus',
									'rows' => '5',
									'value' => $value['descricao']
								);
								$html = $html.form_textarea($attributes);
						$html = $html.'</div>';
						$html = $html.'<input type="text" id="id" name="id" class="hidden" value="'.$value["id"].'">';
						$html = $html.'<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit" name = "submit">Aterar</button><br><br>';
						$html = $html.form_close();
				$attributes = array('class'=>'block-center');
				$html = $html.form_open(base_url('admin/deletarTrabalho'),$attributes);
				$html = $html.'<input type="text" id="id" name="id" class="hidden" value="'.$value["id"].'">';
				$html = $html.'<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit" name = "submit">Deletar</button>';
				$html = $html.form_close();
				$html = $html.'</div>';
			}
			return $html;
		}

		function deletarTrabalho(){
	        $this->load->helper('array');
	        $id = $this->input->post('id');
	       	$this->TrabalhoDAO->deletaTrabalho($id);
    	}

    	function alterarTrabalho(){
	        $this->load->helper('array');
	        $id = $this->input->post('id');
	        $titulo = $this->input->post('titulo');
	        $descricao = $this->input->post('descricao');
	       	$this->TrabalhoDAO->alteraTrabalho($id, $titulo, $descricao);
    	}

    	function inserirTrabalho(){
	        $this->load->helper('array');
	        $titulo = $this->input->post('titulo');
	        $descricao = $this->input->post('descricao');
	       	$this->TrabalhoDAO->insereTrabalho($titulo, $descricao);
    	}

    	public function get_list_contato(){
        	$query = $this->ContatoDAO->buscaContato();
        	$html = "";
        	foreach ($query as $value) {
				$html = $html.'<div class="col-xs-12 col-md-6 col-md-offset-3 text-center" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">';
				$attributes = array('class'=>'block-center');
				$html = $html.form_open(base_url('admin/deletarContato'),$attributes);
				$descricao = str_replace("\r\n",'</p><p class="col-md-12">',str_replace("  ", " &nbsp;", $value['descricao']));
				$descricao = '<p class="col-md-12">'.$descricao.'</p>';
				$html = $html.'
						<div class="form-group">
							<label class="control-label col-md-12"><h3>'.$value["email"].'</h3></label>
							'.$descricao.'
						</div>
						';
				$html = $html.'<input type="text" id="id" name="id" class="hidden" value="'.$value["id"].'">';
				$html = $html.'<button class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit" name = "submit">Deletar</button><br><br>';
				$html = $html.form_close();
				$html = $html.'</div>';
			}
			return $html;
		}

		function deletarContato(){
	        $this->load->helper('array');
	        $id = $this->input->post('id');
	       	$this->ContatoDAO->deletaContato($id);
    	}

    	function get_sobre(){
	        $this->load->helper('array');
	       	return $this->SobreDAO->buscaSobre();
    	}

    	function alterarSobre(){
	        $this->load->helper('array');
	        $nome = $this->input->post('nome');
	        $descricao = $this->input->post('descricao');
	       	return $this->SobreDAO->alteraSobre($nome, $descricao);
    	}

    	function alterarUsuario(){
	        $this->load->helper('array');
	        $id = $this->input->post('id');
	        $senha = $this->input->post('senha');
	        $pergunta = $this->input->post('pergunta');
	        $resposta = $this->input->post('resposta');
	       	return $this->UsuarioDAO->alteraUsuario($id, $senha, $pergunta, $resposta);
    	}
	}
?>