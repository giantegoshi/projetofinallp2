<?php
	class Principal_model extends CI_Model{
		public function __construct(){
			$this->load->database();
	        $this->load->model('dao/FormacaoDAO');
	        $this->load->model('dao/TrabalhoDAO');
	        $this->load->model('dao/ContatoDAO');
	        $this->load->model('dao/SobreDAO');
	        $this->load->model('dao/HomeDAO');
		}

		public function get_menu_principal(){
			$this->db->select('id, descricao');
			$this->db->from('menu');
			$query = $this->db->get()->result_array();
			$html = '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      					<ul class="nav navbar-nav">
			<li><a href='.base_url().'><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home </a></li>';
			foreach ($query as $value) {
				$html = $html.'<li><a href='.base_url($value["descricao"]).'><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span> '.$value["descricao"].' </a></li>';
			}
			$html = $html.'</ul>
					    </div>
					  </div>
					</nav>';
			return $html;
		}

		public function get_formacao(){
			$query = $this->FormacaoDAO->buscaFormacao();
			$html = '<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">
					<form>';
			foreach ($query as $value) {
				$descricao = str_replace("\r\n",'</p><p class="col-md-12">',str_replace("  ", " &nbsp;", $value['descricao']));
				$descricao = '<p class="col-md-12">'.$descricao.'</p>';
				$html = $html.'
						<div class="form-group">
							<label class="control-label col-md-12"><h3>'.$value["titulo"].'</h3></label>
							'.$descricao.'
						</div>
						';
			}
			$html = $html.'</form>
				</div>';
			return $html;
		}

		public function get_trabalho(){
			$query = $this->TrabalhoDAO->buscaTrabalho();
			$html = '<div class="col-xs-12 col-md-6 col-md-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">
					<form>';
			foreach ($query as $value) {
				$descricao = str_replace("\r\n",'</p><p class="col-md-12">',str_replace("  ", " &nbsp;", $value['descricao']));
				$descricao = '<p class="col-md-12">'.$descricao.'</p>';
				$html = $html.'
						<div class="form-group">
							<label class="control-label col-md-12"><h3>'.$value["titulo"].'</h3></label>
							'.$descricao.'
						</div>
						';
			}
			$html = $html.'</form>
				</div>';
			return $html;
		}

		function inserirContato(){
	        $this->load->helper('array');
	        $email = $this->input->post('email');
	        $descricao = $this->input->post('descricao');
	       	$this->ContatoDAO->insereContato($email, $descricao);
    	}

    	public function get_sobre(){
			$value = $this->SobreDAO->buscaSobre();
			$html = '<div class="col-xs-12 col-sm-6 col-sm-offset-3" style="border:1px solid black; border-radius:50px;padding:20px; margin-bottom:20px;">
					<form>
						<div class="form-group">
							<img class="col-sm-6 col-sm-offset-3 img-responsive" src="'.base_url("assets/img/".$value["image"]).'" alt="..." class="img-rounded">
						</div>';
				$descricao = str_replace("\r\n",'</label><label class="col-sm-12" style="font-weight:100">',str_replace("  ", " &nbsp;", $value['descricao']));
				$descricao = '<label class="col-sm-12" style="font-weight:100">'.$descricao.'</label>';
				$html = $html.'
						<div class="form-group">
							<label class="control-label col-sm-12"><h1>'.$value["nome"].'</h1></label>
							'.$descricao.'
						</div>
						';
			$html = $html.'</form>
				</div>';
			return $html;
		}

		public function get_home(){
			return $this->HomeDAO->buscaHome();
		}

		public function get_pdf(){
			$value_sobre = $this->SobreDAO->buscaSobre();
			$html = '<div class="col-xs-12 col-sm-6 col-sm-offset-3">
					<form>';
				$descricao = str_replace("\r\n",'</label></p><p><label class="col-sm-12" style="font-weight:100">',str_replace("  ", " &nbsp;", $value_sobre['descricao']));
				$descricao = '<p><label class="col-sm-12" style="font-weight:100">'.$descricao.'</label></p>';
				$html = $html.'
						<div class="form-group">
							<label class="control-label col-sm-12"><h1>'.$value_sobre["nome"].'</h1></label>
							'.$descricao.'
						</div>
						';
			$html = $html.'</form>';
			$query = $this->FormacaoDAO->buscaFormacao();
			$html = $html.'<form>';
			foreach ($query as $value) {
				$descricao = str_replace("\r\n",'</p><p class="col-md-12">',str_replace("  ", " &nbsp;", $value['descricao']));
				$descricao = '<p class="col-md-12">'.$descricao.'</p>';
				$html = $html.'
						<div class="form-group">
							<label class="control-label col-md-12"><h3>'.$value["titulo"].'</h3></label>
							'.$descricao.'
						</div>
						';
			}
			$html = $html.'</form>';
			$query = $this->TrabalhoDAO->buscaTrabalho();
			$html = $html.'<form>';
			foreach ($query as $value) {
				$descricao = str_replace("\r\n",'</p><p class="col-md-12">',str_replace("  ", " &nbsp;", $value['descricao']));
				$descricao = '<p class="col-md-12">'.$descricao.'</p>';
				$html = $html.'
						<div class="form-group">
							<label class="control-label col-md-12"><h3>'.$value["titulo"].'</h3></label>
							'.$descricao.'
						</div>
						';
			}
			$html = $html.'</form>
				</div>';
			return $html;
		}
	}
?>