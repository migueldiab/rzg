<?php


abstract class BasePermiso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $permiso;


	
	protected $grupos_id;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aGrupo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPermiso()
	{

		return $this->permiso;
	}

	
	public function getGruposId()
	{

		return $this->grupos_id;
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

	
	public function setPermiso($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->permiso !== $v) {
			$this->permiso = $v;
			$this->modifiedColumns[] = PermisoPeer::PERMISO;
		}

	} 
	
	public function setGruposId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->grupos_id !== $v) {
			$this->grupos_id = $v;
			$this->modifiedColumns[] = PermisoPeer::GRUPOS_ID;
		}

		if ($this->aGrupo !== null && $this->aGrupo->getId() !== $v) {
			$this->aGrupo = null;
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
			$this->modifiedColumns[] = PermisoPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = PermisoPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->permiso = $rs->getString($startcol + 0);

			$this->grupos_id = $rs->getInt($startcol + 1);

			$this->updated_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_by = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Permiso object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PermisoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(PermisoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PermisoPeer::DATABASE_NAME);
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


												
			if ($this->aGrupo !== null) {
				if ($this->aGrupo->isModified()) {
					$affectedRows += $this->aGrupo->save($con);
				}
				$this->setGrupo($this->aGrupo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PermisoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += PermisoPeer::doUpdate($this, $con);
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


												
			if ($this->aGrupo !== null) {
				if (!$this->aGrupo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGrupo->getValidationFailures());
				}
			}


			if (($retval = PermisoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPermiso();
				break;
			case 1:
				return $this->getGruposId();
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
		$keys = PermisoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPermiso(),
			$keys[1] => $this->getGruposId(),
			$keys[2] => $this->getUpdatedAt(),
			$keys[3] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PermisoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPermiso($value);
				break;
			case 1:
				$this->setGruposId($value);
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
		$keys = PermisoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPermiso($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGruposId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUpdatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedBy($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PermisoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PermisoPeer::PERMISO)) $criteria->add(PermisoPeer::PERMISO, $this->permiso);
		if ($this->isColumnModified(PermisoPeer::GRUPOS_ID)) $criteria->add(PermisoPeer::GRUPOS_ID, $this->grupos_id);
		if ($this->isColumnModified(PermisoPeer::UPDATED_AT)) $criteria->add(PermisoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(PermisoPeer::UPDATED_BY)) $criteria->add(PermisoPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PermisoPeer::DATABASE_NAME);

		$criteria->add(PermisoPeer::PERMISO, $this->permiso);
		$criteria->add(PermisoPeer::GRUPOS_ID, $this->grupos_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getPermiso();

		$pks[1] = $this->getGruposId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setPermiso($keys[0]);

		$this->setGruposId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		$copyObj->setNew(true);

		$copyObj->setPermiso(NULL); 
		$copyObj->setGruposId(NULL); 
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
			self::$peer = new PermisoPeer();
		}
		return self::$peer;
	}

	
	public function setGrupo($v)
	{


		if ($v === null) {
			$this->setGruposId(NULL);
		} else {
			$this->setGruposId($v->getId());
		}


		$this->aGrupo = $v;
	}


	
	public function getGrupo($con = null)
	{
		if ($this->aGrupo === null && ($this->grupos_id !== null)) {
						$this->aGrupo = GrupoPeer::retrieveByPK($this->grupos_id, $con);

			
		}
		return $this->aGrupo;
	}

} 