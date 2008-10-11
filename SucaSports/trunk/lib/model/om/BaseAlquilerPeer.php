<?php


abstract class BaseAlquilerPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'alquiler';

	
	const CLASS_DEFAULT = 'lib.model.Alquiler';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'alquiler.ID';

	
	const ID_EQUIPAMIENTO = 'alquiler.ID_EQUIPAMIENTO';

	
	const ID_FECHA_CARRERA = 'alquiler.ID_FECHA_CARRERA';

	
	const ID_USUARIO = 'alquiler.ID_USUARIO';

	
	const CREATED_AT = 'alquiler.CREATED_AT';

	
	const CREATED_BY = 'alquiler.CREATED_BY';

	
	const UPDATED_AT = 'alquiler.UPDATED_AT';

	
	const UPDATED_BY = 'alquiler.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdEquipamiento', 'IdFechaCarrera', 'IdUsuario', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (AlquilerPeer::ID, AlquilerPeer::ID_EQUIPAMIENTO, AlquilerPeer::ID_FECHA_CARRERA, AlquilerPeer::ID_USUARIO, AlquilerPeer::CREATED_AT, AlquilerPeer::CREATED_BY, AlquilerPeer::UPDATED_AT, AlquilerPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_equipamiento', 'id_fecha_carrera', 'id_usuario', 'created_at', 'created_by', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdEquipamiento' => 1, 'IdFechaCarrera' => 2, 'IdUsuario' => 3, 'CreatedAt' => 4, 'CreatedBy' => 5, 'UpdatedAt' => 6, 'UpdatedBy' => 7, ),
		BasePeer::TYPE_COLNAME => array (AlquilerPeer::ID => 0, AlquilerPeer::ID_EQUIPAMIENTO => 1, AlquilerPeer::ID_FECHA_CARRERA => 2, AlquilerPeer::ID_USUARIO => 3, AlquilerPeer::CREATED_AT => 4, AlquilerPeer::CREATED_BY => 5, AlquilerPeer::UPDATED_AT => 6, AlquilerPeer::UPDATED_BY => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_equipamiento' => 1, 'id_fecha_carrera' => 2, 'id_usuario' => 3, 'created_at' => 4, 'created_by' => 5, 'updated_at' => 6, 'updated_by' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
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

		$criteria->addSelectColumn(AlquilerPeer::ID);

		$criteria->addSelectColumn(AlquilerPeer::ID_EQUIPAMIENTO);

		$criteria->addSelectColumn(AlquilerPeer::ID_FECHA_CARRERA);

		$criteria->addSelectColumn(AlquilerPeer::ID_USUARIO);

		$criteria->addSelectColumn(AlquilerPeer::CREATED_AT);

		$criteria->addSelectColumn(AlquilerPeer::CREATED_BY);

		$criteria->addSelectColumn(AlquilerPeer::UPDATED_AT);

		$criteria->addSelectColumn(AlquilerPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(alquiler.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT alquiler.ID)';

	
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

		$criteria->addJoin(AlquilerPeer::ID_EQUIPAMIENTO, InventarioPeer::ID);

		$rs = AlquilerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinFechaEtapaCarrera(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(AlquilerPeer::ID_FECHA_CARRERA, FechaEtapaCarreraPeer::ID);

		$rs = AlquilerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinUsuario(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(AlquilerPeer::ID_USUARIO, UsuarioPeer::ID);

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

		$c->addJoin(AlquilerPeer::ID_EQUIPAMIENTO, InventarioPeer::ID);
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


	
	public static function doSelectJoinFechaEtapaCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlquilerPeer::addSelectColumns($c);
		$startcol = (AlquilerPeer::NUM_COLUMNS - AlquilerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FechaEtapaCarreraPeer::addSelectColumns($c);

		$c->addJoin(AlquilerPeer::ID_FECHA_CARRERA, FechaEtapaCarreraPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlquilerPeer::getOMClass();

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


	
	public static function doSelectJoinUsuario(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlquilerPeer::addSelectColumns($c);
		$startcol = (AlquilerPeer::NUM_COLUMNS - AlquilerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UsuarioPeer::addSelectColumns($c);

		$c->addJoin(AlquilerPeer::ID_USUARIO, UsuarioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlquilerPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UsuarioPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUsuario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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

		$criteria->addJoin(AlquilerPeer::ID_EQUIPAMIENTO, InventarioPeer::ID);

		$criteria->addJoin(AlquilerPeer::ID_FECHA_CARRERA, FechaEtapaCarreraPeer::ID);

		$criteria->addJoin(AlquilerPeer::ID_USUARIO, UsuarioPeer::ID);

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

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FechaEtapaCarreraPeer::NUM_COLUMNS;

		UsuarioPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + UsuarioPeer::NUM_COLUMNS;

		$c->addJoin(AlquilerPeer::ID_EQUIPAMIENTO, InventarioPeer::ID);

		$c->addJoin(AlquilerPeer::ID_FECHA_CARRERA, FechaEtapaCarreraPeer::ID);

		$c->addJoin(AlquilerPeer::ID_USUARIO, UsuarioPeer::ID);

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


					
			$omClass = FechaEtapaCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFechaEtapaCarrera(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlquiler($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initAlquilers();
				$obj3->addAlquiler($obj1);
			}


					
			$omClass = UsuarioPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getUsuario(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addAlquiler($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initAlquilers();
				$obj4->addAlquiler($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptInventario(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(AlquilerPeer::ID_FECHA_CARRERA, FechaEtapaCarreraPeer::ID);

		$criteria->addJoin(AlquilerPeer::ID_USUARIO, UsuarioPeer::ID);

		$rs = AlquilerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptFechaEtapaCarrera(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(AlquilerPeer::ID_EQUIPAMIENTO, InventarioPeer::ID);

		$criteria->addJoin(AlquilerPeer::ID_USUARIO, UsuarioPeer::ID);

		$rs = AlquilerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptUsuario(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(AlquilerPeer::ID_EQUIPAMIENTO, InventarioPeer::ID);

		$criteria->addJoin(AlquilerPeer::ID_FECHA_CARRERA, FechaEtapaCarreraPeer::ID);

		$rs = AlquilerPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptInventario(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlquilerPeer::addSelectColumns($c);
		$startcol2 = (AlquilerPeer::NUM_COLUMNS - AlquilerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FechaEtapaCarreraPeer::NUM_COLUMNS;

		UsuarioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuarioPeer::NUM_COLUMNS;

		$c->addJoin(AlquilerPeer::ID_FECHA_CARRERA, FechaEtapaCarreraPeer::ID);

		$c->addJoin(AlquilerPeer::ID_USUARIO, UsuarioPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlquilerPeer::getOMClass();

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
					$temp_obj2->addAlquiler($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlquilers();
				$obj2->addAlquiler($obj1);
			}

			$omClass = UsuarioPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuario(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlquiler($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlquilers();
				$obj3->addAlquiler($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptFechaEtapaCarrera(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlquilerPeer::addSelectColumns($c);
		$startcol2 = (AlquilerPeer::NUM_COLUMNS - AlquilerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InventarioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InventarioPeer::NUM_COLUMNS;

		UsuarioPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + UsuarioPeer::NUM_COLUMNS;

		$c->addJoin(AlquilerPeer::ID_EQUIPAMIENTO, InventarioPeer::ID);

		$c->addJoin(AlquilerPeer::ID_USUARIO, UsuarioPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlquilerPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InventarioPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInventario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlquiler($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlquilers();
				$obj2->addAlquiler($obj1);
			}

			$omClass = UsuarioPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getUsuario(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlquiler($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlquilers();
				$obj3->addAlquiler($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptUsuario(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AlquilerPeer::addSelectColumns($c);
		$startcol2 = (AlquilerPeer::NUM_COLUMNS - AlquilerPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		InventarioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + InventarioPeer::NUM_COLUMNS;

		FechaEtapaCarreraPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + FechaEtapaCarreraPeer::NUM_COLUMNS;

		$c->addJoin(AlquilerPeer::ID_EQUIPAMIENTO, InventarioPeer::ID);

		$c->addJoin(AlquilerPeer::ID_FECHA_CARRERA, FechaEtapaCarreraPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AlquilerPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = InventarioPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getInventario(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAlquiler($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initAlquilers();
				$obj2->addAlquiler($obj1);
			}

			$omClass = FechaEtapaCarreraPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getFechaEtapaCarrera(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addAlquiler($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initAlquilers();
				$obj3->addAlquiler($obj1);
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

		$criteria->remove(AlquilerPeer::ID); 

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
			$comparison = $criteria->getComparison(AlquilerPeer::ID);
			$selectCriteria->add(AlquilerPeer::ID, $criteria->remove(AlquilerPeer::ID), $comparison);

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
			$criteria->add(AlquilerPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);

		$criteria->add(AlquilerPeer::ID, $pk);


		$v = AlquilerPeer::doSelect($criteria, $con);

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
			$criteria->add(AlquilerPeer::ID, $pks, Criteria::IN);
			$objs = AlquilerPeer::doSelect($criteria, $con);
		}
		return $objs;
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
