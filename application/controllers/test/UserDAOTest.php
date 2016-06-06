<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . '/controllers/test/MyToast.php');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDAOTest
 *
 * @author Luiz Felipe
 */

//toast plugin de teste.
class UserDAOTest extends MyToast {
    function UserDAOTest() {
        parent::__construct('UserDAO Test');
    }
    
    function test_if_user_table_was_successfully_created() {
        $this->load->model('dao/UserDAO', 'dao'); // isso equivale a instancia da classe
        //essa 'dao' depois de 'dao/UserDAO' é o meu objeto, minha variavel.
        $this->dao->createTable(); //aqui é criado minha tabela.
        $k = $this->table_exists('user');   //função tem que retorna algum valor.
        $this->_assert_equals($k, 1, "A tabela nao foi criada");
                             //se k = 1 sucesso se não mostra a mensagem
    }
    
    function test_table_has_collumn_list() {
        $k = $this->table_has_column('user', 'id');
        $this->_assert_equals($k,1, "A tabela nao possui a coluna id");
        $k = $this->table_has_column('user', 'nome');
        $this->_assert_equals($k,1, "A tabela nao possui a coluna nome");
        $k = $this->table_has_column('user', 'snome');
        $this->_assert_equals($k,1, "A tabela nao possui a coluna snome");
        $k = $this->table_has_column('user', 'snome');
        $this->_assert_equals($k,1, "A tabela nao possui a coluna email");
    }
    
    function test_table_has_correct_number_of_collumns() {
        $num = $this->table_column_number('user');
        $this->_assert_equals($num,4,"A quantidade de colunas da tabela user "
                . "esta errada");
    }
    
}
