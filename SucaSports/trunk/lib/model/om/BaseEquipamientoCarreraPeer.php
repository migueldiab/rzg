<?php


abstract class BaseEquipamientoCarreraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'equipamiento_carrera';

	
	const CLASS_DEFAULT = 'lib.model.EquipamientoCarrera';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_FECHA_ETAPA_CARRERA = 'equipamiento_carrera.ID_FECHA_ETAPA_CARRERA';

	
	const ID_TIPO_EQUIPAMIENTO = 'equipamiento_carrera.ID_TIPO_EQUIPAMIENTO';

	
	const CREATED_AT = 'equipamiento_carrera.CREATED_AT';

	
	const CREATED_BY = 'equipamiento_carrera.CREATED_BY';

	
	const UPDATED_AT = 'equipamiento_carrera.UPDATED_AT';

	
	const UPDATED_BY = 'equipamiento_carrera.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdFechaEtapaCarrera', 'IdTipoEquipamiento', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, EquipamientoCarreraPeer::CREATED_AT, EquipamientoCarreraPeer::CREATED_BY, EquipamientoCarreraPeer::UPDATED_AT, EquipamientoCarreraPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id_fecha_etapa_carrera', 'id_tipo_equipamiento', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdFechaEtapaCarrera' => 0, 'IdTipoEquipamiento' => 1, 'CreatedAt' => 2, 'CreatedBy' => 3, 'UpdatedAt' => 4, 'UpdatedBy' => 5, ),
		BasePeer::TYPE_COLNAME => array (EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA => 0, EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO => 1, EquipamientoCarreraPeer::CREATED_AT => 2, EquipamientoCarreraPeer::CREATED_BY => 3, EquipamientoCarreraPeer::UPDATED_AT => 4, EquipamientoCarreraPeer::UPDATED_BY => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id_fecha_etapa_carrera' => 0, 'id_tipo_equipamiento' => 1, 'created_at' => 2, 'created_by' => 3, 'updated_at' => 4, 'updated_by' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.EquipamientoCarreraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EquipamientoCarreraPeer::getTableMap();
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
		return str_replace(EquipamientoCarreraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA);

		$criteria->addSelectColumn(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO);

		$criteria->addSelectColumn(EquipamientoCarreraPeer::CREATED_AT);

		$criteria->addSelectColumn(EquipamientoCarreraPeer::CREATED_BY);

		$criteria->addSelectColumn(EquipamientoCarreraPeer::UPDATED_AT);

		$criteria->addSelectColumn(EquipamientoCarreraPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(equipamiento_carrera.ID_FECHA_ETAPA_CARRERA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT equipamiento_carrera.ID_FECHA_ETAPA_CARRERA)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EquipamientoCarreraPeer::doSelectRS($criteria, $con);
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
		$objects = EquipamientoCarreraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EquipamientoCarreraPeer::populateObjects(EquipamientoCarreraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EquipamientoCarreraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EquipamientoCarreraPeer::getOMClass();
		$cls = sfPropel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFechaEtapaCarrera(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$rs = EquipamientoCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTipoEquipamiento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, TipoEquipamientoPeer::ID);

		$rs = EquipamientoCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFechaEtapaCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EquipamientoCarreraPeer::addSelectColumns($c);
		$startcol = (EquipamientoCarreraPeer::NUM_COLUMNS - EquipamientoCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FechaEtapaCarreraPeer::addSelectColumns($c);

		$c->addJoin(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EquipamientoCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FechaEtapaCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFechaEtapaCarrera(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEquipamientoCarrera($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEquipamientoCarreras();
				$obj2->addEquipamientoCarrera($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTipoEquipamiento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EquipamientoCarreraPeer::addSelectColumns($c);
		$startcol = (EquipamientoCarreraPeer::NUM_COLUMNS - EquipamientoCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipoEquipamientoPeer::addSelectColumns($c);

		$c->addJoin(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, TipoEquipamientoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EquipamientoCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoEquipamientoPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTipoEquipamiento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEquipamientoCarrera($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEquipamientoCarreras();
				$obj2->addEquipamientoCarrera($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$criteria->addJoin(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, TipoEquipamientoPeer::ID);

		$rs = EquipamientoCarreraPeer::doSelectRS($criteria, $con);
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

		EquipamientoCarreraPeer::addSelectColumns($c);
		$startcol2 = (EquipamientoCarreraPeer::NUM_COLUMNS - EquipamientoCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FechaEtapaCarreraPeer::NUM_COLUMNS;

		TipoEquipamientoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TipoEquipamientoPeer::NUM_COLUMNS;

		$c->addJoin(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$c->addJoin(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, TipoEquipamientoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EquipamientoCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = FechaEtapaCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFechaEtapaCarrera(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEquipamientoCarrera($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEquipamientoCarreras();
				$obj2->addEquipamientoCarrera($obj1);
			}


					
			$omClass = TipoEquipamientoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTipoEquipamiento(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEquipamientoCarrera($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initEquipamientoCarreras();
				$obj3->addEquipamientoCarrera($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptFechaEtapaCarrera(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, TipoEquipamientoPeer::ID);

		$rs = EquipamientoCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTipoEquipamiento(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EquipamientoCarreraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$rs = EquipamientoCarreraPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptFechaEtapaCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EquipamientoCarreraPeer::addSelectColumns($c);
		$startcol2 = (EquipamientoCarreraPeer::NUM_COLUMNS - EquipamientoCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipoEquipamientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipoEquipamientoPeer::NUM_COLUMNS;

		$c->addJoin(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, TipoEquipamientoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EquipamientoCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoEquipamientoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipoEquipamiento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEquipamientoCarrera($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEquipamientoCarreras();
				$obj2->addEquipamientoCarrera($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTipoEquipamiento(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EquipamientoCarreraPeer::addSelectColumns($c);
		$startcol2 = (EquipamientoCarreraPeer::NUM_COLUMNS - EquipamientoCarreraPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FechaEtapaCarreraPeer::NUM_COLUMNS;

		$c->addJoin(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EquipamientoCarreraPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FechaEtapaCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFechaEtapaCarrera(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEquipamientoCarrera($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEquipamientoCarreras();
				$obj2->addEquipamientoCarrera($obj1);
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
		return EquipamientoCarreraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA); 

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
			$comparison = $criteria->getComparison(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA);
			$selectCriteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, $criteria->remove(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(EquipamientoCarreraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EquipamientoCarreraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof EquipamientoCarrera) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, (array) $values, Criteria::IN);
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

	
	public static function doValidate(EquipamientoCarrera $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EquipamientoCarreraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EquipamientoCarreraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EquipamientoCarreraPeer::DATABASE_NAME, EquipamientoCarreraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EquipamientoCarreraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EquipamientoCarreraPeer::DATABASE_NAME);

		$criteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, $pk);


		$v = EquipamientoCarreraPeer::doSelect($criteria, $con);

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
			$criteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, $pks, Criteria::IN);
			$objs = EquipamientoCarreraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEquipamientoCarreraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.EquipamientoCarreraMapBuilder');
}