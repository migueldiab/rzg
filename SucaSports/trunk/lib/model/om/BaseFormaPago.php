<?php


abstract class BaseFormaPago extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $collCuentaCorrientes;

	
	protected $lastCuentaCorrienteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNombre()
	{

		return $this->nombre;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FormaPagoPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = FormaPagoPeer::NOMBRE;
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
			$this->modifiedColumns[] = FormaPagoPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = FormaPagoPeer::CREATED_BY;
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
			$this->modifiedColumns[] = FormaPagoPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = FormaPagoPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->created_at = $rs->getTimestamp($startcol + 2, null);

			$this->created_by = $rs->getInt($startcol + 3);

			$this->updated_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_by = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating FormaPago object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FormaPagoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FormaPagoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(FormaPagoPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(FormaPagoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FormaPagoPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FormaPagoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FormaPagoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCuentaCorrientes !== null) {
				foreach($this->collCuentaCorrientes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = FormaPagoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCuentaCorrientes !== null) {
					foreach($this->collCuentaCorrientes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FormaPagoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombre();
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
		$keys = FormaPagoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getCreatedAt(),
			$keys[3] => $this->getCreatedBy(),
			$keys[4] => $this->getUpdatedAt(),
			$keys[5] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FormaPagoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombre($value);
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
		$keys = FormaPagoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCreatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedBy($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedBy($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FormaPagoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FormaPagoPeer::ID)) $criteria->add(FormaPagoPeer::ID, $this->id);
		if ($this->isColumnModified(FormaPagoPeer::NOMBRE)) $criteria->add(FormaPagoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(FormaPagoPeer::CREATED_AT)) $criteria->add(FormaPagoPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(FormaPagoPeer::CREATED_BY)) $criteria->add(FormaPagoPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(FormaPagoPeer::UPDATED_AT)) $criteria->add(FormaPagoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(FormaPagoPeer::UPDATED_BY)) $criteria->add(FormaPagoPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FormaPagoPeer::DATABASE_NAME);

		$criteria->add(FormaPagoPeer::ID, $this->id);

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

		$copyObj->setNombre($this->nombre);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCuentaCorrientes() as $relObj) {
				$copyObj->addCuentaCorriente($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new FormaPagoPeer();
		}
		return self::$peer;
	}

	
	public function initCuentaCorrientes()
	{
		if ($this->collCuentaCorrientes === null) {
			$this->collCuentaCorrientes = array();
		}
	}

	
	public function getCuentaCorrientes($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentaCorrientes === null) {
			if ($this->isNew()) {
			   $this->collCuentaCorrientes = array();
			} else {

				$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

				CuentaCorrientePeer::addSelectColumns($criteria);
				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

				CuentaCorrientePeer::addSelectColumns($criteria);
				if (!isset($this->lastCuentaCorrienteCriteria) || !$this->lastCuentaCorrienteCriteria->equals($criteria)) {
					$this->collCuentaCorrientes = CuentaCorrientePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuentaCorrienteCriteria = $criteria;
		return $this->collCuentaCorrientes;
	}

	
	public function countCuentaCorrientes($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

		return CuentaCorrientePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCuentaCorriente(CuentaCorriente $l)
	{
		$this->collCuentaCorrientes[] = $l;
		$l->setFormaPago($this);
	}


	
	public function getCuentaCorrientesJoinCorredor($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentaCorrientes === null) {
			if ($this->isNew()) {
				$this->collCuentaCorrientes = array();
			} else {

				$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelectJoinCorredor($criteria, $con);
			}
		} else {
									
			$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

			if (!isset($this->lastCuentaCorrienteCriteria) || !$this->lastCuentaCorrienteCriteria->equals($criteria)) {
				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelectJoinCorredor($criteria, $con);
			}
		}
		$this->lastCuentaCorrienteCriteria = $criteria;

		return $this->collCuentaCorrientes;
	}

} 