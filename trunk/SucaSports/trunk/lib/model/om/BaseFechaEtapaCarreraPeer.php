<?php


abstract class BaseFechaEtapaCarreraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fecha_etapa_carrera';

	
	const CLASS_DEFAULT = 'lib.model.FechaEtapaCarrera';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const FECHA_INICIO = 'fecha_etapa_carrera.FECHA_INICIO';

	
	const ID_ETAPA = 'fecha_etapa_carrera.ID_ETAPA';

	
	const ID_CARRERA = 'fecha_etapa_carrera.ID_CARRERA';

	
	const MAX_CORREDORES = 'fecha_etapa_carrera.MAX_CORREDORES';

	
	const FECHA_FIN = 'fecha_etapa_carrera.FECHA_FIN';

	
	const COSTO = 'fecha_etapa_carrera.COSTO';

	
	const CREATED_AT = 'fecha_etapa_carrera.CREATED_AT';

	
	const CREATED_BY = 'fecha_etapa_carrera.CREATED_BY';

	
	const UPDATED_AT = 'fecha_etapa_carrera.UPDATED_AT';

	
	const UPDATED_BY = 'fecha_etapa_carrera.UPDATED_BY';

	
	const ESTADO = 'fecha_etapa_carrera.ESTADO';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('FechaInicio', 'IdEtapa', 'IdCarrera', 'MaxCorredores', 'FechaFin', 'Costo', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'Estado', ),
		BasePeer::TYPE_COLNAME => array (FechaEtapaCarreraPeer::FECHA_INICIO, FechaEtapaCarreraPeer::ID_ETAPA, FechaEtapaCarreraPeer::ID_CARRERA, FechaEtapaCarreraPeer::MAX_CORREDORES, FechaEtapaCarreraPeer::FECHA_FIN, FechaEtapaCarreraPeer::COSTO, FechaEtapaCarreraPeer::CREATED_AT, FechaEtapaCarreraPeer::CREATED_BY, FechaEtapaCarreraPeer::UPDATED_AT, FechaEtapaCarreraPeer::UPDATED_BY, FechaEtapaCarreraPeer::ESTADO, ),
		BasePeer::TYPE_FIELDNAME => array ('fecha_inicio', 'id_etapa', 'id_carrera', 'max_corredores', 'fecha_fin', 'costo', 'created_at', 'created_by', 'updated_at', 'updated_by', 'estado', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FechaInicio' => 0, 'IdEtapa' => 1, 'IdCarrera' => 2, 'MaxCorredores' => 3, 'FechaFin' => 4, 'Costo' => 5, 'CreatedAt' => 6, 'CreatedBy' => 7, 'UpdatedAt' => 8, 'UpdatedBy' => 9, 'Estado' => 10, ),
		BasePeer::TYPE_COLNAME => array (FechaEtapaCarreraPeer::FECHA_INICIO => 0, FechaEtapaCarreraPeer::ID_ETAPA => 1, FechaEtapaCarreraPeer::ID_CARRERA => 2, FechaEtapaCarreraPeer::MAX_CORREDORES => 3, FechaEtapaCarreraPeer::FECHA_FIN => 4, FechaEtapaCarreraPeer::COSTO => 5, FechaEtapaCarreraPeer::CREATED_AT => 6, FechaEtapaCarreraPeer::CREATED_BY => 7, FechaEtapaCarreraPeer::UPDATED_AT => 8, FechaEtapaCarreraPeer::UPDATED_BY => 9, FechaEtapaCarreraPeer::ESTADO => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('fecha_inicio' => 0, 'id_etapa' => 1, 'id_carrera' => 2, 'max_corredores' => 3, 'fecha_fin' => 4, 'costo' => 5, 'created_at' => 6, 'created_by' => 7, 'updated_at' => 8, 'updated_by' => 9, 'estado' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.FechaEtapaCarreraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FechaEtapaCarreraPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(FechaEtapaCarreraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::FECHA_INICIO);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::ID_ETAPA);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::ID_CARRERA);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::MAX_CORREDORES);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::FECHA_FIN);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::COSTO);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::CREATED_AT);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::CREATED_BY);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::UPDATED_AT);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::UPDATED_BY);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::ESTADO);

	}

	const COUNT = 'COUNT(fecha_etapa_carrera.FECHA_INICIO)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fecha_etapa_carrera.FECHA_INICIO)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FechaEtapaCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FechaEtapaCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FechaEtapaCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = FechaEtapaCarreraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FechaEtapaCarreraPeer::populateObjects(FechaEtapaCarreraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FechaEtapaCarreraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FechaEtapaCarreraPeer::getOMClass();
		$cls = sfPropel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

  static public function getUniqueColumnNames()
  {
    return array();
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return FechaEtapaCarreraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(FechaEtapaCarreraPeer::FECHA_INICIO);
			$selectCriteria->add(FechaEtapaCarreraPeer::FECHA_INICIO, $criteria->remove(FechaEtapaCarreraPeer::FECHA_INICIO), $comparison);

			$comparison = $criteria->getComparison(FechaEtapaCarreraPeer::ID_ETAPA);
			$selectCriteria->add(FechaEtapaCarreraPeer::ID_ETAPA, $criteria->remove(FechaEtapaCarreraPeer::ID_ETAPA), $comparison);

			$comparison = $criteria->getComparison(FechaEtapaCarreraPeer::ID_CARRERA);
			$selectCriteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $criteria->remove(FechaEtapaCarreraPeer::ID_CARRERA), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(FechaEtapaCarreraPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(FechaEtapaCarreraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof FechaEtapaCarrera) {

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
				$vals[2][] = $value[2];
			}

			$criteria->add(FechaEtapaCarreraPeer::FECHA_INICIO, $vals[0], Criteria::IN);
			$criteria->add(FechaEtapaCarreraPeer::ID_ETAPA, $vals[1], Criteria::IN);
			$criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $vals[2], Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(FechaEtapaCarrera $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FechaEtapaCarreraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FechaEtapaCarreraPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(FechaEtapaCarreraPeer::DATABASE_NAME, FechaEtapaCarreraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FechaEtapaCarreraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $fecha_inicio, $id_etapa, $id_carrera, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(FechaEtapaCarreraPeer::FECHA_INICIO, $fecha_inicio);
		$criteria->add(FechaEtapaCarreraPeer::ID_ETAPA, $id_etapa);
		$criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $id_carrera);
		$v = FechaEtapaCarreraPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseFechaEtapaCarreraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.FechaEtapaCarreraMapBuilder');
}
