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

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID_ETAPA', 'IdEtapa', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignPrimaryKey('ID_CARRERA', 'IdCarrera', 'int' , CreoleTypes::INTEGER, 'carrera', 'ID', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('NUMERO_ETAPA', 'NumeroEtapa', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 