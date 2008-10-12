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
        return $this->getNombre();
    }
}
