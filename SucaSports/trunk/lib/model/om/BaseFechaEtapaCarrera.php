<?php


abstract class BaseFechaEtapaCarrera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $max_corredores;


	
	protected $fecha_inicio;


	
	protected $fecha_fin;


	
	protected $costo;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;


	
	protected $id_etapa_carrera;


	
	protected $id_carrera;

	
	protected $collAlquilers;

	
	protected $lastAlquilerCriteria = null;

	
	protected $collEquipamientoCarreras;

	
	protected $lastEquipamientoCarreraCriteria = null;

	
	protected $collInscripcions;

	
	protected $lastInscripcionCriteria = null;

	
	protected $collResultados;

	
	protected $lastResultadoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getMaxCorredores()
	{

		return $this->max_corredores;
	}

	
	public function getFechaInicio($format = 'Y-m-d')
	{

		if ($this->fecha_inicio === null || $this->fecha_inicio === '') {
			return null;
		} elseif (!is_int($this->fecha_inicio)) {
						$ts = strtotime($this->fecha_inicio);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_inicio] as date/time value: " . var_export($this->fecha_inicio, true));
			}
		} else {
			$ts = $this->fecha_inicio;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFechaFin($format = 'Y-m-d')
	{

		if ($this->fecha_fin === null || $this->fecha_fin === '') {
			return null;
		} elseif (!is_int($this->fecha_fin)) {
						$ts = strtotime($this->fecha_fin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_fin] as date/time value: " . var_export($this->fecha_fin, true));
			}
		} else {
			$ts = $this->fecha_fin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCosto()
	{

		return $this->costo;
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

	
	public function getIdEtapaCarrera()
	{

		return $this->id_etapa_carrera;
	}

	
	public function getIdCarrera()
	{

		return $this->id_carrera;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::ID;
		}

	} 
	
	public function setMaxCorredores($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->max_corredores !== $v) {
			$this->max_corredores = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::MAX_CORREDORES;
		}

	} 
	
	public function setFechaInicio($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_inicio] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_inicio !== $ts) {
			$this->fecha_inicio = $ts;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::FECHA_INICIO;
		}

	} 
	
	public function setFechaFin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_fin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_fin !== $ts) {
			$this->fecha_fin = $ts;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::FECHA_FIN;
		}

	} 
	
	public function setCosto($v)
	{

		if ($this->costo !== $v) {
			$this->costo = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::COSTO;
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
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::CREATED_BY;
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
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::UPDATED_BY;
		}

	} 
	
	public function setIdEtapaCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_etapa_carrera !== $v) {
			$this->id_etapa_carrera = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::ID_ETAPA_CARRERA;
		}

	} 
	
	public function setIdCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_carrera !== $v) {
			$this->id_carrera = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::ID_CARRERA;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->max_corredores = $rs->getInt($startcol + 1);

			$this->fecha_inicio = $rs->getDate($startcol + 2, null);

			$this->fecha_fin = $rs->getDate($startcol + 3, null);

			$this->costo = $rs->getFloat($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->updated_by = $rs->getInt($startcol + 8);

			$this->id_etapa_carrera = $rs->getInt($startcol + 9);

			$this->id_carrera = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating FechaEtapaCarrera object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FechaEtapaCarreraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FechaEtapaCarreraPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(FechaEtapaCarreraPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(FechaEtapaCarreraPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FechaEtapaCarreraPeer::DATABASE_NAME);
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
					$pk = FechaEtapaCarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FechaEtapaCarreraPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlquilers !== null) {
				foreach($this->collAlquilers as $referrerFK) {
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

			if ($this->collInscripcions !== null) {
				foreach($this->collInscripcions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collResultados !== null) {
				foreach($this->collResultados as $referrerFK) {
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


			if (($retval = FechaEtapaCarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlquilers !== null) {
					foreach($this->collAlquilers as $referrerFK) {
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

				if ($this->collInscripcions !== null) {
					foreach($this->collInscripcions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collResultados !== null) {
					foreach($this->collResultados as $referrerFK) {
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
		$pos = FechaEtapaCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMaxCorredores();
				break;
			case 2:
				return $this->getFechaInicio();
				break;
			case 3:
				return $this->getFechaFin();
				break;
			case 4:
				return $this->getCosto();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getCreatedBy();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			case 8:
				return $this->getUpdatedBy();
				break;
			case 9:
				return $this->getIdEtapaCarrera();
				break;
			case 10:
				return $this->getIdCarrera();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FechaEtapaCarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMaxCorredores(),
			$keys[2] => $this->getFechaInicio(),
			$keys[3] => $this->getFechaFin(),
			$keys[4] => $this->getCosto(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getUpdatedAt(),
			$keys[8] => $this->getUpdatedBy(),
			$keys[9] => $this->getIdEtapaCarrera(),
			$keys[10] => $this->getIdCarrera(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FechaEtapaCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMaxCorredores($value);
				break;
			case 2:
				$this->setFechaInicio($value);
				break;
			case 3:
				$this->setFechaFin($value);
				break;
			case 4:
				$this->setCosto($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setCreatedBy($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
			case 8:
				$this->setUpdatedBy($value);
				break;
			case 9:
				$this->setIdEtapaCarrera($value);
				break;
			case 10:
				$this->setIdCarrera($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FechaEtapaCarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMaxCorredores($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCosto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIdEtapaCarrera($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIdCarrera($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(FechaEtapaCarreraPeer::ID)) $criteria->add(FechaEtapaCarreraPeer::ID, $this->id);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::MAX_CORREDORES)) $criteria->add(FechaEtapaCarreraPeer::MAX_CORREDORES, $this->max_corredores);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::FECHA_INICIO)) $criteria->add(FechaEtapaCarreraPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::FECHA_FIN)) $criteria->add(FechaEtapaCarreraPeer::FECHA_FIN, $this->fecha_fin);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::COSTO)) $criteria->add(FechaEtapaCarreraPeer::COSTO, $this->costo);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::CREATED_AT)) $criteria->add(FechaEtapaCarreraPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::CREATED_BY)) $criteria->add(FechaEtapaCarreraPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::UPDATED_AT)) $criteria->add(FechaEtapaCarreraPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::UPDATED_BY)) $criteria->add(FechaEtapaCarreraPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA)) $criteria->add(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, $this->id_etapa_carrera);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::ID_CARRERA)) $criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $this->id_carrera);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);

		$criteria->add(FechaEtapaCarreraPeer::ID, $this->id);

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

		$copyObj->setMaxCorredores($this->max_corredores);

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFin($this->fecha_fin);

		$copyObj->setCosto($this->costo);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setIdEtapaCarrera($this->id_etapa_carrera);

		$copyObj->setIdCarrera($this->id_carrera);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlquilers() as $relObj) {
				$copyObj->addAlquiler($relObj->copy($deepCopy));
			}

			foreach($this->getEquipamientoCarreras() as $relObj) {
				$copyObj->addEquipamientoCarrera($relObj->copy($deepCopy));
			}

			foreach($this->getInscripcions() as $relObj) {
				$copyObj->addInscripcion($relObj->copy($deepCopy));
			}

			foreach($this->getResultados() as $relObj) {
				$copyObj->addResultado($relObj->copy($deepCopy));
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
			self::$peer = new FechaEtapaCarreraPeer();
		}
		return self::$peer;
	}

	
	public function initAlquilers()
	{
		if ($this->collAlquilers === null) {
			$this->collAlquilers = array();
		}
	}

	
	public function getAlquilers($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlquilers === null) {
			if ($this->isNew()) {
			   $this->collAlquilers = array();
			} else {

				$criteria->add(AlquilerPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				AlquilerPeer::addSelectColumns($criteria);
				$this->collAlquilers = AlquilerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlquilerPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				AlquilerPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlquilerCriteria) || !$this->lastAlquilerCriteria->equals($criteria)) {
					$this->collAlquilers = AlquilerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlquilerCriteria = $criteria;
		return $this->collAlquilers;
	}

	
	public function countAlquilers($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlquilerPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

		return AlquilerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlquiler(Alquiler $l)
	{
		$this->collAlquilers[] = $l;
		$l->setFechaEtapaCarrera($this);
	}


	
	public function getAlquilersJoinInventario($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlquilers === null) {
			if ($this->isNew()) {
				$this->collAlquilers = array();
			} else {

				$criteria->add(AlquilerPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				$this->collAlquilers = AlquilerPeer::doSelectJoinInventario($criteria, $con);
			}
		} else {
									
			$criteria->add(AlquilerPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

			if (!isset($this->lastAlquilerCriteria) || !$this->lastAlquilerCriteria->equals($criteria)) {
				$this->collAlquilers = AlquilerPeer::doSelectJoinInventario($criteria, $con);
			}
		}
		$this->lastAlquilerCriteria = $criteria;

		return $this->collAlquilers;
	}


	
	public function getAlquilersJoinUsuario($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlquilers === null) {
			if ($this->isNew()) {
				$this->collAlquilers = array();
			} else {

				$criteria->add(AlquilerPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				$this->collAlquilers = AlquilerPeer::doSelectJoinUsuario($criteria, $con);
			}
		} else {
									
			$criteria->add(AlquilerPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

			if (!isset($this->lastAlquilerCriteria) || !$this->lastAlquilerCriteria->equals($criteria)) {
				$this->collAlquilers = AlquilerPeer::doSelectJoinUsuario($criteria, $con);
			}
		}
		$this->lastAlquilerCriteria = $criteria;

		return $this->collAlquilers;
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

				$criteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				EquipamientoCarreraPeer::addSelectColumns($criteria);
				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

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

		$criteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

		return EquipamientoCarreraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEquipamientoCarrera(EquipamientoCarrera $l)
	{
		$this->collEquipamientoCarreras[] = $l;
		$l->setFechaEtapaCarrera($this);
	}


	
	public function getEquipamientoCarrerasJoinTipoEquipamiento($criteria = null, $con = null)
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

				$criteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelectJoinTipoEquipamiento($criteria, $con);
			}
		} else {
									
			$criteria->add(EquipamientoCarreraPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

			if (!isset($this->lastEquipamientoCarreraCriteria) || !$this->lastEquipamientoCarreraCriteria->equals($criteria)) {
				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelectJoinTipoEquipamiento($criteria, $con);
			}
		}
		$this->lastEquipamientoCarreraCriteria = $criteria;

		return $this->collEquipamientoCarreras;
	}

	
	public function initInscripcions()
	{
		if ($this->collInscripcions === null) {
			$this->collInscripcions = array();
		}
	}

	
	public function getInscripcions($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInscripcions === null) {
			if ($this->isNew()) {
			   $this->collInscripcions = array();
			} else {

				$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				InscripcionPeer::addSelectColumns($criteria);
				$this->collInscripcions = InscripcionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				InscripcionPeer::addSelectColumns($criteria);
				if (!isset($this->lastInscripcionCriteria) || !$this->lastInscripcionCriteria->equals($criteria)) {
					$this->collInscripcions = InscripcionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInscripcionCriteria = $criteria;
		return $this->collInscripcions;
	}

	
	public function countInscripcions($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

		return InscripcionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInscripcion(Inscripcion $l)
	{
		$this->collInscripcions[] = $l;
		$l->setFechaEtapaCarrera($this);
	}


	
	public function getInscripcionsJoinCorredor($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInscripcions === null) {
			if ($this->isNew()) {
				$this->collInscripcions = array();
			} else {

				$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				$this->collInscripcions = InscripcionPeer::doSelectJoinCorredor($criteria, $con);
			}
		} else {
									
			$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

			if (!isset($this->lastInscripcionCriteria) || !$this->lastInscripcionCriteria->equals($criteria)) {
				$this->collInscripcions = InscripcionPeer::doSelectJoinCorredor($criteria, $con);
			}
		}
		$this->lastInscripcionCriteria = $criteria;

		return $this->collInscripcions;
	}


	
	public function getInscripcionsJoinCuentaCorriente($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInscripcions === null) {
			if ($this->isNew()) {
				$this->collInscripcions = array();
			} else {

				$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				$this->collInscripcions = InscripcionPeer::doSelectJoinCuentaCorriente($criteria, $con);
			}
		} else {
									
			$criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

			if (!isset($this->lastInscripcionCriteria) || !$this->lastInscripcionCriteria->equals($criteria)) {
				$this->collInscripcions = InscripcionPeer::doSelectJoinCuentaCorriente($criteria, $con);
			}
		}
		$this->lastInscripcionCriteria = $criteria;

		return $this->collInscripcions;
	}

	
	public function initResultados()
	{
		if ($this->collResultados === null) {
			$this->collResultados = array();
		}
	}

	
	public function getResultados($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResultados === null) {
			if ($this->isNew()) {
			   $this->collResultados = array();
			} else {

				$criteria->add(ResultadoPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				ResultadoPeer::addSelectColumns($criteria);
				$this->collResultados = ResultadoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResultadoPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				ResultadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastResultadoCriteria) || !$this->lastResultadoCriteria->equals($criteria)) {
					$this->collResultados = ResultadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastResultadoCriteria = $criteria;
		return $this->collResultados;
	}

	
	public function countResultados($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ResultadoPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

		return ResultadoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addResultado(Resultado $l)
	{
		$this->collResultados[] = $l;
		$l->setFechaEtapaCarrera($this);
	}


	
	public function getResultadosJoinCorredor($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResultados === null) {
			if ($this->isNew()) {
				$this->collResultados = array();
			} else {

				$criteria->add(ResultadoPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

				$this->collResultados = ResultadoPeer::doSelectJoinCorredor($criteria, $con);
			}
		} else {
									
			$criteria->add(ResultadoPeer::ID_FECHA_ETAPA_CARRERA, $this->getId());

			if (!isset($this->lastResultadoCriteria) || !$this->lastResultadoCriteria->equals($criteria)) {
				$this->collResultados = ResultadoPeer::doSelectJoinCorredor($criteria, $con);
			}
		}
		$this->lastResultadoCriteria = $criteria;

		return $this->collResultados;
	}

} 