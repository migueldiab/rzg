<?php

/**
 * Subclass for representing a row from the 'equipamiento_carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class EquipamientoCarrera extends BaseEquipamientoCarrera
{
       public function __toString() {
           return $this->getIdTipoEquipamiento();
    }
}
