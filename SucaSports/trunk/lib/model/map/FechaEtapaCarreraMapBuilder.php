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

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_CARRERA', 'IdCarrera', 'int', CreoleTypes::INTEGER, 'etapa_carrera', 'ID', false, null);

		$tMap->addColumn('MAX_CORREDORES', 'MaxCorredores', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHA_FIN', 'FechaFin', 'int', CreoleTypes::DATE, false, null);

	} 
} 