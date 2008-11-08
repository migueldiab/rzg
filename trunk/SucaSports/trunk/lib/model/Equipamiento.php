<?php

/**
 * Subclass for representing a row from the 'equipamiento' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Equipamiento extends BaseEquipamiento
{
     public function __toString() {
         return $this->getIdTipoEquipamiento();
    }
}
