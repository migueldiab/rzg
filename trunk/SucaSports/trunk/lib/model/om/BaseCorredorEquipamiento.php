<?php


abstract class BaseCorredorEquipamiento extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_corredor;


	
	protected $id_equipamiento;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aCorredor;

	
	protected $aEquipamiento;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdCorredor()
	{

		return $this->id_corredor;
	}

	
	public function getIdEquipamiento()
	{

		return $this->id_equipamiento;
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

	
	public function setIdCorredor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_corredor !== $v) {
			$this->id_corredor = $v;
			$this->modifiedColumns[] = CorredorEquipamientoPeer::ID_CORREDOR;
		}

		if ($this->aCorredor !== null && $this->aCorredor->getId() !== $v) {
			$this->aCorredor = null;
		}

	} 
	
	public function setIdEquipamiento($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_equipamiento !== $v) {
			$this->id_equipamiento = $v;
			$this->modifiedColumns[] = CorredorEquipamientoPeer::ID_EQUIPAMIENTO;
		}

		if ($this->aEquipamiento !== null && $this->aEquipamiento->getId() !== $v) {
			$this->aEquipamiento = null;
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
			$this->modifiedColumns[] = CorredorEquipamientoPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = CorredorEquipamientoPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_corredor = $rs->getInt($startcol + 0);

			$this->id_equipamiento = $rs->getInt($startcol + 1);

			$this->updated_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_by = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CorredorEquipamiento object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CorredorEquipamientoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CorredorEquipamientoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(CorredorEquipamientoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CorredorEquipamientoPeer::DATABASE_NAME);
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


												
			if ($this->aCorredor !== null) {
				if ($this->aCorredor->isModified()) {
					$affectedRows += $this->aCorredor->save($con);
				}
				$this->setCorredor($this->aCorredor);
			}

			if ($this->aEquipamiento !== null) {
				if ($this->aEquipamiento->isModified()) {
					$affectedRows += $this->aEquipamiento->save($con);
				}
				$this->setEquipamiento($this->aEquipamiento);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CorredorEquipamientoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CorredorEquipamientoPeer::doUpdate($this, $con);
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


												
			if ($this->aCorredor !== null) {
				if (!$this->aCorredor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCorredor->getValidationFailures());
				}
			}

			if ($this->aEquipamiento !== null) {
				if (!$this->aEquipamiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEquipamiento->getValidationFailures());
				}
			}


			if (($retval = CorredorEquipamientoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CorredorEquipamientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdCorredor();
				break;
			case 1:
				return $this->getIdEquipamiento();
				break;
			case 2:
				return $this->getUpdatedAt();
				break;
			case 3:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CorredorEquipamientoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdCorredor(),
			$keys[1] => $this->getIdEquipamiento(),
			$keys[2] => $this->getUpdatedAt(),
			$keys[3] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CorredorEquipamientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdCorredor($value);
				break;
			case 1:
				$this->setIdEquipamiento($value);
				break;
			case 2:
				$this->setUpdatedAt($value);
				break;
			case 3:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CorredorEquipamientoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdCorredor($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdEquipamiento($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUpdatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedBy($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CorredorEquipamientoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CorredorEquipamientoPeer::ID_CORREDOR)) $criteria->add(CorredorEquipamientoPeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(CorredorEquipamientoPeer::ID_EQUIPAMIENTO)) $criteria->add(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $this->id_equipamiento);
		if ($this->isColumnModified(CorredorEquipamientoPeer::UPDATED_AT)) $criteria->add(CorredorEquipamientoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(CorredorEquipamientoPeer::UPDATED_BY)) $criteria->add(CorredorEquipamientoPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CorredorEquipamientoPeer::DATABASE_NAME);

		$criteria->add(CorredorEquipamientoPeer::ID_CORREDOR, $this->id_corredor);
		$criteria->add(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $this->id_equipamiento);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getIdCorredor();

		$pks[1] = $this->getIdEquipamiento();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setIdCorredor($keys[0]);

		$this->setIdEquipamiento($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		$copyObj->setNew(true);

		$copyObj->setIdCorredor(NULL); 
		$copyObj->setIdEquipamiento(NULL); 
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
			self::$peer = new CorredorEquipamientoPeer();
		}
		return self::$peer;
	}

	
	public function setCorredor($v)
	{


		if ($v === null) {
			$this->setIdCorredor(NULL);
		} else {
			$this->setIdCorredor($v->getId());
		}


		$this->aCorredor = $v;
	}


	
	public function getCorredor($con = null)
	{
		if ($this->aCorredor === null && ($this->id_corredor !== null)) {
						$this->aCorredor = CorredorPeer::retrieveByPK($this->id_corredor, $con);

			
		}
		return $this->aCorredor;
	}

	
	public function setEquipamiento($v)
	{


		if ($v === null) {
			$this->setIdEquipamiento(NULL);
		} else {
			$this->setIdEquipamiento($v->getId());
		}


		$this->aEquipamiento = $v;
	}


	
	public function getEquipamiento($con = null)
	{
		if ($this->aEquipamiento === null && ($this->id_equipamiento !== null)) {
						$this->aEquipamiento = EquipamientoPeer::retrieveByPK($this->id_equipamiento, $con);

			
		}
		return $this->aEquipamiento;
	}

} 