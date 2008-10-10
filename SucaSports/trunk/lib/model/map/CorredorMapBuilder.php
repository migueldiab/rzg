<?php



class CorredorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CorredorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('corredor');
		$tMap->setPhpName('Corredor');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TIPO_DOCUMENTO', 'TipoDocumento', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('APELLIDO', 'Apellido', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('MOVIL', 'Movil', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('TELEFONO_EMERGENCIA', 'TelefonoEmergencia', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PAREJA', 'Pareja', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('HIJOS', 'Hijos', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addForeignKey('ID_SOCIEDAD_MEDICA', 'IdSociedadMedica', 'int', CreoleTypes::INTEGER, 'sociedad_medica', 'ID', false, null);

		$tMap->addColumn('HISTORIA_MEDICA', 'HistoriaMedica', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SEXO', 'Sexo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addForeignKey('ID_LOCALIDAD', 'IdLocalidad', 'int', CreoleTypes::INTEGER, 'localidad', 'ID', false, null);

		$tMap->addForeignKey('ID_PAIS', 'IdPais', 'int', CreoleTypes::INTEGER, 'pais', 'ID', false, null);

		$tMap->addForeignKey('ID_CHIPS', 'IdChips', 'int', CreoleTypes::INTEGER, 'chips', 'ID', false, null);

		$tMap->addForeignPrimaryKey('ID_USUARIO', 'IdUsuario', 'int' , CreoleTypes::INTEGER, 'usuarios', 'ID', true, null);

	} 
} 