<?php

/**
 * Subclass for representing a row from the 'tipo_documento' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TipoDocumento extends BaseTipoDocumento
{
    public function __toString() {
        return $this->getNombre();
    }
}
