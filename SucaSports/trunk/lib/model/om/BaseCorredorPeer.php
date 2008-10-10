<?php


abstract class BaseCorredorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'corredor';

	
	const CLASS_DEFAULT = 'lib.model.Corredor';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'corredor.ID';

	
	const TIPO_DOCUMENTO = 'corredor.TIPO_DOCUMENTO';

	
	const NOMBRE = 'corredor.NOMBRE';

	
	const APELLIDO = 'corredor.APELLIDO';

	
	const TELEFONO = 'corredor.TELEFONO';

	
	const MOVIL = 'corredor.MOVIL';

	
	const TELEFONO_EMERGENCIA = 'corredor.TELEFONO_EMERGENCIA';

	
	const DIRECCION = 'corredor.DIRECCION';

	
	const FECHA_NACIMIENTO = 'corredor.FECHA_NACIMIENTO';

	
	const PAREJA = 'corredor.PAREJA';

	
	const HIJOS = 'corredor.HIJOS';

	
	const ID_SOCIEDAD_MEDICA = 'corredor.ID_SOCIEDAD_MEDICA';

	
	const HISTORIA_MEDICA = 'corredor.HISTORIA_MEDICA';

	
	const SEXO = 'corredor.SEXO';

	
	const ID_LOCALIDAD = 'corredor.ID_LOCALIDAD';

	
	const ID_PAIS = 'corredor.ID_PAIS';

	
	const ID_CHIPS = 'corredor.ID_CHIPS';

	
	const ID_USUARIO = 'corredor.ID_USUARIO';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'TipoDocumento', 'Nombre', 'Apellido', 'Telefono', 'Movil', 'TelefonoEmergencia', 'Direccion', 'FechaNacimiento', 'Pareja', 'Hijos', 'IdSociedadMedica', 'HistoriaMedica', 'Sexo', 'IdLocalidad', 'IdPais', 'IdChips', 'IdUsuario', ),
		BasePeer::TYPE_COLNAME => array (CorredorPeer::ID, CorredorPeer::TIPO_DOCUMENTO, CorredorPeer::NOMBRE, CorredorPeer::APELLIDO, CorredorPeer::TELEFONO, CorredorPeer::MOVIL, CorredorPeer::TELEFONO_EMERGENCIA, CorredorPeer::DIRECCION, CorredorPeer::FECHA_NACIMIENTO, CorredorPeer::PAREJA, CorredorPeer::HIJOS, CorredorPeer::ID_SOCIEDAD_MEDICA, CorredorPeer::HISTORIA_MEDICA, CorredorPeer::SEXO, CorredorPeer::ID_LOCALIDAD, CorredorPeer::ID_PAIS, CorredorPeer::ID_CHIPS, CorredorPeer::ID_USUARIO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'tipo_documento', 'nombre', 'apellido', 'telefono', 'movil', 'telefono_emergencia', 'direccion', 'fecha_nacimiento', 'pareja', 'hijos', 'id_sociedad_medica', 'historia_medica', 'sexo', 'id_localidad', 'id_pais', 'id_chips', 'id_usuario', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'TipoDocumento' => 1, 'Nombre' => 2, 'Apellido' => 3, 'Telefono' => 4, 'Movil' => 5, 'TelefonoEmergencia' => 6, 'Direccion' => 7, 'FechaNacimiento' => 8, 'Pareja' => 9, 'Hijos' => 10, 'IdSociedadMedica' => 11, 'HistoriaMedica' => 12, 'Sexo' => 13, 'IdLocalidad' => 14, 'IdPais' => 15, 'IdChips' => 16, 'IdUsuario' => 17, ),
		BasePeer::TYPE_COLNAME => array (CorredorPeer::ID => 0, CorredorPeer::TIPO_DOCUMENTO => 1, CorredorPeer::NOMBRE => 2, CorredorPeer::APELLIDO => 3, CorredorPeer::TELEFONO => 4, CorredorPeer::MOVIL => 5, CorredorPeer::TELEFONO_EMERGENCIA => 6, CorredorPeer::DIRECCION => 7, CorredorPeer::FECHA_NACIMIENTO => 8, CorredorPeer::PAREJA => 9, CorredorPeer::HIJOS => 10, CorredorPeer::ID_SOCIEDAD_MEDICA => 11, CorredorPeer::HISTORIA_MEDICA => 12, CorredorPeer::SEXO => 13, CorredorPeer::ID_LOCALIDAD => 14, CorredorPeer::ID_PAIS => 15, CorredorPeer::ID_CHIPS => 16, CorredorPeer::ID_USUARIO => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'tipo_documento' => 1, 'nombre' => 2, 'apellido' => 3, 'telefono' => 4, 'movil' => 5, 'telefono_emergencia' => 6, 'direccion' => 7, 'fecha_nacimiento' => 8, 'pareja' => 9, 'hijos' => 10, 'id_sociedad_medica' => 11, 'historia_medica' => 12, 'sexo' => 13, 'id_localidad' => 14, 'id_pais' => 15, 'id_chips' => 16, 'id_usuario' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		return BasePeer::getMapBuilder('lib.model.map.CorredorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CorredorPeer::getTableMap();
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
		return str_replace(CorredorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CorredorPeer::ID);

		$criteria->addSelectColumn(CorredorPeer::TIPO_DOCUMENTO);

		$criteria->addSelectColumn(CorredorPeer::NOMBRE);

		$criteria->addSelectColumn(CorredorPeer::APELLIDO);

		$criteria->addSelectColumn(CorredorPeer::TELEFONO);

		$criteria->addSelectColumn(CorredorPeer::MOVIL);

		$criteria->addSelectColumn(CorredorPeer::TELEFONO_EMERGENCIA);

		$criteria->addSelectColumn(CorredorPeer::DIRECCION);

		$criteria->addSelectColumn(CorredorPeer::FECHA_NACIMIENTO);

		$criteria->addSelectColumn(CorredorPeer::PAREJA);

		$criteria->addSelectColumn(CorredorPeer::HIJOS);

		$criteria->addSelectColumn(CorredorPeer::ID_SOCIEDAD_MEDICA);

		$criteria->addSelectColumn(CorredorPeer::HISTORIA_MEDICA);

		$criteria->addSelectColumn(CorredorPeer::SEXO);

		$criteria->addSelectColumn(CorredorPeer::ID_LOCALIDAD);

		$criteria->addSelectColumn(CorredorPeer::ID_PAIS);

		$criteria->addSelectColumn(CorredorPeer::ID_CHIPS);

		$criteria->addSelectColumn(CorredorPeer::ID_USUARIO);

	}

	const COUNT = 'COUNT(corredor.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT corredor.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CorredorPeer::doSelectRS($criteria, $con);
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
		$objects = CorredorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CorredorPeer::populateObjects(CorredorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CorredorPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CorredorPeer::getOMClass();
		$cls = sfPropel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinSociedadMedica(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLocalidad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinPais(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinChips(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinUsuarios(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinSociedadMedica(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SociedadMedicaPeer::addSelectColumns($c);

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SociedadMedicaPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCorredor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLocalidad(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LocalidadPeer::addSelectColumns($c);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LocalidadPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLocalidad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCorredor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinPais(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PaisPeer::addSelectColumns($c);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PaisPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPais(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCorredor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinChips(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ChipsPeer::addSelectColumns($c);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ChipsPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getChips(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCorredor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinUsuarios(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UsuariosPeer::addSelectColumns($c);

		$c->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UsuariosPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUsuarios(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCorredor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
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

		CorredorPeer::addSelectColumns($c);
		$startcol2 = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SociedadMedicaPeer::NUM_COLUMNS;

		LocalidadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LocalidadPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PaisPeer::NUM_COLUMNS;

		ChipsPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ChipsPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + UsuariosPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$c->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}


					
			$omClass = LocalidadPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLocalidad(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}


					
			$omClass = PaisPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPais(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}


					
			$omClass = ChipsPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getChips(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCorredors();
				$obj5->addCorredor($obj1);
			}


					
			$omClass = UsuariosPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getUsuarios(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initCorredors();
				$obj6->addCorredor($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptSociedadMedica(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLocalidad(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptPais(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptChips(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptUsuarios(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CorredorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CorredorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptSociedadMedica(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol2 = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LocalidadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LocalidadPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PaisPeer::NUM_COLUMNS;

		ChipsPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ChipsPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + UsuariosPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$c->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LocalidadPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLocalidad(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPais(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}

			$omClass = ChipsPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getChips(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}

			$omClass = UsuariosPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getUsuarios(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCorredors();
				$obj5->addCorredor($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLocalidad(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol2 = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SociedadMedicaPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + PaisPeer::NUM_COLUMNS;

		ChipsPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ChipsPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + UsuariosPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$c->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getPais(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}

			$omClass = ChipsPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getChips(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}

			$omClass = UsuariosPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getUsuarios(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCorredors();
				$obj5->addCorredor($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptPais(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol2 = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SociedadMedicaPeer::NUM_COLUMNS;

		LocalidadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LocalidadPeer::NUM_COLUMNS;

		ChipsPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ChipsPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + UsuariosPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);

		$c->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}

			$omClass = LocalidadPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLocalidad(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}

			$omClass = ChipsPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getChips(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}

			$omClass = UsuariosPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getUsuarios(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCorredors();
				$obj5->addCorredor($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptChips(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol2 = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SociedadMedicaPeer::NUM_COLUMNS;

		LocalidadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LocalidadPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PaisPeer::NUM_COLUMNS;

		UsuariosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + UsuariosPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_USUARIO, UsuariosPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}

			$omClass = LocalidadPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLocalidad(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPais(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}

			$omClass = UsuariosPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getUsuarios(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCorredors();
				$obj5->addCorredor($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptUsuarios(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol2 = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SociedadMedicaPeer::NUM_COLUMNS;

		LocalidadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LocalidadPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PaisPeer::NUM_COLUMNS;

		ChipsPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ChipsPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipsPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}

			$omClass = LocalidadPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLocalidad(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getPais(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}

			$omClass = ChipsPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getChips(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initCorredors();
				$obj5->addCorredor($obj1);
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
		return CorredorPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CorredorPeer::ID);
			$selectCriteria->add(CorredorPeer::ID, $criteria->remove(CorredorPeer::ID), $comparison);

			$comparison = $criteria->getComparison(CorredorPeer::ID_USUARIO);
			$selectCriteria->add(CorredorPeer::ID_USUARIO, $criteria->remove(CorredorPeer::ID_USUARIO), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CorredorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CorredorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Corredor) {

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

			$criteria->add(CorredorPeer::ID, $vals[0], Criteria::IN);
			$criteria->add(CorredorPeer::ID_USUARIO, $vals[1], Criteria::IN);
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

	
	public static function doValidate(Corredor $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CorredorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CorredorPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CorredorPeer::DATABASE_NAME, CorredorPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CorredorPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $id, $id_usuario, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(CorredorPeer::ID, $id);
		$criteria->add(CorredorPeer::ID_USUARIO, $id_usuario);
		$v = CorredorPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseCorredorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			Propel::registerMapBuilder('lib.model.map.CorredorMapBuilder');
}
