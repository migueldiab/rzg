<?php


abstract class BaseCarrera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $url;


	
	protected $descripcion;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $collCategoriaCarreras;

	
	protected $lastCategoriaCarreraCriteria = null;

	
	protected $collEtapaCarreras;

	
	protected $lastEtapaCarreraCriteria = null;

	
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

	
	public function getUrl()
	{

		return $this->url;
	}

	
	public function getDescripcion()
	{

		return $this->descripcion;
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
			$this->modifiedColumns[] = CarreraPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = CarreraPeer::NOMBRE;
		}

	} 
	
	public function setUrl($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = CarreraPeer::URL;
		}

	} 
	
	public function setDescripcion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = CarreraPeer::DESCRIPCION;
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
			$this->modifiedColumns[] = CarreraPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = CarreraPeer::CREATED_BY;
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
			$this->modifiedColumns[] = CarreraPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = CarreraPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->url = $rs->getString($startcol + 2);

			$this->descripcion = $rs->getString($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getString($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Carrera object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CarreraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CarreraPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(CarreraPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CarreraPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CarreraPeer::DATABASE_NAME);
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
					$pk = CarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CarreraPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCategoriaCarreras !== null) {
				foreach($this->collCategoriaCarreras as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEtapaCarreras !== null) {
				foreach($this->collEtapaCarreras as $referrerFK) {
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


			if (($retval = CarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCategoriaCarreras !== null) {
					foreach($this->collCategoriaCarreras as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEtapaCarreras !== null) {
					foreach($this->collEtapaCarreras as $referrerFK) {
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
		$pos = CarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUrl();
				break;
			case 3:
				return $this->getDescripcion();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getCreatedBy();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getUrl(),
			$keys[3] => $this->getDescripcion(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUrl($value);
				break;
			case 3:
				$this->setDescripcion($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setCreatedBy($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUrl($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescripcion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CarreraPeer::ID)) $criteria->add(CarreraPeer::ID, $this->id);
		if ($this->isColumnModified(CarreraPeer::NOMBRE)) $criteria->add(CarreraPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CarreraPeer::URL)) $criteria->add(CarreraPeer::URL, $this->url);
		if ($this->isColumnModified(CarreraPeer::DESCRIPCION)) $criteria->add(CarreraPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(CarreraPeer::CREATED_AT)) $criteria->add(CarreraPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CarreraPeer::CREATED_BY)) $criteria->add(CarreraPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(CarreraPeer::UPDATED_AT)) $criteria->add(CarreraPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(CarreraPeer::UPDATED_BY)) $criteria->add(CarreraPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CarreraPeer::DATABASE_NAME);

		$criteria->add(CarreraPeer::ID, $this->id);

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

		$copyObj->setUrl($this->url);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCategoriaCarreras() as $relObj) {
				$copyObj->addCategoriaCarrera($relObj->copy($deepCopy));
			}

			foreach($this->getEtapaCarreras() as $relObj) {
				$copyObj->addEtapaCarrera($relObj->copy($deepCopy));
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
			self::$peer = new CarreraPeer();
		}
		return self::$peer;
	}

	
	public function initCategoriaCarreras()
	{
		if ($this->collCategoriaCarreras === null) {
			$this->collCategoriaCarreras = array();
		}
	}

	
	public function getCategoriaCarreras($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCategoriaCarreras === null) {
			if ($this->isNew()) {
			   $this->collCategoriaCarreras = array();
			} else {

				$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->getId());

				CategoriaCarreraPeer::addSelectColumns($criteria);
				$this->collCategoriaCarreras = CategoriaCarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->getId());

				CategoriaCarreraPeer::addSelectColumns($criteria);
				if (!isset($this->lastCategoriaCarreraCriteria) || !$this->lastCategoriaCarreraCriteria->equals($criteria)) {
					$this->collCategoriaCarreras = CategoriaCarreraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCategoriaCarreraCriteria = $criteria;
		return $this->collCategoriaCarreras;
	}

	
	public function countCategoriaCarreras($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->getId());

		return CategoriaCarreraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCategoriaCarrera(CategoriaCarrera $l)
	{
		$this->collCategoriaCarreras[] = $l;
		$l->setCarrera($this);
	}


	
	public function getCategoriaCarrerasJoinCategoria($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCategoriaCarreras === null) {
			if ($this->isNew()) {
				$this->collCategoriaCarreras = array();
			} else {

				$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->getId());

				$this->collCategoriaCarreras = CategoriaCarreraPeer::doSelectJoinCategoria($criteria, $con);
			}
		} else {
									
			$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->getId());

			if (!isset($this->lastCategoriaCarreraCriteria) || !$this->lastCategoriaCarreraCriteria->equals($criteria)) {
				$this->collCategoriaCarreras = CategoriaCarreraPeer::doSelectJoinCategoria($criteria, $con);
			}
		}
		$this->lastCategoriaCarreraCriteria = $criteria;

		return $this->collCategoriaCarreras;
	}

	
	public function initEtapaCarreras()
	{
		if ($this->collEtapaCarreras === null) {
			$this->collEtapaCarreras = array();
		}
	}

	
	public function getEtapaCarreras($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtapaCarreras === null) {
			if ($this->isNew()) {
			   $this->collEtapaCarreras = array();
			} else {

				$criteria->add(EtapaCarreraPeer::ID_CARRERA, $this->getId());

				EtapaCarreraPeer::addSelectColumns($criteria);
				$this->collEtapaCarreras = EtapaCarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtapaCarreraPeer::ID_CARRERA, $this->getId());

				EtapaCarreraPeer::addSelectColumns($criteria);
				if (!isset($this->lastEtapaCarreraCriteria) || !$this->lastEtapaCarreraCriteria->equals($criteria)) {
					$this->collEtapaCarreras = EtapaCarreraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEtapaCarreraCriteria = $criteria;
		return $this->collEtapaCarreras;
	}

	
	public function countEtapaCarreras($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EtapaCarreraPeer::ID_CARRERA, $this->getId());

		return EtapaCarreraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEtapaCarrera(EtapaCarrera $l)
	{
		$this->collEtapaCarreras[] = $l;
		$l->setCarrera($this);
	}

} 