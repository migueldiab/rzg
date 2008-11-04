<?php

/**
 * Subclass for performing query and update operations on the 'etapa_carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class EtapaCarreraPeer extends BaseEtapaCarreraPeer
{

    	public static function retrieveByIdCarrera( $id_carrera, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(EtapaCarreraPeer::ID_CARRERA, $id_carrera);
		$v = EtapaCarreraPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
}
