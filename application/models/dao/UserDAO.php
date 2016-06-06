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

class UserDAO extends CI_Model {
    function UserDAO() {
        parent::__construct();
        $this->load->database();
    }

    function buscaUser($id){
        $this->db->where('id',$id);
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->row_array();
    }

    function cadastraUser(){
        $this->load->helper('array');
        $nome           = $this->input->post('usr_fname');
        $sobrenome      = $this->input->post('usr_lname');
        $email          = $this->input->post('usr_email');
        $user = array(
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'email' => $email
            );
        return $this->db->insert('user', $user);
    }

}
