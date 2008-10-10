<?php



class ResultadosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ResultadosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('resultados');
		$tMap->setPhpName('Resultados');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_FECHA_CARRERA', 'IdFechaCarrera', 'int', CreoleTypes::INTEGER, 'fecha_etapa_carrera', 'ID', false, null);

	} 
} 