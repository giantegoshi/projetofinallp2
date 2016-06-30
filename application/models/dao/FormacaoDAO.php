<?php

/**
 * Description of FormacaoDAO
 *
 * @author Tegoshi Seiji
 */

class FormacaoDAO extends CI_Model {
    function FormacaoDAO() {
        parent::__construct();
        $this->load->database();
    }

    function buscaFormacao(){
        $this->db->select('id, titulo, descricao');
        $this->db->from('formacao');
        $query=$this->db->get()->result_array();
        return $query;
    }

    function deletaFormacao($id){
        $this->db->where('id',$id);
        $this->db->delete('formacao');
    }

    function alteraFormacao($id, $titulo, $descricao){
        $this->load->helper('array');
        $formacao = array(
            'titulo' => $titulo,
            'descricao' => $descricao
            );
        $this->db->where('id', $id);
        $this->db->update('formacao', $formacao);
    }

    function insereFormacao($titulo, $descricao){
        $this->load->helper('array');
        $formacao = array(
            'titulo' => $titulo,
            'descricao' => $descricao
            );
        $this->db->insert('formacao', $formacao);
    }

}
