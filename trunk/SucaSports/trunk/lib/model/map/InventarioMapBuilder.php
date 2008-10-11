<?php



class InventarioMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InventarioMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inventario');
		$tMap->setPhpName('Inventario');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addForeignKey('ID_TIPO_EQUIPAMIENTO', 'IdTipoEquipamiento', 'int', CreoleTypes::INTEGER, 'equipamiento', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('ID_ESTADO', 'IdEstado', 'int', CreoleTypes::INTEGER, 'estado', 'ID', false, null);

	} 
} 