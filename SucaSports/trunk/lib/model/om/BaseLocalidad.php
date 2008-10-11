<?php


abstract class BaseLocalidad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_pais;


	
	protected $nombre;


	
	protected $updated_by;


	
	protected $updated_at;

	
	protected $aPais;

	
	protected $collCorredors;

	
	protected $lastCorredorCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdPais()
	{

		return $this->id_pais;
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
			$this->modifiedColumns[] = LocalidadPeer::ID;
		}

	} 
	
	public function setIdPais($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_pais !== $v) {
			$this->id_pais = $v;
			$this->modifiedColumns[] = LocalidadPeer::ID_PAIS;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = LocalidadPeer::NOMBRE;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = LocalidadPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = LocalidadPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_pais = $rs->getInt($startcol + 1);

			$this->nombre = $rs->getString($startcol + 2);

			$this->updated_by = $rs->getInt($startcol + 3);

			$this->updated_at = $rs->getTimestamp($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Localidad object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LocalidadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LocalidadPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(LocalidadPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LocalidadPeer::DATABASE_NAME);
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


												
			if ($this->aPais !== null) {
				if ($this->aPais->isModified()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LocalidadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LocalidadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCorredors !== null) {
				foreach($this->collCorredors as $referrerFK) {
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


												
			if ($this->aPais !== null) {
				if (!$this->aPais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPais->getValidationFailures());
				}
			}


			if (($retval = LocalidadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCorredors !== null) {
					foreach($this->collCorredors as $referrerFK) {
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
		$pos = LocalidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdPais();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getUpdatedBy();
				break;
			case 4:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LocalidadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdPais(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getUpdatedBy(),
			$keys[4] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LocalidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdPais($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setUpdatedBy($value);
				break;
			case 4:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LocalidadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdPais($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedBy($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LocalidadPeer::DATABASE_NAME);

		if ($this->isColumnModified(LocalidadPeer::ID)) $criteria->add(LocalidadPeer::ID, $this->id);
		if ($this->isColumnModified(LocalidadPeer::ID_PAIS)) $criteria->add(LocalidadPeer::ID_PAIS, $this->id_pais);
		if ($this->isColumnModified(LocalidadPeer::NOMBRE)) $criteria->add(LocalidadPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(LocalidadPeer::UPDATED_BY)) $criteria->add(LocalidadPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(LocalidadPeer::UPDATED_AT)) $criteria->add(LocalidadPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LocalidadPeer::DATABASE_NAME);

		$criteria->add(LocalidadPeer::ID, $this->id);

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

		$copyObj->setIdPais($this->id_pais);

		$copyObj->setNombre($this->nombre);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCorredors() as $relObj) {
				$copyObj->addCorredor($relObj->copy($deepCopy));
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
			self::$peer = new LocalidadPeer();
		}
		return self::$peer;
	}

	
	public function setPais($v)
	{


		if ($v === null) {
			$this->setIdPais(NULL);
		} else {
			$this->setIdPais($v->getId());
		}


		$this->aPais = $v;
	}


	
	public function getPais($con = null)
	{
		if ($this->aPais === null && ($this->id_pais !== null)) {
						$this->aPais = PaisPeer::retrieveByPK($this->id_pais, $con);

			
		}
		return $this->aPais;
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

				$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

				CorredorPeer::addSelectColumns($criteria);
				$this->collCorredors = CorredorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

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

		$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

		return CorredorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCorredor(Corredor $l)
	{
		$this->collCorredors[] = $l;
		$l->setLocalidad($this);
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

				$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinSociedadMedica($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinSociedadMedica($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}


	
	public function getCorredorsJoinPais($criteria = null, $con = null)
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

				$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinPais($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinPais($criteria, $con);
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

				$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinChip($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_LOCALIDAD, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinChip($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}

} 