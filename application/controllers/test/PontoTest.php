<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . '/controllers/test/MyToast.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PontoTest
 *
 * @author Luiz Felipe
 */
class PontoTest extends MyToast {
    function PontoTest() {
        parent::__construct('Ponto Test');
        $this->load->library('ponto', null, 'p1'); // load é a mesma coisa que dar include e o new Ponto.
                            //ponto é a classe, null = array de argumentos e 
    }
    
    //queremos atribuir valores paras as coordenadas de um ponto.
    function test_ponto_atribui_valores_das_coordenadas_corretamente() {
        $this->p1->set_x(3);
        $k = $this->p1->get_x();
        $this->_assert_equals($k,3,"O valor esperado era 3");
        $this->p1->set_y(6);
        $k = $this->p1->get_y();
        $k = $this->_assert_equals($k, 6, "O valor esperadp era 6");
    }
    
    //queremos atribuir valores das coordenadas pelo construtor
    // idependencia entre os testes.
    function test_construtor_atribui_valores_das_cordenadas_corretamente() {
        $args = array('x' => 8,'y' => 6);
        $this->load->library('ponto', $args, 'p2'); //teste idependentes por isso p2
        
        $k = $this->p2->get_x();
        $this->_assert_equals($k, 8, "O valor esperado era 8, porem o valor retornado $k");
        
        $k = $this->p2->get_y();
        $this->_assert_equals($k, 6, "O valor esperado era 6, porem o valor retornado $k");
    }
    
    //crie um teste para uma função que faça com que as duas coordendas de um ponto
    // tenham sempre o mesmo valor.. use o valor da maior coordenada.Por exemplo: se
    // as coordenadas forem(2,5), o ponto deve passar a ter coordenadas(5,5)
    
    function test_ponto_normaliza_coordenadas_corretamente() {
        $args = array('x' => 4, 'y' => 5);
        $this->load->library('ponto', $args,'p3');

        $this->p3->normaliza();
        $k = $this->p3->get_y();
        $l = $this->p3->get_x();
        //$this->_assert_equals($k, $l, "Os valores não foram normalizados");
        $this->_assert_equals($l, 5, "O valor esperado para x era 5, mas x vale $l ");
        $this->_assert_equals($k, 5, "O valor esperado para y era 5, mas x vale $k ");
        
        
        
        
        $args = array('x' => 5, 'y' => 2);
        $this->load->library('ponto', $args,'p3');

        $this->p3->normaliza();
        $k = $this->p3->get_y();
        $l = $this->p3->get_x();
        //$this->_assert_equals($k, $l, "Os valores não foram normalizados");
        $this->_assert_equals($l, 5, "O valor esperado para x era 5, mas x vale $l ");
        $this->_assert_equals($k, 5, "O valor esperado para y era 5, mas x vale $k ");

        // pensar em todos os cenarios possiveis
        
    }
    
    
}
