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

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_EQUIPAMIENTO', 'IdEquipamiento', 'int', CreoleTypes::INTEGER, 'inventario', 'ID', true, null);

		$tMap->addForeignKey('ID_FECHA_ETAPA_CARRERA', 'IdFechaEtapaCarrera', 'int', CreoleTypes::INTEGER, 'fecha_etapa_carrera', 'ID', true, null);

		$tMap->addForeignKey('ID_USUARIO', 'IdUsuario', 'int', CreoleTypes::INTEGER, 'usuario', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 