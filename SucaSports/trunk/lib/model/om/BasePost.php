<?php


abstract class BasePost extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $texto;


	
	protected $created_by;


	
	protected $created_at;


	
	protected $updated_by;


	
	protected $updated_at;

	
	protected $aUsuarioRelatedByCreatedBy;

	
	protected $aUsuarioRelatedByUpdatedBy;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTexto()
	{

		return $this->texto;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
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

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PostPeer::ID;
		}

	} 
	
	public function setTexto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->texto !== $v) {
			$this->texto = $v;
			$this->modifiedColumns[] = PostPeer::TEXTO;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = PostPeer::CREATED_BY;
		}

		if ($this->aUsuarioRelatedByCreatedBy !== null && $this->aUsuarioRelatedByCreatedBy->getId() !== $v) {
			$this->aUsuarioRelatedByCreatedBy = null;
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
			$this->modifiedColumns[] = PostPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = PostPeer::UPDATED_BY;
		}

		if ($this->aUsuarioRelatedByUpdatedBy !== null && $this->aUsuarioRelatedByUpdatedBy->getId() !== $v) {
			$this->aUsuarioRelatedByUpdatedBy = null;
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
			$this->modifiedColumns[] = PostPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->texto = $rs->getString($startcol + 1);

			$this->created_by = $rs->getInt($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->updated_by = $rs->getInt($startcol + 4);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Post object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PostPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PostPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PostPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PostPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PostPeer::DATABASE_NAME);
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


												
			if ($this->aUsuarioRelatedByCreatedBy !== null) {
				if ($this->aUsuarioRelatedByCreatedBy->isModified()) {
					$affectedRows += $this->aUsuarioRelatedByCreatedBy->save($con);
				}
				$this->setUsuarioRelatedByCreatedBy($this->aUsuarioRelatedByCreatedBy);
			}

			if ($this->aUsuarioRelatedByUpdatedBy !== null) {
				if ($this->aUsuarioRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->aUsuarioRelatedByUpdatedBy->save($con);
				}
				$this->setUsuarioRelatedByUpdatedBy($this->aUsuarioRelatedByUpdatedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PostPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += PostPeer::doUpdate($this, $con);
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


												
			if ($this->aUsuarioRelatedByCreatedBy !== null) {
				if (!$this->aUsuarioRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->aUsuarioRelatedByUpdatedBy !== null) {
				if (!$this->aUsuarioRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarioRelatedByUpdatedBy->getValidationFailures());
				}
			}


			if (($retval = PostPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTexto();
				break;
			case 2:
				return $this->getCreatedBy();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			case 4:
				return $this->getUpdatedBy();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PostPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTexto(),
			$keys[2] => $this->getCreatedBy(),
			$keys[3] => $this->getCreatedAt(),
			$keys[4] => $this->getUpdatedBy(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTexto($value);
				break;
			case 2:
				$this->setCreatedBy($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
			case 4:
				$this->setUpdatedBy($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PostPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTexto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedBy($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PostPeer::DATABASE_NAME);

		if ($this->isColumnModified(PostPeer::ID)) $criteria->add(PostPeer::ID, $this->id);
		if ($this->isColumnModified(PostPeer::TEXTO)) $criteria->add(PostPeer::TEXTO, $this->texto);
		if ($this->isColumnModified(PostPeer::CREATED_BY)) $criteria->add(PostPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(PostPeer::CREATED_AT)) $criteria->add(PostPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PostPeer::UPDATED_BY)) $criteria->add(PostPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(PostPeer::UPDATED_AT)) $criteria->add(PostPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PostPeer::DATABASE_NAME);

		$criteria->add(PostPeer::ID, $this->id);

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

		$copyObj->setTexto($this->texto);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedAt($this->updated_at);


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
			self::$peer = new PostPeer();
		}
		return self::$peer;
	}

	
	public function setUsuarioRelatedByCreatedBy($v)
	{


		if ($v === null) {
			$this->setCreatedBy(NULL);
		} else {
			$this->setCreatedBy($v->getId());
		}


		$this->aUsuarioRelatedByCreatedBy = $v;
	}


	
	public function getUsuarioRelatedByCreatedBy($con = null)
	{
		if ($this->aUsuarioRelatedByCreatedBy === null && ($this->created_by !== null)) {
						$this->aUsuarioRelatedByCreatedBy = UsuarioPeer::retrieveByPK($this->created_by, $con);

			
		}
		return $this->aUsuarioRelatedByCreatedBy;
	}

	
	public function setUsuarioRelatedByUpdatedBy($v)
	{


		if ($v === null) {
			$this->setUpdatedBy(NULL);
		} else {
			$this->setUpdatedBy($v->getId());
		}


		$this->aUsuarioRelatedByUpdatedBy = $v;
	}


	
	public function getUsuarioRelatedByUpdatedBy($con = null)
	{
		if ($this->aUsuarioRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
						$this->aUsuarioRelatedByUpdatedBy = UsuarioPeer::retrieveByPK($this->updated_by, $con);

			
		}
		return $this->aUsuarioRelatedByUpdatedBy;
	}

} 