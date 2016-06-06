<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . '/controllers/test/MyToast.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HelperTest
 *
 * @author Luiz Felipe
 */
class HelperTest extends MyToast {
    function HelperTest(){
        parent::__construct('Helper Test');
        $this->load->helper('escola');
    }
    
    //quermos criar uma função que verifica se um aluno foi aprovado com base na sua nota
    function test_verifica_aprovacao_reprova_corretamente() {
        // definir a precisão de um centesimo 0,01
        $k = verifica_aprovacao(5.99);
        $this->_assert_false_strict($k,"Com a nota 5.99 o aluno deveria estar reprovado");
        // em php false = nulo = 0 = "", esse strict é para  testar se é false mesmo.
        $k = verifica_aprovacao(0);
        $this->_assert_false_strict($k,"Com a nota 0 o aluno deveria estar reprovado");
        
        
        
    }
    
    function test_verifica_aprovacao_aprova_corretamente() {
        $k = verifica_aprovacao(6);
        $this->_assert_true_strict($k,"Com a nota 6 o aluno deveria estar aprovado");
        
        $k = verifica_aprovacao(10);
        $this->_assert_true_strict($k,"Com a nota 10 o aluno deveria estar aprovado");
    }
    
    function test_verifica_aprovacao_rejeita_valores_numericos_invalidos_corretamente() {
        $k = verifica_aprovacao(-0.01);
        $this->_assert_equals($k,null,"Nao existe nota menor que 0");
        
        $k = verifica_aprovacao(10.01);
        $this->_assert_equals($k,null,"Não existe nota maior que 10");
    }
    
    function test_verifica_aprovacao_rejeita_valores_nao_numericos_corretamente() {
        //por que a primeira vez que você roda o teste esta passando.
        // false -> 0, numero != 0 -> true, ou seja qualquer coisa que eu passar  
        
        $k = verifica_aprovacao(array(5));
        $this->_assert_equals($k,null,"Nao existe nota menor que 0");
        
        $k = verifica_aprovacao('string');
        $this->_assert_equals($k,null,"Não existe nota maior que 10");
    }
    
    
}
