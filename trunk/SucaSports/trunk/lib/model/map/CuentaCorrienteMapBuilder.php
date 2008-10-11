<?php



class CuentaCorrienteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CuentaCorrienteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cuenta_corriente');
		$tMap->setPhpName('CuentaCorriente');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_CORREDOR', 'IdCorredor', 'int', CreoleTypes::INTEGER, 'corredor', 'ID', true, null);

		$tMap->addForeignKey('ID_FORMA_PAGO', 'IdFormaPago', 'int', CreoleTypes::INTEGER, 'forma_pago', 'ID', true, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::DOUBLE, true, null);

		$tMap->addColumn('CONCEPTO', 'Concepto', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('FIRMA_DIGITAL', 'FirmaDigital', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FECHA_DE_PAGO', 'FechaDePago', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOTA', 'Nota', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 