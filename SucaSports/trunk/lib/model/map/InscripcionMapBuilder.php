<?php



class InscripcionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InscripcionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inscripcion');
		$tMap->setPhpName('Inscripcion');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_CARRERA', 'IdCarrera', 'int', CreoleTypes::INTEGER, 'fecha_etapa_carrera', 'ID', true, null);

		$tMap->addForeignKey('ID_CORREDOR', 'IdCorredor', 'int', CreoleTypes::INTEGER, 'corredor', 'ID', true, null);

	} 
} 