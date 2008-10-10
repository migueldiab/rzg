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

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_CORREDOR', 'IdCorredor', 'int', CreoleTypes::INTEGER, 'corredor', 'ID', false, null);

		$tMap->addForeignKey('ID_FORMA_PAGO', 'IdFormaPago', 'int', CreoleTypes::INTEGER, 'forma_pago', 'ID', false, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::DOUBLE, false, null);

	} 
} 