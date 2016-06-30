<?php

/**
 * Description of SobreDAO
 *
 * @author Tegoshi Seiji
 */

class SobreDAO extends CI_Model {
    function SobreDAO() {
        parent::__construct();
        $this->load->database();
    }

    function buscaSobre(){
        $this->db->select('id, nome, descricao, image');
        $this->db->from('sobre');
        $query = $this->db->get();
        return $query->row_array();
    }

    function alteraSobre($nome, $descricao){
        $this->load->helper('array');
        $sobre = array(
            'nome' => $nome,
            'descricao' => $descricao
            );
        $this->db->update('sobre', $sobre);
    }

}
