<?php

/**
 * Subclass for performing query and update operations on the 'configuracion' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ConfiguracionPeer extends BaseConfiguracionPeer
{
	public static function getParametro($parametro) {
		$crit = new Criteria();
    $crit->add(ConfiguracionPeer::PARAMETRO, $parametro);
    $registro = ConfiguracionPeer::doSelectOne($crit);
    return $registro->getValor();
	}
}
