<?php


abstract class BaseInscripcion extends BaseObject  implements Persistent {


	
	protected static $peer;
	protected $id_corredor;
	protected $fecha_inicio;
	protected $id_etapa;
	protected $id_carrera;
	protected $created_at;
	protected $created_by;
	protected $updated_at;
	protected $updated_by;
	protected $fecha_inscripcion;
	protected $firma_digital;
	protected $id_categoria;
	protected $aCorredor;
  protected $aCategoria;
  protected $aCarrera;
  protected $aEtapa;
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

	
	public function getIdCategoria()
	{

		return $this->id_categoria;
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
			$this->modifiedColumns[] = InscripcionPeer::FECHA_INICIO;
		}

	} 
	
	public function setIdEtapa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_etapa !== $v) {
			$this->id_etapa = $v;
			$this->modifiedColumns[] = InscripcionPeer::ID_ETAPA;
		}

	} 
	
	public function setIdCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_carrera !== $v) {
			$this->id_carrera = $v;
			$this->modifiedColumns[] = InscripcionPeer::ID_CARRERA;
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
	
	public function setIdCategoria($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_categoria !== $v) {
			$this->id_categoria = $v;
			$this->modifiedColumns[] = InscripcionPeer::ID_CATEGORIA;
		}

		if ($this->aCategoria !== null && $this->aCategoria->getId() !== $v) {
			$this->aCategoria = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_corredor = $rs->getInt($startcol + 0);

			$this->fecha_inicio = $rs->getDate($startcol + 1, null);

			$this->id_etapa = $rs->getInt($startcol + 2);

			$this->id_carrera = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->fecha_inscripcion = $rs->getDate($startcol + 8, null);

			$this->firma_digital = $rs->getString($startcol + 9);

			$this->id_categoria = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
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


												
			if ($this->aCorredor !== null) {
				if ($this->aCorredor->isModified()) {
					$affectedRows += $this->aCorredor->save($con);
				}
				$this->setCorredor($this->aCorredor);
			}

			if ($this->aCategoria !== null) {
				if ($this->aCategoria->isModified()) {
					$affectedRows += $this->aCategoria->save($con);
				}
				$this->setCategoria($this->aCategoria);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InscripcionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
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


												
			if ($this->aCorredor !== null) {
				if (!$this->aCorredor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCorredor->getValidationFailures());
				}
			}

			if ($this->aCategoria !== null) {
				if (!$this->aCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategoria->getValidationFailures());
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
			case 8:
				return $this->getFechaInscripcion();
				break;
			case 9:
				return $this->getFirmaDigital();
				break;
			case 10:
				return $this->getIdCategoria();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InscripcionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdCorredor(),
			$keys[1] => $this->getFechaInicio(),
			$keys[2] => $this->getIdEtapa(),
			$keys[3] => $this->getIdCarrera(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getUpdatedBy(),
			$keys[8] => $this->getFechaInscripcion(),
			$keys[9] => $this->getFirmaDigital(),
			$keys[10] => $this->getIdCategoria(),
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
			case 8:
				$this->setFechaInscripcion($value);
				break;
			case 9:
				$this->setFirmaDigital($value);
				break;
			case 10:
				$this->setIdCategoria($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InscripcionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdCorredor($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechaInicio($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdEtapa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdCarrera($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFechaInscripcion($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFirmaDigital($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIdCategoria($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InscripcionPeer::DATABASE_NAME);

		if ($this->isColumnModified(InscripcionPeer::ID_CORREDOR)) $criteria->add(InscripcionPeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(InscripcionPeer::FECHA_INICIO)) $criteria->add(InscripcionPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(InscripcionPeer::ID_ETAPA)) $criteria->add(InscripcionPeer::ID_ETAPA, $this->id_etapa);
		if ($this->isColumnModified(InscripcionPeer::ID_CARRERA)) $criteria->add(InscripcionPeer::ID_CARRERA, $this->id_carrera);
		if ($this->isColumnModified(InscripcionPeer::CREATED_AT)) $criteria->add(InscripcionPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(InscripcionPeer::CREATED_BY)) $criteria->add(InscripcionPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(InscripcionPeer::UPDATED_AT)) $criteria->add(InscripcionPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(InscripcionPeer::UPDATED_BY)) $criteria->add(InscripcionPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(InscripcionPeer::FECHA_INSCRIPCION)) $criteria->add(InscripcionPeer::FECHA_INSCRIPCION, $this->fecha_inscripcion);
		if ($this->isColumnModified(InscripcionPeer::FIRMA_DIGITAL)) $criteria->add(InscripcionPeer::FIRMA_DIGITAL, $this->firma_digital);
		if ($this->isColumnModified(InscripcionPeer::ID_CATEGORIA)) $criteria->add(InscripcionPeer::ID_CATEGORIA, $this->id_categoria);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InscripcionPeer::DATABASE_NAME);

		$criteria->add(InscripcionPeer::ID_CORREDOR, $this->id_corredor);
		$criteria->add(InscripcionPeer::FECHA_INICIO, $this->fecha_inicio);
		$criteria->add(InscripcionPeer::ID_ETAPA, $this->id_etapa);
		$criteria->add(InscripcionPeer::ID_CARRERA, $this->id_carrera);

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

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setFechaInscripcion($this->fecha_inscripcion);

		$copyObj->setFirmaDigital($this->firma_digital);

		$copyObj->setIdCategoria($this->id_categoria);


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
			self::$peer = new InscripcionPeer();
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

	
	public function setCategoria($v)
	{


		if ($v === null) {
			$this->setIdCategoria(NULL);
		} else {
			$this->setIdCategoria($v->getId());
		}


		$this->aCategoria = $v;
	}


	
	public function getCategoria($con = null)
	{
		if ($this->aCategoria === null && ($this->id_categoria !== null)) {
						$this->aCategoria = CategoriaPeer::retrieveByPK($this->id_categoria, $con);

			
		}
		return $this->aCategoria;
	}

} 