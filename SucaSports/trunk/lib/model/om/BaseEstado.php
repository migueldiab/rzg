<?php


abstract class BaseEstado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $collChips;

	
	protected $lastChipCriteria = null;

	
	protected $collInventarios;

	
	protected $lastInventarioCriteria = null;

	
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
			$this->modifiedColumns[] = EstadoPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = EstadoPeer::NOMBRE;
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
			$this->modifiedColumns[] = EstadoPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = EstadoPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->updated_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_by = $rs->getString($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Estado object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EstadoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(EstadoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadoPeer::DATABASE_NAME);
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
					$pk = EstadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collChips !== null) {
				foreach($this->collChips as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInventarios !== null) {
				foreach($this->collInventarios as $referrerFK) {
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


			if (($retval = EstadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collChips !== null) {
					foreach($this->collChips as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInventarios !== null) {
					foreach($this->collInventarios as $referrerFK) {
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
		$pos = EstadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = EstadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getUpdatedAt(),
			$keys[3] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUpdatedAt($value);
				break;
			case 3:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EstadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUpdatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedBy($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstadoPeer::ID)) $criteria->add(EstadoPeer::ID, $this->id);
		if ($this->isColumnModified(EstadoPeer::NOMBRE)) $criteria->add(EstadoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EstadoPeer::UPDATED_AT)) $criteria->add(EstadoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(EstadoPeer::UPDATED_BY)) $criteria->add(EstadoPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstadoPeer::DATABASE_NAME);

		$criteria->add(EstadoPeer::ID, $this->id);

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

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getChips() as $relObj) {
				$copyObj->addChip($relObj->copy($deepCopy));
			}

			foreach($this->getInventarios() as $relObj) {
				$copyObj->addInventario($relObj->copy($deepCopy));
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
			self::$peer = new EstadoPeer();
		}
		return self::$peer;
	}

	
	public function initChips()
	{
		if ($this->collChips === null) {
			$this->collChips = array();
		}
	}

	
	public function getChips($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collChips === null) {
			if ($this->isNew()) {
			   $this->collChips = array();
			} else {

				$criteria->add(ChipPeer::ID_ESTADO, $this->getId());

				ChipPeer::addSelectColumns($criteria);
				$this->collChips = ChipPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ChipPeer::ID_ESTADO, $this->getId());

				ChipPeer::addSelectColumns($criteria);
				if (!isset($this->lastChipCriteria) || !$this->lastChipCriteria->equals($criteria)) {
					$this->collChips = ChipPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastChipCriteria = $criteria;
		return $this->collChips;
	}

	
	public function countChips($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ChipPeer::ID_ESTADO, $this->getId());

		return ChipPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addChip(Chip $l)
	{
		$this->collChips[] = $l;
		$l->setEstado($this);
	}

	
	public function initInventarios()
	{
		if ($this->collInventarios === null) {
			$this->collInventarios = array();
		}
	}

	
	public function getInventarios($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInventarios === null) {
			if ($this->isNew()) {
			   $this->collInventarios = array();
			} else {

				$criteria->add(InventarioPeer::ID_ESTADO, $this->getId());

				InventarioPeer::addSelectColumns($criteria);
				$this->collInventarios = InventarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InventarioPeer::ID_ESTADO, $this->getId());

				InventarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastInventarioCriteria) || !$this->lastInventarioCriteria->equals($criteria)) {
					$this->collInventarios = InventarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInventarioCriteria = $criteria;
		return $this->collInventarios;
	}

	
	public function countInventarios($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InventarioPeer::ID_ESTADO, $this->getId());

		return InventarioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInventario(Inventario $l)
	{
		$this->collInventarios[] = $l;
		$l->setEstado($this);
	}


	
	public function getInventariosJoinEquipamiento($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInventarios === null) {
			if ($this->isNew()) {
				$this->collInventarios = array();
			} else {

				$criteria->add(InventarioPeer::ID_ESTADO, $this->getId());

				$this->collInventarios = InventarioPeer::doSelectJoinEquipamiento($criteria, $con);
			}
		} else {
									
			$criteria->add(InventarioPeer::ID_ESTADO, $this->getId());

			if (!isset($this->lastInventarioCriteria) || !$this->lastInventarioCriteria->equals($criteria)) {
				$this->collInventarios = InventarioPeer::doSelectJoinEquipamiento($criteria, $con);
			}
		}
		$this->lastInventarioCriteria = $criteria;

		return $this->collInventarios;
	}

} 