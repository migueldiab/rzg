<?php



class EtapaCarreraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EtapaCarreraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('etapa_carrera');
		$tMap->setPhpName('EtapaCarrera');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('NUMERO_ETAPA', 'NumeroEtapa', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('ID_ETAPA', 'IdEtapa', 'int', CreoleTypes::INTEGER, 'carrera', 'ID', false, null);

	} 
} 