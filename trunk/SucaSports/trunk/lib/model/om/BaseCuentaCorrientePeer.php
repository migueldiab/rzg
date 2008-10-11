<?php


abstract class BaseCuentaCorrientePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cuenta_corriente';

	
	const CLASS_DEFAULT = 'lib.model.CuentaCorriente';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'cuenta_corriente.ID';

	
	const ID_CORREDOR = 'cuenta_corriente.ID_CORREDOR';

	
	const ID_FORMA_PAGO = 'cuenta_corriente.ID_FORMA_PAGO';

	
	const MONTO = 'cuenta_corriente.MONTO';

	
	const CONCEPTO = 'cuenta_corriente.CONCEPTO';

	
	const FIRMA_DIGITAL = 'cuenta_corriente.FIRMA_DIGITAL';

	
	const FECHA_DE_PAGO = 'cuenta_corriente.FECHA_DE_PAGO';

	
	const NOTA = 'cuenta_corriente.NOTA';

	
	const CREATED_AT = 'cuenta_corriente.CREATED_AT';

	
	const CREATED_BY = 'cuenta_corriente.CREATED_BY';

	
	const UPDATED_AT = 'cuenta_corriente.UPDATED_AT';

	
	const UPDATED_BY = 'cuenta_corriente.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdCorredor', 'IdFormaPago', 'Monto', 'Concepto', 'FirmaDigital', 'FechaDePago', 'Nota', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (CuentaCorrientePeer::ID, CuentaCorrientePeer::ID_CORREDOR, CuentaCorrientePeer::ID_FORMA_PAGO, CuentaCorrientePeer::MONTO, CuentaCorrientePeer::CONCEPTO, CuentaCorrientePeer::FIRMA_DIGITAL, CuentaCorrientePeer::FECHA_DE_PAGO, CuentaCorrientePeer::NOTA, CuentaCorrientePeer::CREATED_AT, CuentaCorrientePeer::CREATED_BY, CuentaCorrientePeer::UPDATED_AT, CuentaCorrientePeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_corredor', 'id_forma_pago', 'monto', 'concepto', 'firma_digital', 'fecha_de_pago', 'nota', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdCorredor' => 1, 'IdFormaPago' => 2, 'Monto' => 3, 'Concepto' => 4, 'FirmaDigital' => 5, 'FechaDePago' => 6, 'Nota' => 7, 'CreatedAt' => 8, 'CreatedBy' => 9, 'UpdatedAt' => 10, 'UpdatedBy' => 11, ),
		BasePeer::TYPE_COLNAME => array (CuentaCorrientePeer::ID => 0, CuentaCorrientePeer::ID_CORREDOR => 1, CuentaCorrientePeer::ID_FORMA_PAGO => 2, CuentaCorrientePeer::MONTO => 3, CuentaCorrientePeer::CONCEPTO => 4, CuentaCorrientePeer::FIRMA_DIGITAL => 5, CuentaCorrientePeer::FECHA_DE_PAGO => 6, CuentaCorrientePeer::NOTA => 7, CuentaCorrientePeer::CREATED_AT => 8, CuentaCorrientePeer::CREATED_BY => 9, CuentaCorrientePeer::UPDATED_AT => 10, CuentaCorrientePeer::UPDATED_BY => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_corredor' => 1, 'id_forma_pago' => 2, 'monto' => 3, 'concepto' => 4, 'firma_digital' => 5, 'fecha_de_pago' => 6, 'nota' => 7, 'created_at' => 8, 'created_by' => 9, 'updated_at' => 10, 'updated_by' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.CuentaCorrienteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CuentaCorrientePeer::getTableMap();
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
		return str_replace(CuentaCorrientePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CuentaCorrientePeer::ID);

		$criteria->addSelectColumn(CuentaCorrientePeer::ID_CORREDOR);

		$criteria->addSelectColumn(CuentaCorrientePeer::ID_FORMA_PAGO);

		$criteria->addSelectColumn(CuentaCorrientePeer::MONTO);

		$criteria->addSelectColumn(CuentaCorrientePeer::CONCEPTO);

		$criteria->addSelectColumn(CuentaCorrientePeer::FIRMA_DIGITAL);

		$criteria->addSelectColumn(CuentaCorrientePeer::FECHA_DE_PAGO);

		$criteria->addSelectColumn(CuentaCorrientePeer::NOTA);

		$criteria->addSelectColumn(CuentaCorrientePeer::CREATED_AT);

		$criteria->addSelectColumn(CuentaCorrientePeer::CREATED_BY);

		$criteria->addSelectColumn(CuentaCorrientePeer::UPDATED_AT);

		$criteria->addSelectColumn(CuentaCorrientePeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(cuenta_corriente.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cuenta_corriente.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CuentaCorrientePeer::doSelectRS($criteria, $con);
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
		$objects = CuentaCorrientePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CuentaCorrientePeer::populateObjects(CuentaCorrientePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CuentaCorrientePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CuentaCorrientePeer::getOMClass();
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
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CuentaCorrientePeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = CuentaCorrientePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFormaPago(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CuentaCorrientePeer::ID_FORMA_PAGO, FormaPagoPeer::ID);

		$rs = CuentaCorrientePeer::doSelectRS($criteria, $con);
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

		CuentaCorrientePeer::addSelectColumns($c);
		$startcol = (CuentaCorrientePeer::NUM_COLUMNS - CuentaCorrientePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CorredorPeer::addSelectColumns($c);

		$c->addJoin(CuentaCorrientePeer::ID_CORREDOR, CorredorPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CuentaCorrientePeer::getOMClass();

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
										$temp_obj2->addCuentaCorriente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCuentaCorrientes();
				$obj2->addCuentaCorriente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinFormaPago(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CuentaCorrientePeer::addSelectColumns($c);
		$startcol = (CuentaCorrientePeer::NUM_COLUMNS - CuentaCorrientePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FormaPagoPeer::addSelectColumns($c);

		$c->addJoin(CuentaCorrientePeer::ID_FORMA_PAGO, FormaPagoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CuentaCorrientePeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FormaPagoPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFormaPago(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCuentaCorriente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCuentaCorrientes();
				$obj2->addCuentaCorriente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CuentaCorrientePeer::ID_CORREDOR, CorredorPeer::ID);

		$criteria->addJoin(CuentaCorrientePeer::ID_FORMA_PAGO, FormaPagoPeer::ID);

		$rs = CuentaCorrientePeer::doSelectRS($criteria, $con);
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

		CuentaCorrientePeer::addSelectColumns($c);
		$startcol2 = (CuentaCorrientePeer::NUM_COLUMNS - CuentaCorrientePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CorredorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CorredorPeer::NUM_COLUMNS;

		FormaPagoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FormaPagoPeer::NUM_COLUMNS;

		$c->addJoin(CuentaCorrientePeer::ID_CORREDOR, CorredorPeer::ID);

		$c->addJoin(CuentaCorrientePeer::ID_FORMA_PAGO, FormaPagoPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CuentaCorrientePeer::getOMClass();


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
					$temp_obj2->addCuentaCorriente($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCuentaCorrientes();
				$obj2->addCuentaCorriente($obj1);
			}


					
			$omClass = FormaPagoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFormaPago(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCuentaCorriente($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCuentaCorrientes();
				$obj3->addCuentaCorriente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptCorredor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CuentaCorrientePeer::ID_FORMA_PAGO, FormaPagoPeer::ID);

		$rs = CuentaCorrientePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFormaPago(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CuentaCorrientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CuentaCorrientePeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = CuentaCorrientePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptCorredor(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CuentaCorrientePeer::addSelectColumns($c);
		$startcol2 = (CuentaCorrientePeer::NUM_COLUMNS - CuentaCorrientePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FormaPagoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FormaPagoPeer::NUM_COLUMNS;

		$c->addJoin(CuentaCorrientePeer::ID_FORMA_PAGO, FormaPagoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CuentaCorrientePeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FormaPagoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFormaPago(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCuentaCorriente($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCuentaCorrientes();
				$obj2->addCuentaCorriente($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFormaPago(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CuentaCorrientePeer::addSelectColumns($c);
		$startcol2 = (CuentaCorrientePeer::NUM_COLUMNS - CuentaCorrientePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CorredorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CorredorPeer::NUM_COLUMNS;

		$c->addJoin(CuentaCorrientePeer::ID_CORREDOR, CorredorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CuentaCorrientePeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CorredorPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCorredor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCuentaCorriente($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCuentaCorrientes();
				$obj2->addCuentaCorriente($obj1);
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
		return CuentaCorrientePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CuentaCorrientePeer::ID); 

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
			$comparison = $criteria->getComparison(CuentaCorrientePeer::ID);
			$selectCriteria->add(CuentaCorrientePeer::ID, $criteria->remove(CuentaCorrientePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CuentaCorrientePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CuentaCorrientePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof CuentaCorriente) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CuentaCorrientePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(CuentaCorriente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CuentaCorrientePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CuentaCorrientePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CuentaCorrientePeer::DATABASE_NAME, CuentaCorrientePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CuentaCorrientePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CuentaCorrientePeer::DATABASE_NAME);

		$criteria->add(CuentaCorrientePeer::ID, $pk);


		$v = CuentaCorrientePeer::doSelect($criteria, $con);

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
			$criteria->add(CuentaCorrientePeer::ID, $pks, Criteria::IN);
			$objs = CuentaCorrientePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCuentaCorrientePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.CuentaCorrienteMapBuilder');
}
