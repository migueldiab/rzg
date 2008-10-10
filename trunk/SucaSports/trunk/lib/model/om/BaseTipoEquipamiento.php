<?php


abstract class BaseTipoEquipamiento extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $tipo;

	
	protected $collEquipamientos;

	
	protected $lastEquipamientoCriteria = null;

	
	protected $collEquipamientoCarreras;

	
	protected $lastEquipamientoCarreraCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TipoEquipamientoPeer::ID;
		}

	} 
	
	public function setTipo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = TipoEquipamientoPeer::TIPO;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->tipo = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating TipoEquipamiento object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TipoEquipamientoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TipoEquipamientoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TipoEquipamientoPeer::DATABASE_NAME);
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
					$pk = TipoEquipamientoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TipoEquipamientoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEquipamientos !== null) {
				foreach($this->collEquipamientos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEquipamientoCarreras !== null) {
				foreach($this->collEquipamientoCarreras as $referrerFK) {
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


			if (($retval = TipoEquipamientoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEquipamientos !== null) {
					foreach($this->collEquipamientos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEquipamientoCarreras !== null) {
					foreach($this->collEquipamientoCarreras as $referrerFK) {
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
		$pos = TipoEquipamientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTipo();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TipoEquipamientoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTipo(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TipoEquipamientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTipo($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TipoEquipamientoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipo($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TipoEquipamientoPeer::DATABASE_NAME);

		if ($this->isColumnModified(TipoEquipamientoPeer::ID)) $criteria->add(TipoEquipamientoPeer::ID, $this->id);
		if ($this->isColumnModified(TipoEquipamientoPeer::TIPO)) $criteria->add(TipoEquipamientoPeer::TIPO, $this->tipo);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TipoEquipamientoPeer::DATABASE_NAME);

		$criteria->add(TipoEquipamientoPeer::ID, $this->id);

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

		$copyObj->setTipo($this->tipo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEquipamientos() as $relObj) {
				$copyObj->addEquipamiento($relObj->copy($deepCopy));
			}

			foreach($this->getEquipamientoCarreras() as $relObj) {
				$copyObj->addEquipamientoCarrera($relObj->copy($deepCopy));
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
			self::$peer = new TipoEquipamientoPeer();
		}
		return self::$peer;
	}

	
	public function initEquipamientos()
	{
		if ($this->collEquipamientos === null) {
			$this->collEquipamientos = array();
		}
	}

	
	public function getEquipamientos($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEquipamientos === null) {
			if ($this->isNew()) {
			   $this->collEquipamientos = array();
			} else {

				$criteria->add(EquipamientoPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

				EquipamientoPeer::addSelectColumns($criteria);
				$this->collEquipamientos = EquipamientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EquipamientoPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

				EquipamientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastEquipamientoCriteria) || !$this->lastEquipamientoCriteria->equals($criteria)) {
					$this->collEquipamientos = EquipamientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEquipamientoCriteria = $criteria;
		return $this->collEquipamientos;
	}

	
	public function countEquipamientos($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EquipamientoPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

		return EquipamientoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEquipamiento(Equipamiento $l)
	{
		$this->collEquipamientos[] = $l;
		$l->setTipoEquipamiento($this);
	}

	
	public function initEquipamientoCarreras()
	{
		if ($this->collEquipamientoCarreras === null) {
			$this->collEquipamientoCarreras = array();
		}
	}

	
	public function getEquipamientoCarreras($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEquipamientoCarreras === null) {
			if ($this->isNew()) {
			   $this->collEquipamientoCarreras = array();
			} else {

				$criteria->add(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

				EquipamientoCarreraPeer::addSelectColumns($criteria);
				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

				EquipamientoCarreraPeer::addSelectColumns($criteria);
				if (!isset($this->lastEquipamientoCarreraCriteria) || !$this->lastEquipamientoCarreraCriteria->equals($criteria)) {
					$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEquipamientoCarreraCriteria = $criteria;
		return $this->collEquipamientoCarreras;
	}

	
	public function countEquipamientoCarreras($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

		return EquipamientoCarreraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEquipamientoCarrera(EquipamientoCarrera $l)
	{
		$this->collEquipamientoCarreras[] = $l;
		$l->setTipoEquipamiento($this);
	}


	
	public function getEquipamientoCarrerasJoinFechaEtapaCarrera($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEquipamientoCarreras === null) {
			if ($this->isNew()) {
				$this->collEquipamientoCarreras = array();
			} else {

				$criteria->add(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelectJoinFechaEtapaCarrera($criteria, $con);
			}
		} else {
									
			$criteria->add(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

			if (!isset($this->lastEquipamientoCarreraCriteria) || !$this->lastEquipamientoCarreraCriteria->equals($criteria)) {
				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelectJoinFechaEtapaCarrera($criteria, $con);
			}
		}
		$this->lastEquipamientoCarreraCriteria = $criteria;

		return $this->collEquipamientoCarreras;
	}

} 