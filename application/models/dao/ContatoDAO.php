<?php

/**
 * Description of ContatoDAO
 *
 * @author Tegoshi Seiji
 */

class ContatoDAO extends CI_Model {
    function ContatoDAO() {
        parent::__construct();
        $this->load->database();
    }

    function buscaContato(){
        $this->db->select('id, email, descricao');
        $this->db->from('contato');
        $query=$this->db->get()->result_array();
        return $query;
    }

    function deletaContato($id){
        $this->db->where('id',$id);
        $this->db->delete('contato');
    }

    function insereContato($email, $descricao){
        $this->load->helper('array');
        $contato = array(
            'email' => $email,
            'descricao' => $descricao
            );
        $this->db->insert('contato', $contato);
    }

}
