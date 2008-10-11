<?php



class CategoriaCarreraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CategoriaCarreraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('categoria_carrera');
		$tMap->setPhpName('CategoriaCarrera');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID_CATEGORIA', 'IdCategoria', 'int' , CreoleTypes::INTEGER, 'categoria', 'ID', true, null);

		$tMap->addForeignKey('ID_CARRERA', 'IdCarrera', 'int', CreoleTypes::INTEGER, 'carrera', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 