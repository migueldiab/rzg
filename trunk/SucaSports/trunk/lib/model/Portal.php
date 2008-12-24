<?php

/**
 * Subclass for representing a row from the 'portal' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Portal extends BasePortal
{
    public function __toString() {
      return $this->getNombrepagina();
    }	
}
