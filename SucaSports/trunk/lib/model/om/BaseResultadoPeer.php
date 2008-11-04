<?php


abstract class BaseResultadoPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'resultado';

	
	const CLASS_DEFAULT = 'lib.model.Resultado';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_CORREDOR = 'resultado.ID_CORREDOR';

	
	const FECHA_INICIO = 'resultado.FECHA_INICIO';

	
	const ID_ETAPA = 'resultado.ID_ETAPA';

	
	const ID_CARRERA = 'resultado.ID_CARRERA';

	
	const TIEMPO = 'resultado.TIEMPO';

	
	const UPDATED_AT = 'resultado.UPDATED_AT';

	
	const UPDATED_BY = 'resultado.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdCorredor', 'FechaInicio', 'IdEtapa', 'IdCarrera', 'Tiempo', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (ResultadoPeer::ID_CORREDOR, ResultadoPeer::FECHA_INICIO, ResultadoPeer::ID_ETAPA, ResultadoPeer::ID_CARRERA, ResultadoPeer::TIEMPO, ResultadoPeer::UPDATED_AT, ResultadoPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id_corredor', 'fecha_inicio', 'id_etapa', 'id_carrera', 'tiempo', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdCorredor' => 0, 'FechaInicio' => 1, 'IdEtapa' => 2, 'IdCarrera' => 3, 'Tiempo' => 4, 'UpdatedAt' => 5, 'UpdatedBy' => 6, ),
		BasePeer::TYPE_COLNAME => array (ResultadoPeer::ID_CORREDOR => 0, ResultadoPeer::FECHA_INICIO => 1, ResultadoPeer::ID_ETAPA => 2, ResultadoPeer::ID_CARRERA => 3, ResultadoPeer::TIEMPO => 4, ResultadoPeer::UPDATED_AT => 5, ResultadoPeer::UPDATED_BY => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id_corredor' => 0, 'fecha_inicio' => 1, 'id_etapa' => 2, 'id_carrera' => 3, 'tiempo' => 4, 'updated_at' => 5, 'updated_by' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.ResultadoMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ResultadoPeer::getTableMap();
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
		return str_replace(ResultadoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ResultadoPeer::ID_CORREDOR);

		$criteria->addSelectColumn(ResultadoPeer::FECHA_INICIO);

		$criteria->addSelectColumn(ResultadoPeer::ID_ETAPA);

		$criteria->addSelectColumn(ResultadoPeer::ID_CARRERA);

		$criteria->addSelectColumn(ResultadoPeer::TIEMPO);

		$criteria->addSelectColumn(ResultadoPeer::UPDATED_AT);

		$criteria->addSelectColumn(ResultadoPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(resultado.ID_CORREDOR)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT resultado.ID_CORREDOR)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResultadoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResultadoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ResultadoPeer::doSelectRS($criteria, $con);
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
		$objects = ResultadoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ResultadoPeer::populateObjects(ResultadoPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ResultadoPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ResultadoPeer::getOMClass();
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
			$criteria->addSelectColumn(ResultadoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResultadoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResultadoPeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = ResultadoPeer::doSelectRS($criteria, $con);
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

		ResultadoPeer::addSelectColumns($c);
		$startcol = (ResultadoPeer::NUM_COLUMNS - ResultadoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CorredorPeer::addSelectColumns($c);

		$c->addJoin(ResultadoPeer::ID_CORREDOR, CorredorPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResultadoPeer::getOMClass();

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
										$temp_obj2->addResultado($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initResultados();
				$obj2->addResultado($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ResultadoPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ResultadoPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ResultadoPeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = ResultadoPeer::doSelectRS($criteria, $con);
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

		ResultadoPeer::addSelectColumns($c);
		$startcol2 = (ResultadoPeer::NUM_COLUMNS - ResultadoPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CorredorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CorredorPeer::NUM_COLUMNS;

		$c->addJoin(ResultadoPeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ResultadoPeer::getOMClass();


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
					$temp_obj2->addResultado($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initResultados();
				$obj2->addResultado($obj1);
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
		return ResultadoPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(ResultadoPeer::ID_CORREDOR);
			$selectCriteria->add(ResultadoPeer::ID_CORREDOR, $criteria->remove(ResultadoPeer::ID_CORREDOR), $comparison);

			$comparison = $criteria->getComparison(ResultadoPeer::FECHA_INICIO);
			$selectCriteria->add(ResultadoPeer::FECHA_INICIO, $criteria->remove(ResultadoPeer::FECHA_INICIO), $comparison);

			$comparison = $criteria->getComparison(ResultadoPeer::ID_ETAPA);
			$selectCriteria->add(ResultadoPeer::ID_ETAPA, $criteria->remove(ResultadoPeer::ID_ETAPA), $comparison);

			$comparison = $criteria->getComparison(ResultadoPeer::ID_CARRERA);
			$selectCriteria->add(ResultadoPeer::ID_CARRERA, $criteria->remove(ResultadoPeer::ID_CARRERA), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ResultadoPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ResultadoPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Resultado) {

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

			$criteria->add(ResultadoPeer::ID_CORREDOR, $vals[0], Criteria::IN);
			$criteria->add(ResultadoPeer::FECHA_INICIO, $vals[1], Criteria::IN);
			$criteria->add(ResultadoPeer::ID_ETAPA, $vals[2], Criteria::IN);
			$criteria->add(ResultadoPeer::ID_CARRERA, $vals[3], Criteria::IN);
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

	
	public static function doValidate(Resultado $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ResultadoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ResultadoPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ResultadoPeer::DATABASE_NAME, ResultadoPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ResultadoPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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
		$criteria->add(ResultadoPeer::ID_CORREDOR, $id_corredor);
		$criteria->add(ResultadoPeer::FECHA_INICIO, $fecha_inicio);
		$criteria->add(ResultadoPeer::ID_ETAPA, $id_etapa);
		$criteria->add(ResultadoPeer::ID_CARRERA, $id_carrera);
		$v = ResultadoPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseResultadoPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.ResultadoMapBuilder');
}
