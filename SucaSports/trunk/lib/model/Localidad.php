<?php

/**
 * Subclass for representing a row from the 'localidad' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Localidad extends BaseLocalidad
{
    public function __toString() {
        return $this->getNombre();
    }
}
