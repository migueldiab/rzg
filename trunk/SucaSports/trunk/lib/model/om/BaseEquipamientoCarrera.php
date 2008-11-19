<?php


abstract class BaseEquipamientoCarrera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_tipo_equipamiento;


	
	protected $fecha_inicio;


	
	protected $id_etapa;


	
	protected $id_carrera;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aTipoEquipamiento;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdTipoEquipamiento()
	{

		return $this->id_tipo_equipamiento;
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

	
	public function setIdTipoEquipamiento($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_tipo_equipamiento !== $v) {
			$this->id_tipo_equipamiento = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO;
		}

		if ($this->aTipoEquipamiento !== null && $this->aTipoEquipamiento->getId() !== $v) {
			$this->aTipoEquipamiento = null;
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
			$this->modifiedColumns[] = EquipamientoCarreraPeer::FECHA_INICIO;
		}

	} 
	
	public function setIdEtapa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_etapa !== $v) {
			$this->id_etapa = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::ID_ETAPA;
		}

	} 
	
	public function setIdCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_carrera !== $v) {
			$this->id_carrera = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::ID_CARRERA;
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
			$this->modifiedColumns[] = EquipamientoCarreraPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::CREATED_BY;
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
			$this->modifiedColumns[] = EquipamientoCarreraPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = EquipamientoCarreraPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_tipo_equipamiento = $rs->getInt($startcol + 0);

			$this->fecha_inicio = $rs->getDate($startcol + 1, null);

			$this->id_etapa = $rs->getInt($startcol + 2);

			$this->id_carrera = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EquipamientoCarrera object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EquipamientoCarreraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EquipamientoCarreraPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(EquipamientoCarreraPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EquipamientoCarreraPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EquipamientoCarreraPeer::DATABASE_NAME);
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


												
			if ($this->aTipoEquipamiento !== null) {
				if ($this->aTipoEquipamiento->isModified()) {
					$affectedRows += $this->aTipoEquipamiento->save($con);
				}
				$this->setTipoEquipamiento($this->aTipoEquipamiento);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EquipamientoCarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += EquipamientoCarreraPeer::doUpdate($this, $con);
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


												
			if ($this->aTipoEquipamiento !== null) {
				if (!$this->aTipoEquipamiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoEquipamiento->getValidationFailures());
				}
			}


			if (($retval = EquipamientoCarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EquipamientoCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdTipoEquipamiento();
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
		$keys = EquipamientoCarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdTipoEquipamiento(),
			$keys[1] => $this->getFechaInicio(),
			$keys[2] => $this->getIdEtapa(),
			$keys[3] => $this->getIdCarrera(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EquipamientoCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdTipoEquipamiento($value);
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
		$keys = EquipamientoCarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdTipoEquipamiento($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechaInicio($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdEtapa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdCarrera($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EquipamientoCarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO)) $criteria->add(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, $this->id_tipo_equipamiento);
		if ($this->isColumnModified(EquipamientoCarreraPeer::FECHA_INICIO)) $criteria->add(EquipamientoCarreraPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(EquipamientoCarreraPeer::ID_ETAPA)) $criteria->add(EquipamientoCarreraPeer::ID_ETAPA, $this->id_etapa);
		if ($this->isColumnModified(EquipamientoCarreraPeer::ID_CARRERA)) $criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->id_carrera);
		if ($this->isColumnModified(EquipamientoCarreraPeer::CREATED_AT)) $criteria->add(EquipamientoCarreraPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EquipamientoCarreraPeer::CREATED_BY)) $criteria->add(EquipamientoCarreraPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(EquipamientoCarreraPeer::UPDATED_AT)) $criteria->add(EquipamientoCarreraPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(EquipamientoCarreraPeer::UPDATED_BY)) $criteria->add(EquipamientoCarreraPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EquipamientoCarreraPeer::DATABASE_NAME);

		$criteria->add(EquipamientoCarreraPeer::ID_TIPO_EQUIPAMIENTO, $this->id_tipo_equipamiento);
		$criteria->add(EquipamientoCarreraPeer::FECHA_INICIO, $this->fecha_inicio);
		$criteria->add(EquipamientoCarreraPeer::ID_ETAPA, $this->id_etapa);
		$criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->id_carrera);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getIdTipoEquipamiento();

		$pks[1] = $this->getFechaInicio();

		$pks[2] = $this->getIdEtapa();

		$pks[3] = $this->getIdCarrera();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setIdTipoEquipamiento($keys[0]);

		$this->setFechaInicio($keys[1]);

		$this->setIdEtapa($keys[2]);

		$this->setIdCarrera($keys[3]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		$copyObj->setNew(true);

		$copyObj->setIdTipoEquipamiento(NULL); 
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
			self::$peer = new EquipamientoCarreraPeer();
		}
		return self::$peer;
	}

	
	public function setTipoEquipamiento($v)
	{


		if ($v === null) {
			$this->setIdTipoEquipamiento(NULL);
		} else {
			$this->setIdTipoEquipamiento($v->getId());
		}


		$this->aTipoEquipamiento = $v;
	}


	
	public function getTipoEquipamiento($con = null)
	{
		if ($this->aTipoEquipamiento === null && ($this->id_tipo_equipamiento !== null)) {
						$this->aTipoEquipamiento = TipoEquipamientoPeer::retrieveByPK($this->id_tipo_equipamiento, $con);

			
		}
		return $this->aTipoEquipamiento;
	}

} 