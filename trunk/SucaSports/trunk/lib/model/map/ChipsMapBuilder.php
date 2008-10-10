<?php



class ChipsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ChipsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('chips');
		$tMap->setPhpName('Chips');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODIGO_CHIP', 'CodigoChip', 'string', CreoleTypes::VARCHAR, false, 45);

	} 
} 