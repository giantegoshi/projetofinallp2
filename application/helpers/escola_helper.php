<?php

    function verifica_aprovacao($nota) {
        if(!is_numeric($nota))
            return null;
        
        if($nota < 0 || $nota > 10) 
            return null;
        
        if($nota < 6)
            return false;
        else return true;
    }
