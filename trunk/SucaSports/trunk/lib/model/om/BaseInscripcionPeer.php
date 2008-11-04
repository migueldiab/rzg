<?php


abstract class BaseInscripcionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'inscripcion';

	
	const CLASS_DEFAULT = 'lib.model.Inscripcion';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_CORREDOR = 'inscripcion.ID_CORREDOR';

	
	const FECHA_INICIO = 'inscripcion.FECHA_INICIO';

	
	const ID_ETAPA = 'inscripcion.ID_ETAPA';

	
	const ID_CARRERA = 'inscripcion.ID_CARRERA';

	
	const CREATED_AT = 'inscripcion.CREATED_AT';

	
	const CREATED_BY = 'inscripcion.CREATED_BY';

	
	const UPDATED_AT = 'inscripcion.UPDATED_AT';

	
	const UPDATED_BY = 'inscripcion.UPDATED_BY';

	
	const FECHA_INSCRIPCION = 'inscripcion.FECHA_INSCRIPCION';

	
	const FIRMA_DIGITAL = 'inscripcion.FIRMA_DIGITAL';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdCorredor', 'FechaInicio', 'IdEtapa', 'IdCarrera', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'FechaInscripcion', 'FirmaDigital', ),
		BasePeer::TYPE_COLNAME => array (InscripcionPeer::ID_CORREDOR, InscripcionPeer::FECHA_INICIO, InscripcionPeer::ID_ETAPA, InscripcionPeer::ID_CARRERA, InscripcionPeer::CREATED_AT, InscripcionPeer::CREATED_BY, InscripcionPeer::UPDATED_AT, InscripcionPeer::UPDATED_BY, InscripcionPeer::FECHA_INSCRIPCION, InscripcionPeer::FIRMA_DIGITAL, ),
		BasePeer::TYPE_FIELDNAME => array ('id_corredor', 'fecha_inicio', 'id_etapa', 'id_carrera', 'created_at', 'created_by', 'updated_at', 'updated_by', 'fecha_inscripcion', 'firma_digital', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdCorredor' => 0, 'FechaInicio' => 1, 'IdEtapa' => 2, 'IdCarrera' => 3, 'CreatedAt' => 4, 'CreatedBy' => 5, 'UpdatedAt' => 6, 'UpdatedBy' => 7, 'FechaInscripcion' => 8, 'FirmaDigital' => 9, ),
		BasePeer::TYPE_COLNAME => array (InscripcionPeer::ID_CORREDOR => 0, InscripcionPeer::FECHA_INICIO => 1, InscripcionPeer::ID_ETAPA => 2, InscripcionPeer::ID_CARRERA => 3, InscripcionPeer::CREATED_AT => 4, InscripcionPeer::CREATED_BY => 5, InscripcionPeer::UPDATED_AT => 6, InscripcionPeer::UPDATED_BY => 7, InscripcionPeer::FECHA_INSCRIPCION => 8, InscripcionPeer::FIRMA_DIGITAL => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id_corredor' => 0, 'fecha_inicio' => 1, 'id_etapa' => 2, 'id_carrera' => 3, 'created_at' => 4, 'created_by' => 5, 'updated_at' => 6, 'updated_by' => 7, 'fecha_inscripcion' => 8, 'firma_digital' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.InscripcionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InscripcionPeer::getTableMap();
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
		return str_replace(InscripcionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InscripcionPeer::ID_CORREDOR);

		$criteria->addSelectColumn(InscripcionPeer::FECHA_INICIO);

		$criteria->addSelectColumn(InscripcionPeer::ID_ETAPA);

		$criteria->addSelectColumn(InscripcionPeer::ID_CARRERA);

		$criteria->addSelectColumn(InscripcionPeer::CREATED_AT);

		$criteria->addSelectColumn(InscripcionPeer::CREATED_BY);

		$criteria->addSelectColumn(InscripcionPeer::UPDATED_AT);

		$criteria->addSelectColumn(InscripcionPeer::UPDATED_BY);

		$criteria->addSelectColumn(InscripcionPeer::FECHA_INSCRIPCION);

		$criteria->addSelectColumn(InscripcionPeer::FIRMA_DIGITAL);

	}

	const COUNT = 'COUNT(inscripcion.ID_CORREDOR)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT inscripcion.ID_CORREDOR)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InscripcionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InscripcionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InscripcionPeer::doSelectRS($criteria, $con);
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
		$objects = InscripcionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InscripcionPeer::populateObjects(InscripcionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InscripcionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InscripcionPeer::getOMClass();
		$cls = sfPropel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCorredor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InscripcionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InscripcionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = InscripcionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCorredor(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InscripcionPeer::addSelectColumns($c);
		$startcol = (InscripcionPeer::NUM_COLUMNS - InscripcionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CorredorPeer::addSelectColumns($c);

		$c->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InscripcionPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCorredor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addInscripcion($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initInscripcions();
				$obj2->addInscripcion($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InscripcionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InscripcionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = InscripcionPeer::doSelectRS($criteria, $con);
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

		InscripcionPeer::addSelectColumns($c);
		$startcol2 = (InscripcionPeer::NUM_COLUMNS - InscripcionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CorredorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CorredorPeer::NUM_COLUMNS;

		$c->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InscripcionPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = CorredorPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCorredor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addInscripcion($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initInscripcions();
				$obj2->addInscripcion($obj1);
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
		return InscripcionPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(InscripcionPeer::ID_CORREDOR);
			$selectCriteria->add(InscripcionPeer::ID_CORREDOR, $criteria->remove(InscripcionPeer::ID_CORREDOR), $comparison);

			$comparison = $criteria->getComparison(InscripcionPeer::FECHA_INICIO);
			$selectCriteria->add(InscripcionPeer::FECHA_INICIO, $criteria->remove(InscripcionPeer::FECHA_INICIO), $comparison);

			$comparison = $criteria->getComparison(InscripcionPeer::ID_ETAPA);
			$selectCriteria->add(InscripcionPeer::ID_ETAPA, $criteria->remove(InscripcionPeer::ID_ETAPA), $comparison);

			$comparison = $criteria->getComparison(InscripcionPeer::ID_CARRERA);
			$selectCriteria->add(InscripcionPeer::ID_CARRERA, $criteria->remove(InscripcionPeer::ID_CARRERA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(InscripcionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InscripcionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Inscripcion) {

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
				$vals[3][] = $value[3];
			}

			$criteria->add(InscripcionPeer::ID_CORREDOR, $vals[0], Criteria::IN);
			$criteria->add(InscripcionPeer::FECHA_INICIO, $vals[1], Criteria::IN);
			$criteria->add(InscripcionPeer::ID_ETAPA, $vals[2], Criteria::IN);
			$criteria->add(InscripcionPeer::ID_CARRERA, $vals[3], Criteria::IN);
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

	
	public static function doValidate(Inscripcion $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InscripcionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InscripcionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InscripcionPeer::DATABASE_NAME, InscripcionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InscripcionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $id_corredor, $fecha_inicio, $id_etapa, $id_carrera, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(InscripcionPeer::ID_CORREDOR, $id_corredor);
		$criteria->add(InscripcionPeer::FECHA_INICIO, $fecha_inicio);
		$criteria->add(InscripcionPeer::ID_ETAPA, $id_etapa);
		$criteria->add(InscripcionPeer::ID_CARRERA, $id_carrera);
		$v = InscripcionPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseInscripcionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.InscripcionMapBuilder');
}
