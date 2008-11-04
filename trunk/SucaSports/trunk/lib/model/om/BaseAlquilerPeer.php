<?php


abstract class BaseAlquilerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'alquiler';

	
	const CLASS_DEFAULT = 'lib.model.Alquiler';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_INVENTARIO = 'alquiler.ID_INVENTARIO';

	
	const FECHA_INICIO = 'alquiler.FECHA_INICIO';

	
	const ID_ETAPA = 'alquiler.ID_ETAPA';

	
	const ID_CARRERA = 'alquiler.ID_CARRERA';

	
	const ID_CUENTA_CORRIENTE = 'alquiler.ID_CUENTA_CORRIENTE';

	
	const ID_CORREDOR = 'alquiler.ID_CORREDOR';

	
	const CREATED_AT = 'alquiler.CREATED_AT';

	
	const CREATED_BY = 'alquiler.CREATED_BY';

	
	const UPDATED_AT = 'alquiler.UPDATED_AT';

	
	const UPDATED_BY = 'alquiler.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdInventario', 'FechaInicio', 'IdEtapa', 'IdCarrera', 'IdCuentaCorriente', 'IdCorredor', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (AlquilerPeer::ID_INVENTARIO, AlquilerPeer::FECHA_INICIO, AlquilerPeer::ID_ETAPA, AlquilerPeer::ID_CARRERA, AlquilerPeer::ID_CUENTA_CORRIENTE, AlquilerPeer::ID_CORREDOR, AlquilerPeer::CREATED_AT, AlquilerPeer::CREATED_BY, AlquilerPeer::UPDATED_AT, AlquilerPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id_inventario', 'fecha_inicio', 'id_etapa', 'id_carrera', 'id_cuenta_corriente', 'id_corredor', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdInventario' => 0, 'FechaInicio' => 1, 'IdEtapa' => 2, 'IdCarrera' => 3, 'IdCuentaCorriente' => 4, 'IdCorredor' => 5, 'CreatedAt' => 6, 'CreatedBy' => 7, 'UpdatedAt' => 8, 'UpdatedBy' => 9, ),
		BasePeer::TYPE_COLNAME => array (AlquilerPeer::ID_INVENTARIO => 0, AlquilerPeer::FECHA_INICIO => 1, AlquilerPeer::ID_ETAPA => 2, AlquilerPeer::ID_CARRERA => 3, AlquilerPeer::ID_CUENTA_CORRIENTE => 4, AlquilerPeer::ID_CORREDOR => 5, AlquilerPeer::CREATED_AT => 6, AlquilerPeer::CREATED_BY => 7, AlquilerPeer::UPDATED_AT => 8, AlquilerPeer::UPDATED_BY => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id_inventario' => 0, 'fecha_inicio' => 1, 'id_etapa' => 2, 'id_carrera' => 3, 'id_cuenta_corriente' => 4, 'id_corredor' => 5, 'created_at' => 6, 'created_by' => 7, 'updated_at' => 8, 'updated_by' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.AlquilerMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AlquilerPeer::getTableMap();
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
		return str_replace(AlquilerPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AlquilerPeer::ID_INVENTARIO);

		$criteria->addSelectColumn(AlquilerPeer::FECHA_INICIO);

		$criteria->addSelectColumn(AlquilerPeer::ID_ETAPA);

		$criteria->addSelectColumn(AlquilerPeer::ID_CARRERA);

		$criteria->addSelectColumn(AlquilerPeer::ID_CUENTA_CORRIENTE);

		$criteria->addSelectColumn(AlquilerPeer::ID_CORREDOR);

		$criteria->addSelectColumn(AlquilerPeer::CREATED_AT);

		$criteria->addSelectColumn(AlquilerPeer::CREATED_BY);

		$criteria->addSelectColumn(AlquilerPeer::UPDATED_AT);

		$criteria->addSelectColumn(AlquilerPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(alquiler.ID_INVENTARIO)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT alquiler.ID_INVENTARIO)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlquilerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlquilerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AlquilerPeer::doSelectRS($criteria, $con);
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
		$objects = AlquilerPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AlquilerPeer::populateObjects(AlquilerPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AlquilerPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AlquilerPeer::getOMClass();
		$cls = sfPropel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinInventario(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlquilerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlquilerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlquilerPeer::ID_INVENTARIO, InventarioPeer::ID);

		$rs = AlquilerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinInventario(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlquilerPeer::addSelectColumns($c);
		$startcol = (AlquilerPeer::NUM_COLUMNS - AlquilerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		InventarioPeer::addSelectColumns($c);

		$c->addJoin(AlquilerPeer::ID_INVENTARIO, InventarioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlquilerPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InventarioPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getInventario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAlquiler($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAlquilers();
				$obj2->addAlquiler($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AlquilerPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AlquilerPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AlquilerPeer::ID_INVENTARIO, InventarioPeer::ID);

		$rs = AlquilerPeer::doSelectRS($criteria, $con);
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

		AlquilerPeer::addSelectColumns($c);
		$startcol2 = (AlquilerPeer::NUM_COLUMNS - AlquilerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InventarioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InventarioPeer::NUM_COLUMNS;

		$c->addJoin(AlquilerPeer::ID_INVENTARIO, InventarioPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlquilerPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = InventarioPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInventario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlquiler($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAlquilers();
				$obj2->addAlquiler($obj1);
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
		return AlquilerPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(AlquilerPeer::ID_INVENTARIO);
			$selectCriteria->add(AlquilerPeer::ID_INVENTARIO, $criteria->remove(AlquilerPeer::ID_INVENTARIO), $comparison);

			$comparison = $criteria->getComparison(AlquilerPeer::FECHA_INICIO);
			$selectCriteria->add(AlquilerPeer::FECHA_INICIO, $criteria->remove(AlquilerPeer::FECHA_INICIO), $comparison);

			$comparison = $criteria->getComparison(AlquilerPeer::ID_ETAPA);
			$selectCriteria->add(AlquilerPeer::ID_ETAPA, $criteria->remove(AlquilerPeer::ID_ETAPA), $comparison);

			$comparison = $criteria->getComparison(AlquilerPeer::ID_CARRERA);
			$selectCriteria->add(AlquilerPeer::ID_CARRERA, $criteria->remove(AlquilerPeer::ID_CARRERA), $comparison);

			$comparison = $criteria->getComparison(AlquilerPeer::ID_CUENTA_CORRIENTE);
			$selectCriteria->add(AlquilerPeer::ID_CUENTA_CORRIENTE, $criteria->remove(AlquilerPeer::ID_CUENTA_CORRIENTE), $comparison);

			$comparison = $criteria->getComparison(AlquilerPeer::ID_CORREDOR);
			$selectCriteria->add(AlquilerPeer::ID_CORREDOR, $criteria->remove(AlquilerPeer::ID_CORREDOR), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AlquilerPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Alquiler) {

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
				$vals[4][] = $value[4];
				$vals[5][] = $value[5];
			}

			$criteria->add(AlquilerPeer::ID_INVENTARIO, $vals[0], Criteria::IN);
			$criteria->add(AlquilerPeer::FECHA_INICIO, $vals[1], Criteria::IN);
			$criteria->add(AlquilerPeer::ID_ETAPA, $vals[2], Criteria::IN);
			$criteria->add(AlquilerPeer::ID_CARRERA, $vals[3], Criteria::IN);
			$criteria->add(AlquilerPeer::ID_CUENTA_CORRIENTE, $vals[4], Criteria::IN);
			$criteria->add(AlquilerPeer::ID_CORREDOR, $vals[5], Criteria::IN);
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

	
	public static function doValidate(Alquiler $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AlquilerPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AlquilerPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AlquilerPeer::DATABASE_NAME, AlquilerPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AlquilerPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $id_inventario, $fecha_inicio, $id_etapa, $id_carrera, $id_cuenta_corriente, $id_corredor, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(AlquilerPeer::ID_INVENTARIO, $id_inventario);
		$criteria->add(AlquilerPeer::FECHA_INICIO, $fecha_inicio);
		$criteria->add(AlquilerPeer::ID_ETAPA, $id_etapa);
		$criteria->add(AlquilerPeer::ID_CARRERA, $id_carrera);
		$criteria->add(AlquilerPeer::ID_CUENTA_CORRIENTE, $id_cuenta_corriente);
		$criteria->add(AlquilerPeer::ID_CORREDOR, $id_corredor);
		$v = AlquilerPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseAlquilerPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.AlquilerMapBuilder');
}
