<?php


abstract class BaseEtapaCarreraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'etapa_carrera';

	
	const CLASS_DEFAULT = 'lib.model.EtapaCarrera';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'etapa_carrera.ID';

	
	const ID_CARRERA = 'etapa_carrera.ID_CARRERA';

	
	const NOMBRE = 'etapa_carrera.NOMBRE';

	
	const NUMERO_ETAPA = 'etapa_carrera.NUMERO_ETAPA';

	
	const CREATED_AT = 'etapa_carrera.CREATED_AT';

	
	const CREATED_BY = 'etapa_carrera.CREATED_BY';

	
	const UPDATED_AT = 'etapa_carrera.UPDATED_AT';

	
	const UPDATED_BY = 'etapa_carrera.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdCarrera', 'Nombre', 'NumeroEtapa', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (EtapaCarreraPeer::ID, EtapaCarreraPeer::ID_CARRERA, EtapaCarreraPeer::NOMBRE, EtapaCarreraPeer::NUMERO_ETAPA, EtapaCarreraPeer::CREATED_AT, EtapaCarreraPeer::CREATED_BY, EtapaCarreraPeer::UPDATED_AT, EtapaCarreraPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_carrera', 'nombre', 'numero_etapa', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdCarrera' => 1, 'Nombre' => 2, 'NumeroEtapa' => 3, 'CreatedAt' => 4, 'CreatedBy' => 5, 'UpdatedAt' => 6, 'UpdatedBy' => 7, ),
		BasePeer::TYPE_COLNAME => array (EtapaCarreraPeer::ID => 0, EtapaCarreraPeer::ID_CARRERA => 1, EtapaCarreraPeer::NOMBRE => 2, EtapaCarreraPeer::NUMERO_ETAPA => 3, EtapaCarreraPeer::CREATED_AT => 4, EtapaCarreraPeer::CREATED_BY => 5, EtapaCarreraPeer::UPDATED_AT => 6, EtapaCarreraPeer::UPDATED_BY => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_carrera' => 1, 'nombre' => 2, 'numero_etapa' => 3, 'created_at' => 4, 'created_by' => 5, 'updated_at' => 6, 'updated_by' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.EtapaCarreraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EtapaCarreraPeer::getTableMap();
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
		return str_replace(EtapaCarreraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EtapaCarreraPeer::ID);

		$criteria->addSelectColumn(EtapaCarreraPeer::ID_CARRERA);

		$criteria->addSelectColumn(EtapaCarreraPeer::NOMBRE);

		$criteria->addSelectColumn(EtapaCarreraPeer::NUMERO_ETAPA);

		$criteria->addSelectColumn(EtapaCarreraPeer::CREATED_AT);

		$criteria->addSelectColumn(EtapaCarreraPeer::CREATED_BY);

		$criteria->addSelectColumn(EtapaCarreraPeer::UPDATED_AT);

		$criteria->addSelectColumn(EtapaCarreraPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(etapa_carrera.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT etapa_carrera.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtapaCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtapaCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EtapaCarreraPeer::doSelectRS($criteria, $con);
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
		$objects = EtapaCarreraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EtapaCarreraPeer::populateObjects(EtapaCarreraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EtapaCarreraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EtapaCarreraPeer::getOMClass();
		$cls = sfPropel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCarrera(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtapaCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtapaCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtapaCarreraPeer::ID_CARRERA, CarreraPeer::ID);

		$rs = EtapaCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EtapaCarreraPeer::addSelectColumns($c);
		$startcol = (EtapaCarreraPeer::NUM_COLUMNS - EtapaCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CarreraPeer::addSelectColumns($c);

		$c->addJoin(EtapaCarreraPeer::ID_CARRERA, CarreraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtapaCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCarrera(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEtapaCarrera($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEtapaCarreras();
				$obj2->addEtapaCarrera($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EtapaCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EtapaCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EtapaCarreraPeer::ID_CARRERA, CarreraPeer::ID);

		$rs = EtapaCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EtapaCarreraPeer::addSelectColumns($c);
		$startcol2 = (EtapaCarreraPeer::NUM_COLUMNS - EtapaCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CarreraPeer::NUM_COLUMNS;

		$c->addJoin(EtapaCarreraPeer::ID_CARRERA, CarreraPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EtapaCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCarrera(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEtapaCarrera($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEtapaCarreras();
				$obj2->addEtapaCarrera($obj1);
			}

			$results[] = $obj1;
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
		return EtapaCarreraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EtapaCarreraPeer::ID); 

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
			$comparison = $criteria->getComparison(EtapaCarreraPeer::ID);
			$selectCriteria->add(EtapaCarreraPeer::ID, $criteria->remove(EtapaCarreraPeer::ID), $comparison);

			$comparison = $criteria->getComparison(EtapaCarreraPeer::ID_CARRERA);
			$selectCriteria->add(EtapaCarreraPeer::ID_CARRERA, $criteria->remove(EtapaCarreraPeer::ID_CARRERA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EtapaCarreraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EtapaCarreraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EtapaCarrera) {

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

			$criteria->add(EtapaCarreraPeer::ID, $vals[0], Criteria::IN);
			$criteria->add(EtapaCarreraPeer::ID_CARRERA, $vals[1], Criteria::IN);
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

	
	public static function doValidate(EtapaCarrera $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EtapaCarreraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EtapaCarreraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EtapaCarreraPeer::DATABASE_NAME, EtapaCarreraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EtapaCarreraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $id, $id_carrera, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(EtapaCarreraPeer::ID, $id);
		$criteria->add(EtapaCarreraPeer::ID_CARRERA, $id_carrera);
		$v = EtapaCarreraPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseEtapaCarreraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.EtapaCarreraMapBuilder');
}
