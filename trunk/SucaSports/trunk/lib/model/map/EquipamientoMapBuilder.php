<?php



class EquipamientoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EquipamientoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('equipamiento');
		$tMap->setPhpName('Equipamiento');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MARCA', 'Marca', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addForeignKey('ID_TIPO_EQUIPAMIENTO', 'IdTipoEquipamiento', 'int', CreoleTypes::INTEGER, 'tipo_equipamiento', 'ID', false, null);

	} 
} 