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

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_CARRERA', 'IdCarrera', 'int', CreoleTypes::INTEGER, 'fecha_etapa_carrera', 'ID', true, null);

		$tMap->addForeignKey('ID_CORREDOR', 'IdCorredor', 'int', CreoleTypes::INTEGER, 'corredor', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECHA_INSCRIPCION', 'FechaInscripcion', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FIRMA_DIGITAL', 'FirmaDigital', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addForeignKey('CUENTA_CORRIENTE_ID', 'CuentaCorrienteId', 'int', CreoleTypes::INTEGER, 'cuenta_corriente', 'ID', false, null);

	} 
} 