<?php



class EquipamientoCarreraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EquipamientoCarreraMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('equipamiento_carrera');
		$tMap->setPhpName('EquipamientoCarrera');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID_TIPO_EQUIPAMIENTO', 'IdTipoEquipamiento', 'int' , CreoleTypes::INTEGER, 'tipo_equipamiento', 'ID', true, null);

		$tMap->addPrimaryKey('FECHA_INICIO', 'FechaInicio', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID_ETAPA', 'IdEtapa', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID_CARRERA', 'IdCarrera', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 