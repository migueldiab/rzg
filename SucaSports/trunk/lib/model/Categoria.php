<?php

/**
 * Subclass for representing a row from the 'categoria' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Categoria extends BaseCategoria
{
    public function __toString() {
      return $this->getNombre();
    }
}
