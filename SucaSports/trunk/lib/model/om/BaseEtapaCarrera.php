<?php


abstract class BaseEtapaCarrera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $numero_etapa;


	
	protected $id_etapa;

	
	protected $aCarrera;

	
	protected $collFechaEtapaCarreras;

	
	protected $lastFechaEtapaCarreraCriteria = null;

	
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

	
	public function getNumeroEtapa()
	{

		return $this->numero_etapa;
	}

	
	public function getIdEtapa()
	{

		return $this->id_etapa;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EtapaCarreraPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = EtapaCarreraPeer::NOMBRE;
		}

	} 
	
	public function setNumeroEtapa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->numero_etapa !== $v) {
			$this->numero_etapa = $v;
			$this->modifiedColumns[] = EtapaCarreraPeer::NUMERO_ETAPA;
		}

	} 
	
	public function setIdEtapa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_etapa !== $v) {
			$this->id_etapa = $v;
			$this->modifiedColumns[] = EtapaCarreraPeer::ID_ETAPA;
		}

		if ($this->aCarrera !== null && $this->aCarrera->getId() !== $v) {
			$this->aCarrera = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->numero_etapa = $rs->getInt($startcol + 2);

			$this->id_etapa = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EtapaCarrera object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EtapaCarreraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EtapaCarreraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EtapaCarreraPeer::DATABASE_NAME);
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


												
			if ($this->aCarrera !== null) {
				if ($this->aCarrera->isModified()) {
					$affectedRows += $this->aCarrera->save($con);
				}
				$this->setCarrera($this->aCarrera);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EtapaCarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += EtapaCarreraPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFechaEtapaCarreras !== null) {
				foreach($this->collFechaEtapaCarreras as $referrerFK) {
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


												
			if ($this->aCarrera !== null) {
				if (!$this->aCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCarrera->getValidationFailures());
				}
			}


			if (($retval = EtapaCarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFechaEtapaCarreras !== null) {
					foreach($this->collFechaEtapaCarreras as $referrerFK) {
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
		$pos = EtapaCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNumeroEtapa();
				break;
			case 3:
				return $this->getIdEtapa();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EtapaCarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getNumeroEtapa(),
			$keys[3] => $this->getIdEtapa(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EtapaCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNumeroEtapa($value);
				break;
			case 3:
				$this->setIdEtapa($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EtapaCarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumeroEtapa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdEtapa($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EtapaCarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(EtapaCarreraPeer::ID)) $criteria->add(EtapaCarreraPeer::ID, $this->id);
		if ($this->isColumnModified(EtapaCarreraPeer::NOMBRE)) $criteria->add(EtapaCarreraPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(EtapaCarreraPeer::NUMERO_ETAPA)) $criteria->add(EtapaCarreraPeer::NUMERO_ETAPA, $this->numero_etapa);
		if ($this->isColumnModified(EtapaCarreraPeer::ID_ETAPA)) $criteria->add(EtapaCarreraPeer::ID_ETAPA, $this->id_etapa);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EtapaCarreraPeer::DATABASE_NAME);

		$criteria->add(EtapaCarreraPeer::ID, $this->id);

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

		$copyObj->setNumeroEtapa($this->numero_etapa);

		$copyObj->setIdEtapa($this->id_etapa);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFechaEtapaCarreras() as $relObj) {
				$copyObj->addFechaEtapaCarrera($relObj->copy($deepCopy));
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
			self::$peer = new EtapaCarreraPeer();
		}
		return self::$peer;
	}

	
	public function setCarrera($v)
	{


		if ($v === null) {
			$this->setIdEtapa(NULL);
		} else {
			$this->setIdEtapa($v->getId());
		}


		$this->aCarrera = $v;
	}


	
	public function getCarrera($con = null)
	{
		if ($this->aCarrera === null && ($this->id_etapa !== null)) {
						$this->aCarrera = CarreraPeer::retrieveByPK($this->id_etapa, $con);

			
		}
		return $this->aCarrera;
	}

	
	public function initFechaEtapaCarreras()
	{
		if ($this->collFechaEtapaCarreras === null) {
			$this->collFechaEtapaCarreras = array();
		}
	}

	
	public function getFechaEtapaCarreras($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFechaEtapaCarreras === null) {
			if ($this->isNew()) {
			   $this->collFechaEtapaCarreras = array();
			} else {

				$criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $this->getId());

				FechaEtapaCarreraPeer::addSelectColumns($criteria);
				$this->collFechaEtapaCarreras = FechaEtapaCarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $this->getId());

				FechaEtapaCarreraPeer::addSelectColumns($criteria);
				if (!isset($this->lastFechaEtapaCarreraCriteria) || !$this->lastFechaEtapaCarreraCriteria->equals($criteria)) {
					$this->collFechaEtapaCarreras = FechaEtapaCarreraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFechaEtapaCarreraCriteria = $criteria;
		return $this->collFechaEtapaCarreras;
	}

	
	public function countFechaEtapaCarreras($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $this->getId());

		return FechaEtapaCarreraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFechaEtapaCarrera(FechaEtapaCarrera $l)
	{
		$this->collFechaEtapaCarreras[] = $l;
		$l->setEtapaCarrera($this);
	}

} 