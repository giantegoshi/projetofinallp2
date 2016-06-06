<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDAO
 *
 * @author Tegoshi Seiji
 */

class VeiculoDAO extends CI_Model {
    function VeiculoDAO() {
        parent::__construct();
        $this->load->database();
    }

    function buscaVeiculo($placa){
    	$this->db->where('placa',$placa);
    	$this->db->select('*');
    	$this->db->from('veiculo');
    	$query = $this->db->get();
        return $query->row_array();
    }

}