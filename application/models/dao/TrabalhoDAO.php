<?php

/**
 * Description of TrabalahoDAO
 *
 * @author Tegoshi Seiji
 */

class TrabalhoDAO extends CI_Model {
    function TrabalhoDAO() {
        parent::__construct();
        $this->load->database();
    }

    function buscaTrabalho(){
        $this->db->select('id, titulo, descricao');
        $this->db->from('trabalho');
        $query=$this->db->get()->result_array();
        return $query;
    }

    function deletaTrabalho($id){
        $this->db->where('id',$id);
        $this->db->delete('trabalho');
    }

    function alteraTrabalho($id, $titulo, $descricao){
        $this->load->helper('array');
        $trabalho = array(
            'titulo' => $titulo,
            'descricao' => $descricao
            );
        $this->db->where('id', $id);
        $this->db->update('trabalho', $trabalho);
    }

    function insereTrabalho($titulo, $descricao){
        $this->load->helper('array');
        $trabalho = array(
            'titulo' => $titulo,
            'descricao' => $descricao
            );
        $this->db->insert('trabalho', $trabalho);
    }

}
