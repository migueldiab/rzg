<?php



class AsociacionCorredorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AsociacionCorredorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('asociacion_corredor');
		$tMap->setPhpName('AsociacionCorredor');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID_CORREDOR', 'IdCorredor', 'int' , CreoleTypes::INTEGER, 'corredor', 'ID', true, null);

		$tMap->addForeignPrimaryKey('ID_ASOCIACION', 'IdAsociacion', 'int' , CreoleTypes::INTEGER, 'asociacion', 'ID', true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 