<?php


abstract class BaseResultado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_corredor;


	
	protected $fecha_inicio;


	
	protected $id_etapa;


	
	protected $id_carrera;


	
	protected $tiempo;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aCorredor;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdCorredor()
	{

		return $this->id_corredor;
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

	
	public function getIdEtapa()
	{

		return $this->id_etapa;
	}

	
	public function getIdCarrera()
	{

		return $this->id_carrera;
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
			$this->modifiedColumns[] = ResultadoPeer::FECHA_INICIO;
		}

	} 
	
	public function setIdEtapa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_etapa !== $v) {
			$this->id_etapa = $v;
			$this->modifiedColumns[] = ResultadoPeer::ID_ETAPA;
		}

	} 
	
	public function setIdCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_carrera !== $v) {
			$this->id_carrera = $v;
			$this->modifiedColumns[] = ResultadoPeer::ID_CARRERA;
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

			$this->id_corredor = $rs->getInt($startcol + 0);

			$this->fecha_inicio = $rs->getDate($startcol + 1, null);

			$this->id_etapa = $rs->getInt($startcol + 2);

			$this->id_carrera = $rs->getInt($startcol + 3);

			$this->tiempo = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_by = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
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
				return $this->getIdCorredor();
				break;
			case 1:
				return $this->getFechaInicio();
				break;
			case 2:
				return $this->getIdEtapa();
				break;
			case 3:
				return $this->getIdCarrera();
				break;
			case 4:
				return $this->getTiempo();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			case 6:
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
			$keys[0] => $this->getIdCorredor(),
			$keys[1] => $this->getFechaInicio(),
			$keys[2] => $this->getIdEtapa(),
			$keys[3] => $this->getIdCarrera(),
			$keys[4] => $this->getTiempo(),
			$keys[5] => $this->getUpdatedAt(),
			$keys[6] => $this->getUpdatedBy(),
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
				$this->setIdCorredor($value);
				break;
			case 1:
				$this->setFechaInicio($value);
				break;
			case 2:
				$this->setIdEtapa($value);
				break;
			case 3:
				$this->setIdCarrera($value);
				break;
			case 4:
				$this->setTiempo($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
			case 6:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ResultadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdCorredor($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechaInicio($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdEtapa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdCarrera($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTiempo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedBy($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ResultadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ResultadoPeer::ID_CORREDOR)) $criteria->add(ResultadoPeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(ResultadoPeer::FECHA_INICIO)) $criteria->add(ResultadoPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(ResultadoPeer::ID_ETAPA)) $criteria->add(ResultadoPeer::ID_ETAPA, $this->id_etapa);
		if ($this->isColumnModified(ResultadoPeer::ID_CARRERA)) $criteria->add(ResultadoPeer::ID_CARRERA, $this->id_carrera);
		if ($this->isColumnModified(ResultadoPeer::TIEMPO)) $criteria->add(ResultadoPeer::TIEMPO, $this->tiempo);
		if ($this->isColumnModified(ResultadoPeer::UPDATED_AT)) $criteria->add(ResultadoPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ResultadoPeer::UPDATED_BY)) $criteria->add(ResultadoPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ResultadoPeer::DATABASE_NAME);

		$criteria->add(ResultadoPeer::ID_CORREDOR, $this->id_corredor);
		$criteria->add(ResultadoPeer::FECHA_INICIO, $this->fecha_inicio);
		$criteria->add(ResultadoPeer::ID_ETAPA, $this->id_etapa);
		$criteria->add(ResultadoPeer::ID_CARRERA, $this->id_carrera);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getIdCorredor();

		$pks[1] = $this->getFechaInicio();

		$pks[2] = $this->getIdEtapa();

		$pks[3] = $this->getIdCarrera();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setIdCorredor($keys[0]);

		$this->setFechaInicio($keys[1]);

		$this->setIdEtapa($keys[2]);

		$this->setIdCarrera($keys[3]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTiempo($this->tiempo);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		$copyObj->setNew(true);

		$copyObj->setIdCorredor(NULL); 
		$copyObj->setFechaInicio(NULL); 
		$copyObj->setIdEtapa(NULL); 
		$copyObj->setIdCarrera(NULL); 
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