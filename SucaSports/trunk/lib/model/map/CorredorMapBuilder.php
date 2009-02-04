<?php


/**
 * This class adds structure of 'corredor' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 02/04/09 01:14:04
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CorredorMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CorredorMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(CorredorPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CorredorPeer::TABLE_NAME);
		$tMap->setPhpName('Corredor');
		$tMap->setClassname('Corredor');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addColumn('DOCUMENTO', 'Documento', 'VARCHAR', false, 45);

		$tMap->addForeignKey('ID_TIPO_DOCUMENTO', 'IdTipoDocumento', 'INTEGER', 'tipo_documento', 'ID', false, 11);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 45);

		$tMap->addColumn('APELLIDO', 'Apellido', 'VARCHAR', false, 45);

		$tMap->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 45);

		$tMap->addColumn('MOVIL', 'Movil', 'VARCHAR', false, 45);

		$tMap->addColumn('TELEFONO_EMERGENCIA', 'TelefonoEmergencia', 'VARCHAR', false, 45);

		$tMap->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 45);

		$tMap->addColumn('FECHA_NACIMIENTO', 'FechaNacimiento', 'DATE', false, null);

		$tMap->addColumn('PAREJA', 'Pareja', 'VARCHAR', false, 45);

		$tMap->addColumn('HIJOS', 'Hijos', 'VARCHAR', false, 45);

		$tMap->addForeignKey('ID_SOCIEDAD_MEDICA', 'IdSociedadMedica', 'INTEGER', 'sociedad_medica', 'ID', false, 11);

		$tMap->addColumn('HISTORIA_MEDICA', 'HistoriaMedica', 'LONGVARCHAR', false, null);

		$tMap->addColumn('SEXO', 'Sexo', 'VARCHAR', false, 1);

		$tMap->addForeignKey('ID_LOCALIDAD', 'IdLocalidad', 'INTEGER', 'localidad', 'ID', false, 11);

		$tMap->addForeignKey('ID_PAIS', 'IdPais', 'INTEGER', 'pais', 'ID', false, 11);

		$tMap->addForeignKey('ID_CHIPS', 'IdChips', 'INTEGER', 'chip', 'ID', false, 11);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'INTEGER', false, 11);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'INTEGER', false, 11);

	} // doBuild()

} // CorredorMapBuilder
