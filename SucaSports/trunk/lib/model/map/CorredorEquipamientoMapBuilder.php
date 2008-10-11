<?php



class CorredorEquipamientoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CorredorEquipamientoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('corredor_equipamiento');
		$tMap->setPhpName('CorredorEquipamiento');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID_CORREDOR', 'IdCorredor', 'int' , CreoleTypes::INTEGER, 'corredor', 'ID', true, null);

		$tMap->addForeignPrimaryKey('ID_EQUIPAMIENTO', 'IdEquipamiento', 'int' , CreoleTypes::INTEGER, 'equipamiento', 'ID', true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 