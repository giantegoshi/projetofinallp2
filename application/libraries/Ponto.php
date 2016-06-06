<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ponto
 *
 * @author Luiz Felipe
 */
class Ponto {
    
    private $x;
    private $y;
    
    function Ponto(array $args = null) {
        $this->x = $args['x'];
        $this->y = $args['y'];
    }
    
    function set_x($num) {
        $this->x = $num;
    }
    
    function get_x() {
        return $this->x;
    }
    
    function set_y($num) {
        $this->y = $num;
    }
    
    function get_y() {
        return $this->y;
    }
    
    function normaliza() {
        if($this->x > $this->y) {
            $this->y = $this->x;
        }else {
            $this->x = $this->y;
        }
    }
}
