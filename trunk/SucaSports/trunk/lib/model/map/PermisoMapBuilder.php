<?php



class PermisoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PermisoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('permiso');
		$tMap->setPhpName('Permiso');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('PERMISO', 'Permiso', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addForeignPrimaryKey('GRUPOS_ID', 'GruposId', 'int' , CreoleTypes::INTEGER, 'grupo', 'ID', true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 