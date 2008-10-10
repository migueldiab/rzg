<?php



class UsuariosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UsuariosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('usuarios');
		$tMap->setPhpName('Usuarios');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addForeignKey('ID_GRUPOS', 'IdGrupos', 'int', CreoleTypes::INTEGER, 'grupos', 'ID', false, null);

	} 
} 