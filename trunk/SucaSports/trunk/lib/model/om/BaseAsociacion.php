<?php


abstract class BaseAsociacion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $direccion;


	
	protected $telefono;


	
	protected $contacto;


	
	protected $created_by;


	
	protected $created_at;


	
	protected $updated_by;


	
	protected $updated_at;

	
	protected $collAsociacionCorredors;

	
	protected $lastAsociacionCorredorCriteria = null;

	
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

	
	public function getDireccion()
	{

		return $this->direccion;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getContacto()
	{

		return $this->contacto;
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
			$this->modifiedColumns[] = AsociacionPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = AsociacionPeer::NOMBRE;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = AsociacionPeer::DIRECCION;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = AsociacionPeer::TELEFONO;
		}

	} 
	
	public function setContacto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contacto !== $v) {
			$this->contacto = $v;
			$this->modifiedColumns[] = AsociacionPeer::CONTACTO;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = AsociacionPeer::CREATED_BY;
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
			$this->modifiedColumns[] = AsociacionPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = AsociacionPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = AsociacionPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->direccion = $rs->getString($startcol + 2);

			$this->telefono = $rs->getString($startcol + 3);

			$this->contacto = $rs->getString($startcol + 4);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->updated_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Asociacion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AsociacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AsociacionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AsociacionPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AsociacionPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AsociacionPeer::DATABASE_NAME);
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
					$pk = AsociacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AsociacionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAsociacionCorredors !== null) {
				foreach($this->collAsociacionCorredors as $referrerFK) {
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


			if (($retval = AsociacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAsociacionCorredors !== null) {
					foreach($this->collAsociacionCorredors as $referrerFK) {
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
		$pos = AsociacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDireccion();
				break;
			case 3:
				return $this->getTelefono();
				break;
			case 4:
				return $this->getContacto();
				break;
			case 5:
				return $this->getCreatedBy();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedBy();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AsociacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getDireccion(),
			$keys[3] => $this->getTelefono(),
			$keys[4] => $this->getContacto(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedBy(),
			$keys[8] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AsociacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDireccion($value);
				break;
			case 3:
				$this->setTelefono($value);
				break;
			case 4:
				$this->setContacto($value);
				break;
			case 5:
				$this->setCreatedBy($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedBy($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AsociacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDireccion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelefono($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setContacto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AsociacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(AsociacionPeer::ID)) $criteria->add(AsociacionPeer::ID, $this->id);
		if ($this->isColumnModified(AsociacionPeer::NOMBRE)) $criteria->add(AsociacionPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(AsociacionPeer::DIRECCION)) $criteria->add(AsociacionPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(AsociacionPeer::TELEFONO)) $criteria->add(AsociacionPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(AsociacionPeer::CONTACTO)) $criteria->add(AsociacionPeer::CONTACTO, $this->contacto);
		if ($this->isColumnModified(AsociacionPeer::CREATED_BY)) $criteria->add(AsociacionPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(AsociacionPeer::CREATED_AT)) $criteria->add(AsociacionPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AsociacionPeer::UPDATED_BY)) $criteria->add(AsociacionPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(AsociacionPeer::UPDATED_AT)) $criteria->add(AsociacionPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AsociacionPeer::DATABASE_NAME);

		$criteria->add(AsociacionPeer::ID, $this->id);

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

		$copyObj->setDireccion($this->direccion);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setContacto($this->contacto);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAsociacionCorredors() as $relObj) {
				$copyObj->addAsociacionCorredor($relObj->copy($deepCopy));
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
			self::$peer = new AsociacionPeer();
		}
		return self::$peer;
	}

	
	public function initAsociacionCorredors()
	{
		if ($this->collAsociacionCorredors === null) {
			$this->collAsociacionCorredors = array();
		}
	}

	
	public function getAsociacionCorredors($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsociacionCorredors === null) {
			if ($this->isNew()) {
			   $this->collAsociacionCorredors = array();
			} else {

				$criteria->add(AsociacionCorredorPeer::ID_ASOCIACION, $this->getId());

				AsociacionCorredorPeer::addSelectColumns($criteria);
				$this->collAsociacionCorredors = AsociacionCorredorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AsociacionCorredorPeer::ID_ASOCIACION, $this->getId());

				AsociacionCorredorPeer::addSelectColumns($criteria);
				if (!isset($this->lastAsociacionCorredorCriteria) || !$this->lastAsociacionCorredorCriteria->equals($criteria)) {
					$this->collAsociacionCorredors = AsociacionCorredorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAsociacionCorredorCriteria = $criteria;
		return $this->collAsociacionCorredors;
	}

	
	public function countAsociacionCorredors($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AsociacionCorredorPeer::ID_ASOCIACION, $this->getId());

		return AsociacionCorredorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAsociacionCorredor(AsociacionCorredor $l)
	{
		$this->collAsociacionCorredors[] = $l;
		$l->setAsociacion($this);
	}


	
	public function getAsociacionCorredorsJoinCorredor($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsociacionCorredors === null) {
			if ($this->isNew()) {
				$this->collAsociacionCorredors = array();
			} else {

				$criteria->add(AsociacionCorredorPeer::ID_ASOCIACION, $this->getId());

				$this->collAsociacionCorredors = AsociacionCorredorPeer::doSelectJoinCorredor($criteria, $con);
			}
		} else {
									
			$criteria->add(AsociacionCorredorPeer::ID_ASOCIACION, $this->getId());

			if (!isset($this->lastAsociacionCorredorCriteria) || !$this->lastAsociacionCorredorCriteria->equals($criteria)) {
				$this->collAsociacionCorredors = AsociacionCorredorPeer::doSelectJoinCorredor($criteria, $con);
			}
		}
		$this->lastAsociacionCorredorCriteria = $criteria;

		return $this->collAsociacionCorredors;
	}

} 