<?php

/**
 * Subclass for performing query and update operations on the 'usuario' table.
 *
 * 
 *
 * @package lib.model
 */ 
class UsuarioPeer extends BaseUsuarioPeer
{

  public static function retrieveByEmail($email, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		$criteria->add(UsuarioPeer::EMAIL, $email);


      $v = UsuarioPeer::doSelectOne($criteria);

		return !empty($v) > 0 ? $v : null;
	}





}
