<?php

/**
 * Subclass for representing a row from the 'forma_pago' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FormaPago extends BaseFormaPago
{
    public function __toString() {
      return $this->getNombre();
    }
}
