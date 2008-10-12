<?php


abstract class BaseCorredorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'corredor';

	
	const CLASS_DEFAULT = 'lib.model.Corredor';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'corredor.ID';

	
	const DOCUMENTO = 'corredor.DOCUMENTO';

	
	const ID_TIPO_DOCUMENTO = 'corredor.ID_TIPO_DOCUMENTO';

	
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

	
	const UPDATED_AT = 'corredor.UPDATED_AT';

	
	const UPDATED_BY = 'corredor.UPDATED_BY';

	
	const CREATED_AT = 'corredor.CREATED_AT';

	
	const CREATED_BY = 'corredor.CREATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Documento', 'IdTipoDocumento', 'Nombre', 'Apellido', 'Telefono', 'Movil', 'TelefonoEmergencia', 'Direccion', 'FechaNacimiento', 'Pareja', 'Hijos', 'IdSociedadMedica', 'HistoriaMedica', 'Sexo', 'IdLocalidad', 'IdPais', 'IdChips', 'UpdatedAt', 'UpdatedBy', 'CreatedAt', 'CreatedBy', ),
		BasePeer::TYPE_COLNAME => array (CorredorPeer::ID, CorredorPeer::DOCUMENTO, CorredorPeer::ID_TIPO_DOCUMENTO, CorredorPeer::NOMBRE, CorredorPeer::APELLIDO, CorredorPeer::TELEFONO, CorredorPeer::MOVIL, CorredorPeer::TELEFONO_EMERGENCIA, CorredorPeer::DIRECCION, CorredorPeer::FECHA_NACIMIENTO, CorredorPeer::PAREJA, CorredorPeer::HIJOS, CorredorPeer::ID_SOCIEDAD_MEDICA, CorredorPeer::HISTORIA_MEDICA, CorredorPeer::SEXO, CorredorPeer::ID_LOCALIDAD, CorredorPeer::ID_PAIS, CorredorPeer::ID_CHIPS, CorredorPeer::UPDATED_AT, CorredorPeer::UPDATED_BY, CorredorPeer::CREATED_AT, CorredorPeer::CREATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'documento', 'id_tipo_documento', 'nombre', 'apellido', 'telefono', 'movil', 'telefono_emergencia', 'direccion', 'fecha_nacimiento', 'pareja', 'hijos', 'id_sociedad_medica', 'historia_medica', 'sexo', 'id_localidad', 'id_pais', 'id_chips', 'updated_at', 'updated_by', 'created_at', 'created_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Documento' => 1, 'IdTipoDocumento' => 2, 'Nombre' => 3, 'Apellido' => 4, 'Telefono' => 5, 'Movil' => 6, 'TelefonoEmergencia' => 7, 'Direccion' => 8, 'FechaNacimiento' => 9, 'Pareja' => 10, 'Hijos' => 11, 'IdSociedadMedica' => 12, 'HistoriaMedica' => 13, 'Sexo' => 14, 'IdLocalidad' => 15, 'IdPais' => 16, 'IdChips' => 17, 'UpdatedAt' => 18, 'UpdatedBy' => 19, 'CreatedAt' => 20, 'CreatedBy' => 21, ),
		BasePeer::TYPE_COLNAME => array (CorredorPeer::ID => 0, CorredorPeer::DOCUMENTO => 1, CorredorPeer::ID_TIPO_DOCUMENTO => 2, CorredorPeer::NOMBRE => 3, CorredorPeer::APELLIDO => 4, CorredorPeer::TELEFONO => 5, CorredorPeer::MOVIL => 6, CorredorPeer::TELEFONO_EMERGENCIA => 7, CorredorPeer::DIRECCION => 8, CorredorPeer::FECHA_NACIMIENTO => 9, CorredorPeer::PAREJA => 10, CorredorPeer::HIJOS => 11, CorredorPeer::ID_SOCIEDAD_MEDICA => 12, CorredorPeer::HISTORIA_MEDICA => 13, CorredorPeer::SEXO => 14, CorredorPeer::ID_LOCALIDAD => 15, CorredorPeer::ID_PAIS => 16, CorredorPeer::ID_CHIPS => 17, CorredorPeer::UPDATED_AT => 18, CorredorPeer::UPDATED_BY => 19, CorredorPeer::CREATED_AT => 20, CorredorPeer::CREATED_BY => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'documento' => 1, 'id_tipo_documento' => 2, 'nombre' => 3, 'apellido' => 4, 'telefono' => 5, 'movil' => 6, 'telefono_emergencia' => 7, 'direccion' => 8, 'fecha_nacimiento' => 9, 'pareja' => 10, 'hijos' => 11, 'id_sociedad_medica' => 12, 'historia_medica' => 13, 'sexo' => 14, 'id_localidad' => 15, 'id_pais' => 16, 'id_chips' => 17, 'updated_at' => 18, 'updated_by' => 19, 'created_at' => 20, 'created_by' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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

		$criteria->addSelectColumn(CorredorPeer::DOCUMENTO);

		$criteria->addSelectColumn(CorredorPeer::ID_TIPO_DOCUMENTO);

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

		$criteria->addSelectColumn(CorredorPeer::UPDATED_AT);

		$criteria->addSelectColumn(CorredorPeer::UPDATED_BY);

		$criteria->addSelectColumn(CorredorPeer::CREATED_AT);

		$criteria->addSelectColumn(CorredorPeer::CREATED_BY);

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

	
	public static function doCountJoinTipoDocumento(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
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


	
	public static function doCountJoinChip(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTipoDocumento(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TipoDocumentoPeer::addSelectColumns($c);

		$c->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoDocumentoPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTipoDocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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


	
	public static function doSelectJoinChip(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ChipPeer::addSelectColumns($c);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ChipPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getChip(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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

		$criteria->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);

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

		TipoDocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipoDocumentoPeer::NUM_COLUMNS;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SociedadMedicaPeer::NUM_COLUMNS;

		LocalidadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LocalidadPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaisPeer::NUM_COLUMNS;

		ChipPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ChipPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TipoDocumentoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipoDocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}


					
			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}


					
			$omClass = LocalidadPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLocalidad(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}


					
			$omClass = PaisPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getPais(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addCorredor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initCorredors();
				$obj5->addCorredor($obj1);
			}


					
			$omClass = ChipPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getChip(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
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


	
	public static function doCountJoinAllExceptTipoDocumento(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
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

		$criteria->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);

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

		$criteria->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);

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

		$criteria->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptChip(Criteria $criteria, $distinct = false, $con = null)
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

		$criteria->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$criteria->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$rs = CorredorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptTipoDocumento(Criteria $c, $con = null)
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

		ChipPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ChipPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);


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

			$omClass = ChipPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getChip(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
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


	
	public static function doSelectJoinAllExceptSociedadMedica(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol2 = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipoDocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipoDocumentoPeer::NUM_COLUMNS;

		LocalidadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LocalidadPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PaisPeer::NUM_COLUMNS;

		ChipPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ChipPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoDocumentoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipoDocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
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

			$omClass = ChipPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getChip(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
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

		TipoDocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipoDocumentoPeer::NUM_COLUMNS;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SociedadMedicaPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + PaisPeer::NUM_COLUMNS;

		ChipPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ChipPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoDocumentoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipoDocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}

			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
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

			$omClass = ChipPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getChip(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
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

		TipoDocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipoDocumentoPeer::NUM_COLUMNS;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SociedadMedicaPeer::NUM_COLUMNS;

		LocalidadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LocalidadPeer::NUM_COLUMNS;

		ChipPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ChipPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_CHIPS, ChipPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoDocumentoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipoDocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}

			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}

			$omClass = LocalidadPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLocalidad(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}

			$omClass = ChipPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getChip(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
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


	
	public static function doSelectJoinAllExceptChip(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CorredorPeer::addSelectColumns($c);
		$startcol2 = (CorredorPeer::NUM_COLUMNS - CorredorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TipoDocumentoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TipoDocumentoPeer::NUM_COLUMNS;

		SociedadMedicaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SociedadMedicaPeer::NUM_COLUMNS;

		LocalidadPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LocalidadPeer::NUM_COLUMNS;

		PaisPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + PaisPeer::NUM_COLUMNS;

		$c->addJoin(CorredorPeer::ID_TIPO_DOCUMENTO, TipoDocumentoPeer::ID);

		$c->addJoin(CorredorPeer::ID_SOCIEDAD_MEDICA, SociedadMedicaPeer::ID);

		$c->addJoin(CorredorPeer::ID_LOCALIDAD, LocalidadPeer::ID);

		$c->addJoin(CorredorPeer::ID_PAIS, PaisPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CorredorPeer::getOMClass();

			$cls = sfPropel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TipoDocumentoPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTipoDocumento(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initCorredors();
				$obj2->addCorredor($obj1);
			}

			$omClass = SociedadMedicaPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSociedadMedica(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initCorredors();
				$obj3->addCorredor($obj1);
			}

			$omClass = LocalidadPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLocalidad(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addCorredor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initCorredors();
				$obj4->addCorredor($obj1);
			}

			$omClass = PaisPeer::getOMClass();


			$cls = sfPropel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getPais(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
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

		$criteria->remove(CorredorPeer::ID); 

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
			$criteria->add(CorredorPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(CorredorPeer::DATABASE_NAME);

		$criteria->add(CorredorPeer::ID, $pk);


		$v = CorredorPeer::doSelect($criteria, $con);

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
			$criteria->add(CorredorPeer::ID, $pks, Criteria::IN);
			$objs = CorredorPeer::doSelect($criteria, $con);
		}
		return $objs;
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
