<?php

/**
 * Subclass for performing query and update operations on the 'categoria_carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CategoriaCarreraPeer extends BaseCategoriaCarreraPeer
{
    public static function CleanCategoriaCarrera($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(CategoriaCarreraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CategoriaCarrera) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
			}

			//$criteria->add(CategoriaCarreraPeer::ID_CATEGORIA, $vals[0], Criteria::IN);
			$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $vals[1], Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0;
		try {
									$con->beginTransaction();

			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

}
