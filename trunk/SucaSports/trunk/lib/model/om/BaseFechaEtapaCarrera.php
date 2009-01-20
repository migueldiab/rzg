<?php


abstract class BaseFechaEtapaCarrera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecha_inicio;


	
	protected $id_etapa;


	
	protected $id_carrera;


	
	protected $max_corredores;


	
	protected $fecha_fin;


	
	protected $costo;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;


	
	protected $estado = 'I';

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

	
	public function getMaxCorredores()
	{

		return $this->max_corredores;
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

	
	public function getEstado()
	{

		return $this->estado;
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
	
	public function setIdEtapa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_etapa !== $v) {
			$this->id_etapa = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::ID_ETAPA;
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
	
	public function setEstado($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->estado !== $v || $v === 'I') {
			$this->estado = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::ESTADO;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fecha_inicio = $rs->getDate($startcol + 0, null);

			$this->id_etapa = $rs->getInt($startcol + 1);

			$this->id_carrera = $rs->getInt($startcol + 2);

			$this->max_corredores = $rs->getInt($startcol + 3);

			$this->fecha_fin = $rs->getDate($startcol + 4, null);

			$this->costo = $rs->getFloat($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->created_by = $rs->getInt($startcol + 7);

			$this->updated_at = $rs->getTimestamp($startcol + 8, null);

			$this->updated_by = $rs->getInt($startcol + 9);

			$this->estado = $rs->getString($startcol + 10);

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
					$this->setNew(false);
				} else {
					$affectedRows += FechaEtapaCarreraPeer::doUpdate($this, $con);
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


			if (($retval = FechaEtapaCarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
				return $this->getFechaInicio();
				break;
			case 1:
				return $this->getIdEtapa();
				break;
			case 2:
				return $this->getIdCarrera();
				break;
			case 3:
				return $this->getMaxCorredores();
				break;
			case 4:
				return $this->getFechaFin();
				break;
			case 5:
				return $this->getCosto();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			case 9:
				return $this->getUpdatedBy();
				break;
			case 10:
				return $this->getEstado();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FechaEtapaCarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFechaInicio(),
			$keys[1] => $this->getIdEtapa(),
			$keys[2] => $this->getIdCarrera(),
			$keys[3] => $this->getMaxCorredores(),
			$keys[4] => $this->getFechaFin(),
			$keys[5] => $this->getCosto(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getUpdatedAt(),
			$keys[9] => $this->getUpdatedBy(),
			$keys[10] => $this->getEstado(),
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
				$this->setFechaInicio($value);
				break;
			case 1:
				$this->setIdEtapa($value);
				break;
			case 2:
				$this->setIdCarrera($value);
				break;
			case 3:
				$this->setMaxCorredores($value);
				break;
			case 4:
				$this->setFechaFin($value);
				break;
			case 5:
				$this->setCosto($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
			case 9:
				$this->setUpdatedBy($value);
				break;
			case 10:
				$this->setEstado($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FechaEtapaCarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFechaInicio($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdEtapa($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdCarrera($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMaxCorredores($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFechaFin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCosto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEstado($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(FechaEtapaCarreraPeer::FECHA_INICIO)) $criteria->add(FechaEtapaCarreraPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::ID_ETAPA)) $criteria->add(FechaEtapaCarreraPeer::ID_ETAPA, $this->id_etapa);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::ID_CARRERA)) $criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $this->id_carrera);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::MAX_CORREDORES)) $criteria->add(FechaEtapaCarreraPeer::MAX_CORREDORES, $this->max_corredores);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::FECHA_FIN)) $criteria->add(FechaEtapaCarreraPeer::FECHA_FIN, $this->fecha_fin);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::COSTO)) $criteria->add(FechaEtapaCarreraPeer::COSTO, $this->costo);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::CREATED_AT)) $criteria->add(FechaEtapaCarreraPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::CREATED_BY)) $criteria->add(FechaEtapaCarreraPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::UPDATED_AT)) $criteria->add(FechaEtapaCarreraPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::UPDATED_BY)) $criteria->add(FechaEtapaCarreraPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::ESTADO)) $criteria->add(FechaEtapaCarreraPeer::ESTADO, $this->estado);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);

		$criteria->add(FechaEtapaCarreraPeer::FECHA_INICIO, $this->fecha_inicio);
		$criteria->add(FechaEtapaCarreraPeer::ID_ETAPA, $this->id_etapa);
		$criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $this->id_carrera);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getFechaInicio();

		$pks[1] = $this->getIdEtapa();

		$pks[2] = $this->getIdCarrera();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setFechaInicio($keys[0]);

		$this->setIdEtapa($keys[1]);

		$this->setIdCarrera($keys[2]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setMaxCorredores($this->max_corredores);

		$copyObj->setFechaFin($this->fecha_fin);

		$copyObj->setCosto($this->costo);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setEstado($this->estado);


		$copyObj->setNew(true);

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
			self::$peer = new FechaEtapaCarreraPeer();
		}
		return self::$peer;
	}

} 