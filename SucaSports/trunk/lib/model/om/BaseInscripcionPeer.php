<?php


abstract class BaseInscripcionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'inscripcion';

	
	const CLASS_DEFAULT = 'lib.model.Inscripcion';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID_FECHA_ETAPA_CARRERA = 'inscripcion.ID_FECHA_ETAPA_CARRERA';

	
	const ID_CORREDOR = 'inscripcion.ID_CORREDOR';

	
	const CREATED_AT = 'inscripcion.CREATED_AT';

	
	const CREATED_BY = 'inscripcion.CREATED_BY';

	
	const UPDATED_AT = 'inscripcion.UPDATED_AT';

	
	const UPDATED_BY = 'inscripcion.UPDATED_BY';

	
	const FECHA_INSCRIPCION = 'inscripcion.FECHA_INSCRIPCION';

	
	const FIRMA_DIGITAL = 'inscripcion.FIRMA_DIGITAL';

	
	const CUENTA_CORRIENTE_ID = 'inscripcion.CUENTA_CORRIENTE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdFechaEtapaCarrera', 'IdCorredor', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'FechaInscripcion', 'FirmaDigital', 'CuentaCorrienteId', ),
		BasePeer::TYPE_COLNAME => array (InscripcionPeer::ID_FECHA_ETAPA_CARRERA, InscripcionPeer::ID_CORREDOR, InscripcionPeer::CREATED_AT, InscripcionPeer::CREATED_BY, InscripcionPeer::UPDATED_AT, InscripcionPeer::UPDATED_BY, InscripcionPeer::FECHA_INSCRIPCION, InscripcionPeer::FIRMA_DIGITAL, InscripcionPeer::CUENTA_CORRIENTE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id_fecha_etapa_carrera', 'id_corredor', 'created_at', 'created_by', 'updated_at', 'updated_by', 'fecha_inscripcion', 'firma_digital', 'cuenta_corriente_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdFechaEtapaCarrera' => 0, 'IdCorredor' => 1, 'CreatedAt' => 2, 'CreatedBy' => 3, 'UpdatedAt' => 4, 'UpdatedBy' => 5, 'FechaInscripcion' => 6, 'FirmaDigital' => 7, 'CuentaCorrienteId' => 8, ),
		BasePeer::TYPE_COLNAME => array (InscripcionPeer::ID_FECHA_ETAPA_CARRERA => 0, InscripcionPeer::ID_CORREDOR => 1, InscripcionPeer::CREATED_AT => 2, InscripcionPeer::CREATED_BY => 3, InscripcionPeer::UPDATED_AT => 4, InscripcionPeer::UPDATED_BY => 5, InscripcionPeer::FECHA_INSCRIPCION => 6, InscripcionPeer::FIRMA_DIGITAL => 7, InscripcionPeer::CUENTA_CORRIENTE_ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id_fecha_etapa_carrera' => 0, 'id_corredor' => 1, 'created_at' => 2, 'created_by' => 3, 'updated_at' => 4, 'updated_by' => 5, 'fecha_inscripcion' => 6, 'firma_digital' => 7, 'cuenta_corriente_id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
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

		$criteria->addSelectColumn(InscripcionPeer::ID_FECHA_ETAPA_CARRERA);

		$criteria->addSelectColumn(InscripcionPeer::ID_CORREDOR);

		$criteria->addSelectColumn(InscripcionPeer::CREATED_AT);

		$criteria->addSelectColumn(InscripcionPeer::CREATED_BY);

		$criteria->addSelectColumn(InscripcionPeer::UPDATED_AT);

		$criteria->addSelectColumn(InscripcionPeer::UPDATED_BY);

		$criteria->addSelectColumn(InscripcionPeer::FECHA_INSCRIPCION);

		$criteria->addSelectColumn(InscripcionPeer::FIRMA_DIGITAL);

		$criteria->addSelectColumn(InscripcionPeer::CUENTA_CORRIENTE_ID);

	}

	const COUNT = 'COUNT(inscripcion.ID_FECHA_ETAPA_CARRERA)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT inscripcion.ID_FECHA_ETAPA_CARRERA)';

	
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

	
	public static function doCountJoinFechaEtapaCarrera(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$rs = InscripcionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
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


	
	public static function doCountJoinCuentaCorriente(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(InscripcionPeer::CUENTA_CORRIENTE_ID, CuentaCorrientePeer::ID);

		$rs = InscripcionPeer::doSelectRS($criteria, $con);
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

		InscripcionPeer::addSelectColumns($c);
		$startcol = (InscripcionPeer::NUM_COLUMNS - InscripcionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FechaEtapaCarreraPeer::addSelectColumns($c);

		$c->addJoin(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InscripcionPeer::getOMClass();

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


	
	public static function doSelectJoinCuentaCorriente(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InscripcionPeer::addSelectColumns($c);
		$startcol = (InscripcionPeer::NUM_COLUMNS - InscripcionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CuentaCorrientePeer::addSelectColumns($c);

		$c->addJoin(InscripcionPeer::CUENTA_CORRIENTE_ID, CuentaCorrientePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InscripcionPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CuentaCorrientePeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCuentaCorriente(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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

		$criteria->addJoin(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$criteria->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);

		$criteria->addJoin(InscripcionPeer::CUENTA_CORRIENTE_ID, CuentaCorrientePeer::ID);

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

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FechaEtapaCarreraPeer::NUM_COLUMNS;

		CorredorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CorredorPeer::NUM_COLUMNS;

		CuentaCorrientePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CuentaCorrientePeer::NUM_COLUMNS;

		$c->addJoin(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$c->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);

		$c->addJoin(InscripcionPeer::CUENTA_CORRIENTE_ID, CuentaCorrientePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InscripcionPeer::getOMClass();


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
					$temp_obj2->addInscripcion($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initInscripcions();
				$obj2->addInscripcion($obj1);
			}


					
			$omClass = CorredorPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCorredor(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInscripcion($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initInscripcions();
				$obj3->addInscripcion($obj1);
			}


					
			$omClass = CuentaCorrientePeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCuentaCorriente(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addInscripcion($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initInscripcions();
				$obj4->addInscripcion($obj1);
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
			$criteria->addSelectColumn(InscripcionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InscripcionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);

		$criteria->addJoin(InscripcionPeer::CUENTA_CORRIENTE_ID, CuentaCorrientePeer::ID);

		$rs = InscripcionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCorredor(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$criteria->addJoin(InscripcionPeer::CUENTA_CORRIENTE_ID, CuentaCorrientePeer::ID);

		$rs = InscripcionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCuentaCorriente(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$criteria->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);

		$rs = InscripcionPeer::doSelectRS($criteria, $con);
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

		InscripcionPeer::addSelectColumns($c);
		$startcol2 = (InscripcionPeer::NUM_COLUMNS - InscripcionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CorredorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CorredorPeer::NUM_COLUMNS;

		CuentaCorrientePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CuentaCorrientePeer::NUM_COLUMNS;

		$c->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);

		$c->addJoin(InscripcionPeer::CUENTA_CORRIENTE_ID, CuentaCorrientePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InscripcionPeer::getOMClass();

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
					$temp_obj2->addInscripcion($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInscripcions();
				$obj2->addInscripcion($obj1);
			}

			$omClass = CuentaCorrientePeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuentaCorriente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInscripcion($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInscripcions();
				$obj3->addInscripcion($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCorredor(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InscripcionPeer::addSelectColumns($c);
		$startcol2 = (InscripcionPeer::NUM_COLUMNS - InscripcionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FechaEtapaCarreraPeer::NUM_COLUMNS;

		CuentaCorrientePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CuentaCorrientePeer::NUM_COLUMNS;

		$c->addJoin(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$c->addJoin(InscripcionPeer::CUENTA_CORRIENTE_ID, CuentaCorrientePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InscripcionPeer::getOMClass();

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
					$temp_obj2->addInscripcion($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInscripcions();
				$obj2->addInscripcion($obj1);
			}

			$omClass = CuentaCorrientePeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuentaCorriente(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInscripcion($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInscripcions();
				$obj3->addInscripcion($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCuentaCorriente(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		InscripcionPeer::addSelectColumns($c);
		$startcol2 = (InscripcionPeer::NUM_COLUMNS - InscripcionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FechaEtapaCarreraPeer::NUM_COLUMNS;

		CorredorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CorredorPeer::NUM_COLUMNS;

		$c->addJoin(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, FechaEtapaCarreraPeer::ID);

		$c->addJoin(InscripcionPeer::ID_CORREDOR, CorredorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = InscripcionPeer::getOMClass();

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
					$temp_obj2->addInscripcion($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initInscripcions();
				$obj2->addInscripcion($obj1);
			}

			$omClass = CorredorPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCorredor(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addInscripcion($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initInscripcions();
				$obj3->addInscripcion($obj1);
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
			$comparison = $criteria->getComparison(InscripcionPeer::ID_FECHA_ETAPA_CARRERA);
			$selectCriteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $criteria->remove(InscripcionPeer::ID_FECHA_ETAPA_CARRERA), $comparison);

			$comparison = $criteria->getComparison(InscripcionPeer::ID_CORREDOR);
			$selectCriteria->add(InscripcionPeer::ID_CORREDOR, $criteria->remove(InscripcionPeer::ID_CORREDOR), $comparison);

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
			}

			$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $vals[0], Criteria::IN);
			$criteria->add(InscripcionPeer::ID_CORREDOR, $vals[1], Criteria::IN);
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

	
	public static function retrieveByPK( $id_fecha_etapa_carrera, $id_corredor, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $id_fecha_etapa_carrera);
		$criteria->add(InscripcionPeer::ID_CORREDOR, $id_corredor);
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
