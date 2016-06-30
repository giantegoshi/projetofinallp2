<?php

/**
 * Description of UsuarioDAO
 *
 * @author Tegoshi Seiji
 */

class UsuarioDAO extends CI_Model {
    function UsuarioDAO() {
        parent::__construct();
        $this->load->database();
    }
    
    function buscaUsuario($usuario){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario', $usuario);
        $query = $this->db->get()->row_array();
        return $query;
    }

    function alteraUsuario($id, $senha, $pergunta, $resposta){
        $this->load->helper('array');
        $usuario = array(
            'id' => $id,
            'senha' => $senha,
            'pergunta' => $pergunta,
            'resposta' => $resposta
            );
        $this->db->where('id', $id);
        $this->db->update('usuario', $usuario);
    }

    function reset_login($usuario){
        $data = array(
           'senha' => 'projetofinallp2',
        );
        $this->db->where('usuario', $usuario);
        $this->db->update('usuario', $data); 
    }

}
