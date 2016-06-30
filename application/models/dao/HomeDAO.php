<?php

/**
 * Description of HomeDAO
 *
 * @author Tegoshi Seiji
 */

class HomeDAO extends CI_Model {
    function HomeDAO() {
        parent::__construct();
        $this->load->database();
    }

    function buscaHome(){
        $this->db->select('*');
        $this->db->from('home');
        $query = $this->db->get();
        return $query->row_array();
    }

    function alterarHome(){
        $this->load->helper('array');
        $titulo           = $this->input->post('titulo');
        $descricao        = $this->input->post('descricao');
        $home = array(
            'titulo' => $titulo,
            'descricao' => $descricao
            );
        return $this->db->update('home', $home);
    }

}
