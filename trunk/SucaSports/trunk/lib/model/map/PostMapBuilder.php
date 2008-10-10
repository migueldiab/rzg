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

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TEXTO', 'Texto', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addForeignKey('ID_USUARIOS', 'IdUsuarios', 'int', CreoleTypes::INTEGER, 'usuarios', 'ID', false, null);

	} 
} 