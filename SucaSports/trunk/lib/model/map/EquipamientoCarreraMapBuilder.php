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

		$tMap->addForeignPrimaryKey('ID_CARRERA', 'IdCarrera', 'int' , CreoleTypes::INTEGER, 'fecha_etapa_carrera', 'ID', true, null);

		$tMap->addForeignKey('ID_TIPO_EQUIPAMIENTO', 'IdTipoEquipamiento', 'int', CreoleTypes::INTEGER, 'tipo_equipamiento', 'ID', false, null);

	} 
} 