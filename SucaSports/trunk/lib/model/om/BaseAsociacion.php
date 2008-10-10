<?php


abstract class BaseAsociacion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;

	
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
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AsociacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AsociacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(AsociacionPeer::ID)) $criteria->add(AsociacionPeer::ID, $this->id);
		if ($this->isColumnModified(AsociacionPeer::NOMBRE)) $criteria->add(AsociacionPeer::NOMBRE, $this->nombre);

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