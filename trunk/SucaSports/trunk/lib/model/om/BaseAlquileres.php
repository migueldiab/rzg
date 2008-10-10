<?php


abstract class BaseAlquileres extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_equipamiento;


	
	protected $id_fecha_carrera;

	
	protected $aInventario;

	
	protected $aFechaEtapaCarrera;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdEquipamiento()
	{

		return $this->id_equipamiento;
	}

	
	public function getIdFechaCarrera()
	{

		return $this->id_fecha_carrera;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlquileresPeer::ID;
		}

	} 
	
	public function setIdEquipamiento($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_equipamiento !== $v) {
			$this->id_equipamiento = $v;
			$this->modifiedColumns[] = AlquileresPeer::ID_EQUIPAMIENTO;
		}

		if ($this->aInventario !== null && $this->aInventario->getId() !== $v) {
			$this->aInventario = null;
		}

	} 
	
	public function setIdFechaCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_fecha_carrera !== $v) {
			$this->id_fecha_carrera = $v;
			$this->modifiedColumns[] = AlquileresPeer::ID_FECHA_CARRERA;
		}

		if ($this->aFechaEtapaCarrera !== null && $this->aFechaEtapaCarrera->getId() !== $v) {
			$this->aFechaEtapaCarrera = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_equipamiento = $rs->getInt($startcol + 1);

			$this->id_fecha_carrera = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Alquileres object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlquileresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AlquileresPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlquileresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aInventario !== null) {
				if ($this->aInventario->isModified()) {
					$affectedRows += $this->aInventario->save($con);
				}
				$this->setInventario($this->aInventario);
			}

			if ($this->aFechaEtapaCarrera !== null) {
				if ($this->aFechaEtapaCarrera->isModified()) {
					$affectedRows += $this->aFechaEtapaCarrera->save($con);
				}
				$this->setFechaEtapaCarrera($this->aFechaEtapaCarrera);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlquileresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += AlquileresPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aInventario !== null) {
				if (!$this->aInventario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInventario->getValidationFailures());
				}
			}

			if ($this->aFechaEtapaCarrera !== null) {
				if (!$this->aFechaEtapaCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFechaEtapaCarrera->getValidationFailures());
				}
			}


			if (($retval = AlquileresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlquileresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdEquipamiento();
				break;
			case 2:
				return $this->getIdFechaCarrera();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlquileresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdEquipamiento(),
			$keys[2] => $this->getIdFechaCarrera(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlquileresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdEquipamiento($value);
				break;
			case 2:
				$this->setIdFechaCarrera($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlquileresPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdEquipamiento($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdFechaCarrera($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlquileresPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlquileresPeer::ID)) $criteria->add(AlquileresPeer::ID, $this->id);
		if ($this->isColumnModified(AlquileresPeer::ID_EQUIPAMIENTO)) $criteria->add(AlquileresPeer::ID_EQUIPAMIENTO, $this->id_equipamiento);
		if ($this->isColumnModified(AlquileresPeer::ID_FECHA_CARRERA)) $criteria->add(AlquileresPeer::ID_FECHA_CARRERA, $this->id_fecha_carrera);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlquileresPeer::DATABASE_NAME);

		$criteria->add(AlquileresPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdEquipamiento($this->id_equipamiento);

		$copyObj->setIdFechaCarrera($this->id_fecha_carrera);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlquileresPeer();
		}
		return self::$peer;
	}

	
	public function setInventario($v)
	{


		if ($v === null) {
			$this->setIdEquipamiento(NULL);
		} else {
			$this->setIdEquipamiento($v->getId());
		}


		$this->aInventario = $v;
	}


	
	public function getInventario($con = null)
	{
		if ($this->aInventario === null && ($this->id_equipamiento !== null)) {
						$this->aInventario = InventarioPeer::retrieveByPK($this->id_equipamiento, $con);

			
		}
		return $this->aInventario;
	}

	
	public function setFechaEtapaCarrera($v)
	{


		if ($v === null) {
			$this->setIdFechaCarrera(NULL);
		} else {
			$this->setIdFechaCarrera($v->getId());
		}


		$this->aFechaEtapaCarrera = $v;
	}


	
	public function getFechaEtapaCarrera($con = null)
	{
		if ($this->aFechaEtapaCarrera === null && ($this->id_fecha_carrera !== null)) {
						$this->aFechaEtapaCarrera = FechaEtapaCarreraPeer::retrieveByPK($this->id_fecha_carrera, $con);

			
		}
		return $this->aFechaEtapaCarrera;
	}

} 