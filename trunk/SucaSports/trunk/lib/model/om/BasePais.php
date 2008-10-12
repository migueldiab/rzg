<?php


abstract class BasePais extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $updated_by;


	
	protected $updated_at;

	
	protected $collCorredors;

	
	protected $lastCorredorCriteria = null;

	
	protected $collLocalidads;

	
	protected $lastLocalidadCriteria = null;

	
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
			$this->modifiedColumns[] = PaisPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = PaisPeer::NOMBRE;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = PaisPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = PaisPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->updated_by = $rs->getInt($startcol + 2);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Pais object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PaisPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(PaisPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaisPeer::DATABASE_NAME);
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
					$pk = PaisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PaisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCorredors !== null) {
				foreach($this->collCorredors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLocalidads !== null) {
				foreach($this->collLocalidads as $referrerFK) {
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


			if (($retval = PaisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCorredors !== null) {
					foreach($this->collCorredors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLocalidads !== null) {
					foreach($this->collLocalidads as $referrerFK) {
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
		$pos = PaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUpdatedBy();
				break;
			case 3:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getUpdatedBy(),
			$keys[3] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUpdatedBy($value);
				break;
			case 3:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUpdatedBy($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PaisPeer::DATABASE_NAME);

		if ($this->isColumnModified(PaisPeer::ID)) $criteria->add(PaisPeer::ID, $this->id);
		if ($this->isColumnModified(PaisPeer::NOMBRE)) $criteria->add(PaisPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(PaisPeer::UPDATED_BY)) $criteria->add(PaisPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(PaisPeer::UPDATED_AT)) $criteria->add(PaisPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PaisPeer::DATABASE_NAME);

		$criteria->add(PaisPeer::ID, $this->id);

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

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCorredors() as $relObj) {
				$copyObj->addCorredor($relObj->copy($deepCopy));
			}

			foreach($this->getLocalidads() as $relObj) {
				$copyObj->addLocalidad($relObj->copy($deepCopy));
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
			self::$peer = new PaisPeer();
		}
		return self::$peer;
	}

	
	public function initCorredors()
	{
		if ($this->collCorredors === null) {
			$this->collCorredors = array();
		}
	}

	
	public function getCorredors($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
			   $this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

				CorredorPeer::addSelectColumns($criteria);
				$this->collCorredors = CorredorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

				CorredorPeer::addSelectColumns($criteria);
				if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
					$this->collCorredors = CorredorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCorredorCriteria = $criteria;
		return $this->collCorredors;
	}

	
	public function countCorredors($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

		return CorredorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCorredor(Corredor $l)
	{
		$this->collCorredors[] = $l;
		$l->setPais($this);
	}


	
	public function getCorredorsJoinTipoDocumento($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
				$this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinTipoDocumento($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinTipoDocumento($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}


	
	public function getCorredorsJoinSociedadMedica($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
				$this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinSociedadMedica($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinSociedadMedica($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}


	
	public function getCorredorsJoinLocalidad($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
				$this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinLocalidad($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinLocalidad($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}


	
	public function getCorredorsJoinChip($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
				$this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinChip($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_PAIS, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinChip($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}

	
	public function initLocalidads()
	{
		if ($this->collLocalidads === null) {
			$this->collLocalidads = array();
		}
	}

	
	public function getLocalidads($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLocalidads === null) {
			if ($this->isNew()) {
			   $this->collLocalidads = array();
			} else {

				$criteria->add(LocalidadPeer::ID_PAIS, $this->getId());

				LocalidadPeer::addSelectColumns($criteria);
				$this->collLocalidads = LocalidadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LocalidadPeer::ID_PAIS, $this->getId());

				LocalidadPeer::addSelectColumns($criteria);
				if (!isset($this->lastLocalidadCriteria) || !$this->lastLocalidadCriteria->equals($criteria)) {
					$this->collLocalidads = LocalidadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLocalidadCriteria = $criteria;
		return $this->collLocalidads;
	}

	
	public function countLocalidads($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LocalidadPeer::ID_PAIS, $this->getId());

		return LocalidadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLocalidad(Localidad $l)
	{
		$this->collLocalidads[] = $l;
		$l->setPais($this);
	}

} 