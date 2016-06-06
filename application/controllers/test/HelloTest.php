<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . '/controllers/test/MyToast.php');

class HelloTest extends MyToast{
	
	function HelloTest() {
		parent::__construct('HelloTest');
	}
	
	// A mensagem abaixo n�o � exibida, pois o teste n�o d� erro
	function test_that_succeed() {
		$this->_assert_equals(1, 1, 'Uhuu! O tem funciona!');
	}
	
	// note que a mensagem deve ser escrita para orientar o testador
	// sobre o que est� dando errado no teste 
	function test_that_fail() {
		$this->_assert_equals(1, 2, 'Oooops... 1 is not equals 2!');
	}
        
        function test_paridade() {
            $k = 5 % 2;
            $this->asserts_equals($k,0,"5 nao e par");
            
            $k = 8 % 2;
            $this->asserts_equals($k,0,"8 e par");
        }
	
}