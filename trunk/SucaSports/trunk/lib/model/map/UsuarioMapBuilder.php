<?php



class UsuarioMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UsuarioMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('usuario');
		$tMap->setPhpName('Usuario');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DOCUMENTO', 'Documento', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addForeignKey('ID_GRUPO', 'IdGrupo', 'int', CreoleTypes::INTEGER, 'grupo', 'ID', false, null);

		$tMap->addForeignKey('ID_CORREDOR', 'IdCorredor', 'int', CreoleTypes::INTEGER, 'corredor', 'ID', false, null);

		$tMap->addColumn('ESTADO', 'Estado', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addColumn('VERIFICADOR', 'Verificador', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PREGUNTA_SECRETA', 'PreguntaSecreta', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('RESPUESTA_SECRETA', 'RespuestaSecreta', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 