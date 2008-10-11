<?php


abstract class BaseEquipamientoCarrera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_carrera;


	
	protected $id_tipo_equipamiento;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aFechaEtapaCarrera;

	
	protected $aTipoEquipamiento;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdCarrera()
	{

		return $this->id_carrera;
	}

	
	public function getIdTipoEquipamiento()
	{

		return $this->id_tipo_equipamiento;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function setIdCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_carrera !== $v) {
			$this->id_carrera = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::ID_CARRERA;
		}

		if ($this->aFechaEtapaCarrera !== null && $this->aFechaEtapaCarrera->getId() !== $v) {
			$this->aFechaEtapaCarrera = null;
		}

	} 
	
	public function setIdTipoEquipamiento($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_tipo_equipamiento !== $v) {
			$this->id_tipo_equipamiento = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO;
		}

		if ($this->aTipoEquipamiento !== null && $this->aTipoEquipamiento->getId() !== $v) {
			$this->aTipoEquipamiento = null;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::CREATED_BY;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_carrera = $rs->getInt($startcol + 0);

			$this->id_tipo_equipamiento = $rs->getInt($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->created_by = $rs->getInt($startcol + 3);

			$this->updated_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_by = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EquipamientoCarrera object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EquipamientoCarreraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EquipamientoCarreraPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(EquipamientoCarreraPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EquipamientoCarreraPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EquipamientoCarreraPeer::DATABASE_NAME);
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


												
			if ($this->aFechaEtapaCarrera !== null) {
				if ($this->aFechaEtapaCarrera->isModified()) {
					$affectedRows += $this->aFechaEtapaCarrera->save($con);
				}
				$this->setFechaEtapaCarrera($this->aFechaEtapaCarrera);
			}

			if ($this->aTipoEquipamiento !== null) {
				if ($this->aTipoEquipamiento->isModified()) {
					$affectedRows += $this->aTipoEquipamiento->save($con);
				}
				$this->setTipoEquipamiento($this->aTipoEquipamiento);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EquipamientoCarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdCarrera($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EquipamientoCarreraPeer::doUpdate($this, $con);
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


												
			if ($this->aFechaEtapaCarrera !== null) {
				if (!$this->aFechaEtapaCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFechaEtapaCarrera->getValidationFailures());
				}
			}

			if ($this->aTipoEquipamiento !== null) {
				if (!$this->aTipoEquipamiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoEquipamiento->getValidationFailures());
				}
			}


			if (($retval = EquipamientoCarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EquipamientoCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdCarrera();
				break;
			case 1:
				return $this->getIdTipoEquipamiento();
				break;
			case 2:
				return $this->getCreatedAt();
				break;
			case 3:
				return $this->getCreatedBy();
				break;
			case 4:
				return $this->getUpdatedAt();
				break;
			case 5:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EquipamientoCarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdCarrera(),
			$keys[1] => $this->getIdTipoEquipamiento(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getCreatedBy(),
			$keys[4] => $this->getUpdatedAt(),
			$keys[5] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EquipamientoCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdCarrera($value);
				break;
			case 1:
				$this->setIdTipoEquipamiento($value);
				break;
			case 2:
				$this->setCreatedAt($value);
				break;
			case 3:
				$this->setCreatedBy($value);
				break;
			case 4:
				$this->setUpdatedAt($value);
				break;
			case 5:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EquipamientoCarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdCarrera($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdTipoEquipamiento($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedBy($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedBy($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EquipamientoCarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(EquipamientoCarreraPeer::ID_CARRERA)) $criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->id_carrera);
		if ($this->isColumnModified(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO)) $criteria->add(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, $this->id_tipo_equipamiento);
		if ($this->isColumnModified(EquipamientoCarreraPeer::CREATED_AT)) $criteria->add(EquipamientoCarreraPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EquipamientoCarreraPeer::CREATED_BY)) $criteria->add(EquipamientoCarreraPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(EquipamientoCarreraPeer::UPDATED_AT)) $criteria->add(EquipamientoCarreraPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(EquipamientoCarreraPeer::UPDATED_BY)) $criteria->add(EquipamientoCarreraPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EquipamientoCarreraPeer::DATABASE_NAME);

		$criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->id_carrera);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdCarrera();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdCarrera($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdTipoEquipamiento($this->id_tipo_equipamiento);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		$copyObj->setNew(true);

		$copyObj->setIdCarrera(NULL); 
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
			self::$peer = new EquipamientoCarreraPeer();
		}
		return self::$peer;
	}

	
	public function setFechaEtapaCarrera($v)
	{


		if ($v === null) {
			$this->setIdCarrera(NULL);
		} else {
			$this->setIdCarrera($v->getId());
		}


		$this->aFechaEtapaCarrera = $v;
	}


	
	public function getFechaEtapaCarrera($con = null)
	{
		if ($this->aFechaEtapaCarrera === null && ($this->id_carrera !== null)) {
						$this->aFechaEtapaCarrera = FechaEtapaCarreraPeer::retrieveByPK($this->id_carrera, $con);

			
		}
		return $this->aFechaEtapaCarrera;
	}

	
	public function setTipoEquipamiento($v)
	{


		if ($v === null) {
			$this->setIdTipoEquipamiento(NULL);
		} else {
			$this->setIdTipoEquipamiento($v->getId());
		}


		$this->aTipoEquipamiento = $v;
	}


	
	public function getTipoEquipamiento($con = null)
	{
		if ($this->aTipoEquipamiento === null && ($this->id_tipo_equipamiento !== null)) {
						$this->aTipoEquipamiento = TipoEquipamientoPeer::retrieveByPK($this->id_tipo_equipamiento, $con);

			
		}
		return $this->aTipoEquipamiento;
	}

} 