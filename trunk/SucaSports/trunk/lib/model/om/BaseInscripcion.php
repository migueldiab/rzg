<?php


abstract class BaseInscripcion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_fecha_etapa_carrera;


	
	protected $id_corredor;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;


	
	protected $fecha_inscripcion;


	
	protected $firma_digital;


	
	protected $cuenta_corriente_id;

	
	protected $aFechaEtapaCarrera;

	
	protected $aCorredor;

	
	protected $aCuentaCorriente;

	
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

	
	public function getFechaInscripcion($format = 'Y-m-d')
	{

		if ($this->fecha_inscripcion === null || $this->fecha_inscripcion === '') {
			return null;
		} elseif (!is_int($this->fecha_inscripcion)) {
						$ts = strtotime($this->fecha_inscripcion);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_inscripcion] as date/time value: " . var_export($this->fecha_inscripcion, true));
			}
		} else {
			$ts = $this->fecha_inscripcion;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFirmaDigital()
	{

		return $this->firma_digital;
	}

	
	public function getCuentaCorrienteId()
	{

		return $this->cuenta_corriente_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = InscripcionPeer::ID;
		}

	} 
	
	public function setIdFechaEtapaCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_fecha_etapa_carrera !== $v) {
			$this->id_fecha_etapa_carrera = $v;
			$this->modifiedColumns[] = InscripcionPeer::ID_FECHA_ETAPA_CARRERA;
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
			$this->modifiedColumns[] = InscripcionPeer::ID_CORREDOR;
		}

		if ($this->aCorredor !== null && $this->aCorredor->getId() !== $v) {
			$this->aCorredor = null;
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
			$this->modifiedColumns[] = InscripcionPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = InscripcionPeer::CREATED_BY;
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
			$this->modifiedColumns[] = InscripcionPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = InscripcionPeer::UPDATED_BY;
		}

	} 
	
	public function setFechaInscripcion($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_inscripcion] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_inscripcion !== $ts) {
			$this->fecha_inscripcion = $ts;
			$this->modifiedColumns[] = InscripcionPeer::FECHA_INSCRIPCION;
		}

	} 
	
	public function setFirmaDigital($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->firma_digital !== $v) {
			$this->firma_digital = $v;
			$this->modifiedColumns[] = InscripcionPeer::FIRMA_DIGITAL;
		}

	} 
	
	public function setCuentaCorrienteId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->cuenta_corriente_id !== $v) {
			$this->cuenta_corriente_id = $v;
			$this->modifiedColumns[] = InscripcionPeer::CUENTA_CORRIENTE_ID;
		}

		if ($this->aCuentaCorriente !== null && $this->aCuentaCorriente->getId() !== $v) {
			$this->aCuentaCorriente = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_fecha_etapa_carrera = $rs->getInt($startcol + 1);

			$this->id_corredor = $rs->getInt($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->created_by = $rs->getInt($startcol + 4);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_by = $rs->getInt($startcol + 6);

			$this->fecha_inscripcion = $rs->getDate($startcol + 7, null);

			$this->firma_digital = $rs->getString($startcol + 8);

			$this->cuenta_corriente_id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Inscripcion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InscripcionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InscripcionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(InscripcionPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(InscripcionPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InscripcionPeer::DATABASE_NAME);
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

			if ($this->aCuentaCorriente !== null) {
				if ($this->aCuentaCorriente->isModified()) {
					$affectedRows += $this->aCuentaCorriente->save($con);
				}
				$this->setCuentaCorriente($this->aCuentaCorriente);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InscripcionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InscripcionPeer::doUpdate($this, $con);
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

			if ($this->aCuentaCorriente !== null) {
				if (!$this->aCuentaCorriente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCuentaCorriente->getValidationFailures());
				}
			}


			if (($retval = InscripcionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InscripcionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCreatedAt();
				break;
			case 4:
				return $this->getCreatedBy();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			case 6:
				return $this->getUpdatedBy();
				break;
			case 7:
				return $this->getFechaInscripcion();
				break;
			case 8:
				return $this->getFirmaDigital();
				break;
			case 9:
				return $this->getCuentaCorrienteId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InscripcionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdFechaEtapaCarrera(),
			$keys[2] => $this->getIdCorredor(),
			$keys[3] => $this->getCreatedAt(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getUpdatedAt(),
			$keys[6] => $this->getUpdatedBy(),
			$keys[7] => $this->getFechaInscripcion(),
			$keys[8] => $this->getFirmaDigital(),
			$keys[9] => $this->getCuentaCorrienteId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InscripcionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCreatedAt($value);
				break;
			case 4:
				$this->setCreatedBy($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
			case 6:
				$this->setUpdatedBy($value);
				break;
			case 7:
				$this->setFechaInscripcion($value);
				break;
			case 8:
				$this->setFirmaDigital($value);
				break;
			case 9:
				$this->setCuentaCorrienteId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InscripcionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdFechaEtapaCarrera($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdCorredor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFechaInscripcion($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFirmaDigital($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCuentaCorrienteId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InscripcionPeer::DATABASE_NAME);

		if ($this->isColumnModified(InscripcionPeer::ID)) $criteria->add(InscripcionPeer::ID, $this->id);
		if ($this->isColumnModified(InscripcionPeer::ID_FECHA_ETAPA_CARRERA)) $criteria->add(InscripcionPeer::ID_FECHA_ETAPA_CARRERA, $this->id_fecha_etapa_carrera);
		if ($this->isColumnModified(InscripcionPeer::ID_CORREDOR)) $criteria->add(InscripcionPeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(InscripcionPeer::CREATED_AT)) $criteria->add(InscripcionPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(InscripcionPeer::CREATED_BY)) $criteria->add(InscripcionPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(InscripcionPeer::UPDATED_AT)) $criteria->add(InscripcionPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(InscripcionPeer::UPDATED_BY)) $criteria->add(InscripcionPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(InscripcionPeer::FECHA_INSCRIPCION)) $criteria->add(InscripcionPeer::FECHA_INSCRIPCION, $this->fecha_inscripcion);
		if ($this->isColumnModified(InscripcionPeer::FIRMA_DIGITAL)) $criteria->add(InscripcionPeer::FIRMA_DIGITAL, $this->firma_digital);
		if ($this->isColumnModified(InscripcionPeer::CUENTA_CORRIENTE_ID)) $criteria->add(InscripcionPeer::CUENTA_CORRIENTE_ID, $this->cuenta_corriente_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InscripcionPeer::DATABASE_NAME);

		$criteria->add(InscripcionPeer::ID, $this->id);

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

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setFechaInscripcion($this->fecha_inscripcion);

		$copyObj->setFirmaDigital($this->firma_digital);

		$copyObj->setCuentaCorrienteId($this->cuenta_corriente_id);


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
			self::$peer = new InscripcionPeer();
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

	
	public function setCuentaCorriente($v)
	{


		if ($v === null) {
			$this->setCuentaCorrienteId(NULL);
		} else {
			$this->setCuentaCorrienteId($v->getId());
		}


		$this->aCuentaCorriente = $v;
	}


	
	public function getCuentaCorriente($con = null)
	{
		if ($this->aCuentaCorriente === null && ($this->cuenta_corriente_id !== null)) {
						$this->aCuentaCorriente = CuentaCorrientePeer::retrieveByPK($this->cuenta_corriente_id, $con);

			
		}
		return $this->aCuentaCorriente;
	}

} 