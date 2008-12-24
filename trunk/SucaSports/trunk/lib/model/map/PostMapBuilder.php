<?php



class PostMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PostMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('post');
		$tMap->setPhpName('Post');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TEXTO', 'Texto', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'usuario', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'usuario', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('FECHA_ETAPA_CARRERA_FECHA_INICIO', 'FechaEtapaCarreraFechaInicio', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHA_ETAPA_CARRERA_ID_ETAPA', 'FechaEtapaCarreraIdEtapa', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECHA_ETAPA_CARRERA_ID_CARRERA', 'FechaEtapaCarreraIdCarrera', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 