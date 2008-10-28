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

		$tMap->addForeignPrimaryKey('ID_FECHA_ETAPA_CARRERA', 'IdFechaEtapaCarrera', 'int' , CreoleTypes::INTEGER, 'fecha_etapa_carrera', 'ID', true, null);

		$tMap->addForeignPrimaryKey('ID_TIPO_EQUIPAMIENTO', 'IdTipoEquipamiento', 'int' , CreoleTypes::INTEGER, 'tipo_equipamiento', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 