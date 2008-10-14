<?php


abstract class BaseResultado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_fecha_etapa_carrera;


	
	protected $id_corredor;


	
	protected $tiempo;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aFechaEtapaCarrera;

	
	protected $aCorredor;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdFechaEtapaCarrera()
	{

		return $this->id_fecha_etapa_carrera;
	}

	
	public function getIdCorredor()
	{

		return $this->id_corredor;
	}

	
	public function getTiempo($format = 'Y-m-d H:i:s')
	{

		if ($this->tiempo === null || $this->tiempo === '') {
			return null;
		} elseif (!is_int($this->tiempo)) {
						$ts = strtotime($this->tiempo);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [tiempo] as date/time value: " . var_export($this->tiempo, true));
			}
		} else {
			$ts = $this->tiempo;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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
			$this->modifiedColumns[] = ResultadoPeer::ID;
		}

	} 
	
	public function setIdFechaEtapaCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_fecha_etapa_carrera !== $v) {
			$this->id_fecha_etapa_carrera = $v;
			$this->modifiedColumns[] = ResultadoPeer::ID_FECHA_ETAPA_CARRERA;
		}

		if ($this->aFechaEtapaCarrera !== null && $this->aFechaEtapaCarrera->getId() !== $v) {
			$this->aFechaEtapaCarrera = null;
		}

	} 
	
	public function setIdCorredor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_corredor !== $v) {
			$this->id_corredor = $v;
			$this->modifiedColumns[] = ResultadoPeer::ID_CORREDOR;
		}

		if ($this->aCorredor !== null && $this->aCorredor->getId() !== $v) {
			$this->aCorredor = null;
		}

	} 
	
	public function setTiempo($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [tiempo] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->tiempo !== $ts) {
			$this->tiempo = $ts;
			$this->modifiedColumns[] = ResultadoPeer::TIEMPO;
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
			$this->modifiedColumns[] = ResultadoPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ResultadoPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_fecha_etapa_carrera = $rs->getInt($startcol + 1);

			$this->id_corredor = $rs->getInt($startcol + 2);

			$this->tiempo = $rs->getTimestamp($startcol + 3, null);

			$this->updated_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_by = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Resultado object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ResultadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ResultadoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(ResultadoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ResultadoPeer::DATABASE_NAME);
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


												
			if ($this->aFechaEtapaCarrera !== null) {
				if ($this->aFechaEtapaCarrera->isModified()) {
					$affectedRows += $this->aFechaEtapaCarrera->save($con);
				}
				$this->setFechaEtapaCarrera($this->aFechaEtapaCarrera);
			}

			if ($this->aCorredor !== null) {
				if ($this->aCorredor->isModified()) {
					$affectedRows += $this->aCorredor->save($con);
				}
				$this->setCorredor($this->aCorredor);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ResultadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ResultadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aFechaEtapaCarrera !== null) {
				if (!$this->aFechaEtapaCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFechaEtapaCarrera->getValidationFailures());
				}
			}

			if ($this->aCorredor !== null) {
				if (!$this->aCorredor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCorredor->getValidationFailures());
				}
			}


			if (($retval = ResultadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ResultadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdFechaEtapaCarrera();
				break;
			case 2:
				return $this->getIdCorredor();
				break;
			case 3:
				return $this->getTiempo();
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
		$keys = ResultadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdFechaEtapaCarrera(),
			$keys[2] => $this->getIdCorredor(),
			$keys[3] => $this->getTiempo(),
			$keys[4] => $this->getUpdatedAt(),
			$keys[5] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ResultadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdFechaEtapaCarrera($value);
				break;
			case 2:
				$this->setIdCorredor($value);
				break;
			case 3:
				$this->setTiempo($value);
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
		$keys = ResultadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdFechaEtapaCarrera($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdCorredor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTiempo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedBy($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ResultadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ResultadoPeer::ID)) $criteria->add(ResultadoPeer::ID, $this->id);
		if ($this->isColumnModified(ResultadoPeer::ID_FECHA_ETAPA_CARRERA)) $criteria->add(ResultadoPeer::ID_FECHA_ETAPA_CARRERA, $this->id_fecha_etapa_carrera);
		if ($this->isColumnModified(ResultadoPeer::ID_CORREDOR)) $criteria->add(ResultadoPeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(ResultadoPeer::TIEMPO)) $criteria->add(ResultadoPeer::TIEMPO, $this->tiempo);
		if ($this->isColumnModified(ResultadoPeer::UPDATED_AT)) $criteria->add(ResultadoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ResultadoPeer::UPDATED_BY)) $criteria->add(ResultadoPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ResultadoPeer::DATABASE_NAME);

		$criteria->add(ResultadoPeer::ID, $this->id);

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

		$copyObj->setIdFechaEtapaCarrera($this->id_fecha_etapa_carrera);

		$copyObj->setIdCorredor($this->id_corredor);

		$copyObj->setTiempo($this->tiempo);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


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
			self::$peer = new ResultadoPeer();
		}
		return self::$peer;
	}

	
	public function setFechaEtapaCarrera($v)
	{


		if ($v === null) {
			$this->setIdFechaEtapaCarrera(NULL);
		} else {
			$this->setIdFechaEtapaCarrera($v->getId());
		}


		$this->aFechaEtapaCarrera = $v;
	}


	
	public function getFechaEtapaCarrera($con = null)
	{
		if ($this->aFechaEtapaCarrera === null && ($this->id_fecha_etapa_carrera !== null)) {
						$this->aFechaEtapaCarrera = FechaEtapaCarreraPeer::retrieveByPK($this->id_fecha_etapa_carrera, $con);

			
		}
		return $this->aFechaEtapaCarrera;
	}

	
	public function setCorredor($v)
	{


		if ($v === null) {
			$this->setIdCorredor(NULL);
		} else {
			$this->setIdCorredor($v->getId());
		}


		$this->aCorredor = $v;
	}


	
	public function getCorredor($con = null)
	{
		if ($this->aCorredor === null && ($this->id_corredor !== null)) {
						$this->aCorredor = CorredorPeer::retrieveByPK($this->id_corredor, $con);

			
		}
		return $this->aCorredor;
	}

} 