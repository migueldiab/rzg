<?php


/**
 * This class adds structure of 'categoria_carrera' table to 'propel' DatabaseMap object.
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
class CategoriaCarreraMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CategoriaCarreraMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(CategoriaCarreraPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CategoriaCarreraPeer::TABLE_NAME);
		$tMap->setPhpName('CategoriaCarrera');
		$tMap->setClassname('CategoriaCarrera');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('ID_CATEGORIA', 'IdCategoria', 'INTEGER' , 'categoria', 'ID', true, 11);

		$tMap->addForeignPrimaryKey('ID_CARRERA', 'IdCarrera', 'INTEGER' , 'carrera', 'ID', true, 11);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_BY', 'UpdatedBy', 'INTEGER', false, 11);

	} // doBuild()

} // CategoriaCarreraMapBuilder
