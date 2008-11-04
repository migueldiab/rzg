<?php



class AlquilerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AlquilerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('alquiler');
		$tMap->setPhpName('Alquiler');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID_INVENTARIO', 'IdInventario', 'int' , CreoleTypes::INTEGER, 'inventario', 'ID', true, null);

		$tMap->addPrimaryKey('FECHA_INICIO', 'FechaInicio', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID_ETAPA', 'IdEtapa', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID_CARRERA', 'IdCarrera', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID_CUENTA_CORRIENTE', 'IdCuentaCorriente', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID_CORREDOR', 'IdCorredor', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 