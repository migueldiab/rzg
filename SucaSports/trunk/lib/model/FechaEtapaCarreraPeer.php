<?php

/**
 * Subclass for performing query and update operations on the 'fecha_etapa_carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FechaEtapaCarreraPeer extends BaseFechaEtapaCarreraPeer
{
     public static function retrieveByCarrera($id_carrera, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);

		$criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $id_carrera);


		$v = FechaEtapaCarreraPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

    public static function retrieveByCarreraEtapa($id_carrera, $id_etapa, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);
        $criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $id_carrera);
		$criteria->add(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, $id_etapa);


		$v = FechaEtapaCarreraPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}
}
