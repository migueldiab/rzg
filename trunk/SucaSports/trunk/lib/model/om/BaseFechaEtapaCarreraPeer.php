<?php


abstract class BaseFechaEtapaCarreraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fecha_etapa_carrera';

	
	const CLASS_DEFAULT = 'lib.model.FechaEtapaCarrera';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'fecha_etapa_carrera.ID';

	
	const MAX_CORREDORES = 'fecha_etapa_carrera.MAX_CORREDORES';

	
	const FECHA_INICIO = 'fecha_etapa_carrera.FECHA_INICIO';

	
	const FECHA_FIN = 'fecha_etapa_carrera.FECHA_FIN';

	
	const COSTO = 'fecha_etapa_carrera.COSTO';

	
	const CREATED_AT = 'fecha_etapa_carrera.CREATED_AT';

	
	const CREATED_BY = 'fecha_etapa_carrera.CREATED_BY';

	
	const UPDATED_AT = 'fecha_etapa_carrera.UPDATED_AT';

	
	const UPDATED_BY = 'fecha_etapa_carrera.UPDATED_BY';

	
	const ID_ETAPA_CARRERA = 'fecha_etapa_carrera.ID_ETAPA_CARRERA';

	
	const ID_CARRERA = 'fecha_etapa_carrera.ID_CARRERA';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'MaxCorredores', 'FechaInicio', 'FechaFin', 'Costo', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'IdEtapaCarrera', 'IdCarrera', ),
		BasePeer::TYPE_COLNAME => array (FechaEtapaCarreraPeer::ID, FechaEtapaCarreraPeer::MAX_CORREDORES, FechaEtapaCarreraPeer::FECHA_INICIO, FechaEtapaCarreraPeer::FECHA_FIN, FechaEtapaCarreraPeer::COSTO, FechaEtapaCarreraPeer::CREATED_AT, FechaEtapaCarreraPeer::CREATED_BY, FechaEtapaCarreraPeer::UPDATED_AT, FechaEtapaCarreraPeer::UPDATED_BY, FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID_CARRERA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'max_corredores', 'fecha_inicio', 'fecha_fin', 'costo', 'created_at', 'created_by', 'updated_at', 'updated_by', 'id_etapa_carrera', 'id_carrera', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'MaxCorredores' => 1, 'FechaInicio' => 2, 'FechaFin' => 3, 'Costo' => 4, 'CreatedAt' => 5, 'CreatedBy' => 6, 'UpdatedAt' => 7, 'UpdatedBy' => 8, 'IdEtapaCarrera' => 9, 'IdCarrera' => 10, ),
		BasePeer::TYPE_COLNAME => array (FechaEtapaCarreraPeer::ID => 0, FechaEtapaCarreraPeer::MAX_CORREDORES => 1, FechaEtapaCarreraPeer::FECHA_INICIO => 2, FechaEtapaCarreraPeer::FECHA_FIN => 3, FechaEtapaCarreraPeer::COSTO => 4, FechaEtapaCarreraPeer::CREATED_AT => 5, FechaEtapaCarreraPeer::CREATED_BY => 6, FechaEtapaCarreraPeer::UPDATED_AT => 7, FechaEtapaCarreraPeer::UPDATED_BY => 8, FechaEtapaCarreraPeer::ID_ETAPA_CARRERA => 9, FechaEtapaCarreraPeer::ID_CARRERA => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'max_corredores' => 1, 'fecha_inicio' => 2, 'fecha_fin' => 3, 'costo' => 4, 'created_at' => 5, 'created_by' => 6, 'updated_at' => 7, 'updated_by' => 8, 'id_etapa_carrera' => 9, 'id_carrera' => 10, ),
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

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::ID);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::MAX_CORREDORES);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::FECHA_INICIO);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::FECHA_FIN);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::COSTO);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::CREATED_AT);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::CREATED_BY);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::UPDATED_AT);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::UPDATED_BY);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA);

		$criteria->addSelectColumn(FechaEtapaCarreraPeer::ID_CARRERA);

	}

	const COUNT = 'COUNT(fecha_etapa_carrera.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fecha_etapa_carrera.ID)';

	
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

	
	public static function doCountJoinEtapaCarreraRelatedByIdEtapaCarrera(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, EtapaCarreraPeer::ID);

		$rs = FechaEtapaCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEtapaCarreraRelatedByIdCarrera(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(FechaEtapaCarreraPeer::ID_CARRERA, EtapaCarreraPeer::ID);

		$rs = FechaEtapaCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEtapaCarreraRelatedByIdEtapaCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol = (FechaEtapaCarreraPeer::NUM_COLUMNS - FechaEtapaCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EtapaCarreraPeer::addSelectColumns($c);

		$c->addJoin(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, EtapaCarreraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FechaEtapaCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EtapaCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEtapaCarreraRelatedByIdEtapaCarrera(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFechaEtapaCarreraRelatedByIdEtapaCarrera($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFechaEtapaCarrerasRelatedByIdEtapaCarrera();
				$obj2->addFechaEtapaCarreraRelatedByIdEtapaCarrera($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEtapaCarreraRelatedByIdCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol = (FechaEtapaCarreraPeer::NUM_COLUMNS - FechaEtapaCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EtapaCarreraPeer::addSelectColumns($c);

		$c->addJoin(FechaEtapaCarreraPeer::ID_CARRERA, EtapaCarreraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FechaEtapaCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EtapaCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEtapaCarreraRelatedByIdCarrera(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFechaEtapaCarreraRelatedByIdCarrera($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFechaEtapaCarrerasRelatedByIdCarrera();
				$obj2->addFechaEtapaCarreraRelatedByIdCarrera($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, EtapaCarreraPeer::ID);

		$criteria->addJoin(FechaEtapaCarreraPeer::ID_CARRERA, EtapaCarreraPeer::ID);

		$rs = FechaEtapaCarreraPeer::doSelectRS($criteria, $con);
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

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol2 = (FechaEtapaCarreraPeer::NUM_COLUMNS - FechaEtapaCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		EtapaCarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + EtapaCarreraPeer::NUM_COLUMNS;

		EtapaCarreraPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EtapaCarreraPeer::NUM_COLUMNS;

		$c->addJoin(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, EtapaCarreraPeer::ID);

		$c->addJoin(FechaEtapaCarreraPeer::ID_CARRERA, EtapaCarreraPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FechaEtapaCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = EtapaCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEtapaCarreraRelatedByIdEtapaCarrera(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFechaEtapaCarreraRelatedByIdEtapaCarrera($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initFechaEtapaCarrerasRelatedByIdEtapaCarrera();
				$obj2->addFechaEtapaCarreraRelatedByIdEtapaCarrera($obj1);
			}


					
			$omClass = EtapaCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEtapaCarreraRelatedByIdCarrera(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addFechaEtapaCarreraRelatedByIdCarrera($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initFechaEtapaCarrerasRelatedByIdCarrera();
				$obj3->addFechaEtapaCarreraRelatedByIdCarrera($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptEtapaCarreraRelatedByIdEtapaCarrera(Criteria $criteria, $distinct = false, $con = null)
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


	
	public static function doCountJoinAllExceptEtapaCarreraRelatedByIdCarrera(Criteria $criteria, $distinct = false, $con = null)
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


	
	public static function doSelectJoinAllExceptEtapaCarreraRelatedByIdEtapaCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol2 = (FechaEtapaCarreraPeer::NUM_COLUMNS - FechaEtapaCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FechaEtapaCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEtapaCarreraRelatedByIdCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol2 = (FechaEtapaCarreraPeer::NUM_COLUMNS - FechaEtapaCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FechaEtapaCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$results[] = $obj1;
		}
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array(array('fecha_inicio', 'id_etapa_carrera', 'id_carrera'));
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

		$criteria->remove(FechaEtapaCarreraPeer::ID); 

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
			$comparison = $criteria->getComparison(FechaEtapaCarreraPeer::ID);
			$selectCriteria->add(FechaEtapaCarreraPeer::ID, $criteria->remove(FechaEtapaCarreraPeer::ID), $comparison);

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
			$criteria->add(FechaEtapaCarreraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);

		$criteria->add(FechaEtapaCarreraPeer::ID, $pk);


		$v = FechaEtapaCarreraPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(FechaEtapaCarreraPeer::ID, $pks, Criteria::IN);
			$objs = FechaEtapaCarreraPeer::doSelect($criteria, $con);
		}
		return $objs;
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
