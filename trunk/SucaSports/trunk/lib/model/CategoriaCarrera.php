<?php

/**
 * Subclass for representing a row from the 'categoria_carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CategoriaCarrera extends BaseCategoriaCarrera
{
    public function __toString() {
      return $this->getNombre();
    }
}
