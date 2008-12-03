<?php

/**
 * Subclass for representing a row from the 'usuario' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Usuario extends BaseUsuario
{
    public function __toString() {
        return $this->getDocumento();
    }
    
	public function setPasswordEncryptar($password)
	{
	  $this->setPassword(sha1($password));
	}
	    
}
