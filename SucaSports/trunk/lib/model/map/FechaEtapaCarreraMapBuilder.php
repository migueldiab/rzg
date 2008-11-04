<?php



class FechaEtapaCarreraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FechaEtapaCarreraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fecha_etapa_carrera');
		$tMap->setPhpName('FechaEtapaCarrera');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('FECHA_INICIO', 'FechaInicio', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID_ETAPA', 'IdEtapa', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID_CARRERA', 'IdCarrera', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MAX_CORREDORES', 'MaxCorredores', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECHA_FIN', 'FechaFin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('COSTO', 'Costo', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 