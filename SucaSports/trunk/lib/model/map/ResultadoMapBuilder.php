<?php



class ResultadoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ResultadoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('resultado');
		$tMap->setPhpName('Resultado');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID_FECHA_ETAPA_CARRERA', 'IdFechaEtapaCarrera', 'int' , CreoleTypes::INTEGER, 'fecha_etapa_carrera', 'ID', true, null);

		$tMap->addForeignPrimaryKey('ID_CORREDOR', 'IdCorredor', 'int' , CreoleTypes::INTEGER, 'corredor', 'ID', true, null);

		$tMap->addColumn('TIEMPO', 'Tiempo', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 