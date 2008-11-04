<?php


abstract class BaseCuentaCorriente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_corredor;


	
	protected $id_forma_pago;


	
	protected $monto;


	
	protected $concepto;


	
	protected $firma_digital;


	
	protected $fecha_de_pago;


	
	protected $nota;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aCorredor;

	
	protected $aFormaPago;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdCorredor()
	{

		return $this->id_corredor;
	}

	
	public function getIdFormaPago()
	{

		return $this->id_forma_pago;
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getConcepto()
	{

		return $this->concepto;
	}

	
	public function getFirmaDigital()
	{

		return $this->firma_digital;
	}

	
	public function getFechaDePago($format = 'Y-m-d')
	{

		if ($this->fecha_de_pago === null || $this->fecha_de_pago === '') {
			return null;
		} elseif (!is_int($this->fecha_de_pago)) {
						$ts = strtotime($this->fecha_de_pago);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_de_pago] as date/time value: " . var_export($this->fecha_de_pago, true));
			}
		} else {
			$ts = $this->fecha_de_pago;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNota()
	{

		return $this->nota;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::ID;
		}

	} 
	
	public function setIdCorredor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_corredor !== $v) {
			$this->id_corredor = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::ID_CORREDOR;
		}

		if ($this->aCorredor !== null && $this->aCorredor->getId() !== $v) {
			$this->aCorredor = null;
		}

	} 
	
	public function setIdFormaPago($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_forma_pago !== $v) {
			$this->id_forma_pago = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::ID_FORMA_PAGO;
		}

		if ($this->aFormaPago !== null && $this->aFormaPago->getId() !== $v) {
			$this->aFormaPago = null;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::MONTO;
		}

	} 
	
	public function setConcepto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->concepto !== $v) {
			$this->concepto = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::CONCEPTO;
		}

	} 
	
	public function setFirmaDigital($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->firma_digital !== $v) {
			$this->firma_digital = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::FIRMA_DIGITAL;
		}

	} 
	
	public function setFechaDePago($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_de_pago] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_de_pago !== $ts) {
			$this->fecha_de_pago = $ts;
			$this->modifiedColumns[] = CuentaCorrientePeer::FECHA_DE_PAGO;
		}

	} 
	
	public function setNota($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nota !== $v) {
			$this->nota = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::NOTA;
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
			$this->modifiedColumns[] = CuentaCorrientePeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::CREATED_BY;
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
			$this->modifiedColumns[] = CuentaCorrientePeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = CuentaCorrientePeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_corredor = $rs->getInt($startcol + 1);

			$this->id_forma_pago = $rs->getInt($startcol + 2);

			$this->monto = $rs->getFloat($startcol + 3);

			$this->concepto = $rs->getString($startcol + 4);

			$this->firma_digital = $rs->getString($startcol + 5);

			$this->fecha_de_pago = $rs->getDate($startcol + 6, null);

			$this->nota = $rs->getString($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->created_by = $rs->getInt($startcol + 9);

			$this->updated_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_by = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CuentaCorriente object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CuentaCorrientePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CuentaCorrientePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(CuentaCorrientePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CuentaCorrientePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CuentaCorrientePeer::DATABASE_NAME);
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

			if ($this->aFormaPago !== null) {
				if ($this->aFormaPago->isModified()) {
					$affectedRows += $this->aFormaPago->save($con);
				}
				$this->setFormaPago($this->aFormaPago);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CuentaCorrientePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CuentaCorrientePeer::doUpdate($this, $con);
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

			if ($this->aFormaPago !== null) {
				if (!$this->aFormaPago->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFormaPago->getValidationFailures());
				}
			}


			if (($retval = CuentaCorrientePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CuentaCorrientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdCorredor();
				break;
			case 2:
				return $this->getIdFormaPago();
				break;
			case 3:
				return $this->getMonto();
				break;
			case 4:
				return $this->getConcepto();
				break;
			case 5:
				return $this->getFirmaDigital();
				break;
			case 6:
				return $this->getFechaDePago();
				break;
			case 7:
				return $this->getNota();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			case 11:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CuentaCorrientePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdCorredor(),
			$keys[2] => $this->getIdFormaPago(),
			$keys[3] => $this->getMonto(),
			$keys[4] => $this->getConcepto(),
			$keys[5] => $this->getFirmaDigital(),
			$keys[6] => $this->getFechaDePago(),
			$keys[7] => $this->getNota(),
			$keys[8] => $this->getCreatedAt(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getUpdatedAt(),
			$keys[11] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CuentaCorrientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdCorredor($value);
				break;
			case 2:
				$this->setIdFormaPago($value);
				break;
			case 3:
				$this->setMonto($value);
				break;
			case 4:
				$this->setConcepto($value);
				break;
			case 5:
				$this->setFirmaDigital($value);
				break;
			case 6:
				$this->setFechaDePago($value);
				break;
			case 7:
				$this->setNota($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
			case 11:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CuentaCorrientePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdCorredor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdFormaPago($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setConcepto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFirmaDigital($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaDePago($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNota($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedBy($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CuentaCorrientePeer::DATABASE_NAME);

		if ($this->isColumnModified(CuentaCorrientePeer::ID)) $criteria->add(CuentaCorrientePeer::ID, $this->id);
		if ($this->isColumnModified(CuentaCorrientePeer::ID_CORREDOR)) $criteria->add(CuentaCorrientePeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(CuentaCorrientePeer::ID_FORMA_PAGO)) $criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->id_forma_pago);
		if ($this->isColumnModified(CuentaCorrientePeer::MONTO)) $criteria->add(CuentaCorrientePeer::MONTO, $this->monto);
		if ($this->isColumnModified(CuentaCorrientePeer::CONCEPTO)) $criteria->add(CuentaCorrientePeer::CONCEPTO, $this->concepto);
		if ($this->isColumnModified(CuentaCorrientePeer::FIRMA_DIGITAL)) $criteria->add(CuentaCorrientePeer::FIRMA_DIGITAL, $this->firma_digital);
		if ($this->isColumnModified(CuentaCorrientePeer::FECHA_DE_PAGO)) $criteria->add(CuentaCorrientePeer::FECHA_DE_PAGO, $this->fecha_de_pago);
		if ($this->isColumnModified(CuentaCorrientePeer::NOTA)) $criteria->add(CuentaCorrientePeer::NOTA, $this->nota);
		if ($this->isColumnModified(CuentaCorrientePeer::CREATED_AT)) $criteria->add(CuentaCorrientePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CuentaCorrientePeer::CREATED_BY)) $criteria->add(CuentaCorrientePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(CuentaCorrientePeer::UPDATED_AT)) $criteria->add(CuentaCorrientePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(CuentaCorrientePeer::UPDATED_BY)) $criteria->add(CuentaCorrientePeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CuentaCorrientePeer::DATABASE_NAME);

		$criteria->add(CuentaCorrientePeer::ID, $this->id);
		$criteria->add(CuentaCorrientePeer::ID_CORREDOR, $this->id_corredor);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getId();

		$pks[1] = $this->getIdCorredor();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setId($keys[0]);

		$this->setIdCorredor($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdFormaPago($this->id_forma_pago);

		$copyObj->setMonto($this->monto);

		$copyObj->setConcepto($this->concepto);

		$copyObj->setFirmaDigital($this->firma_digital);

		$copyObj->setFechaDePago($this->fecha_de_pago);

		$copyObj->setNota($this->nota);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
		$copyObj->setIdCorredor(NULL); 
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
			self::$peer = new CuentaCorrientePeer();
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

	
	public function setFormaPago($v)
	{


		if ($v === null) {
			$this->setIdFormaPago(NULL);
		} else {
			$this->setIdFormaPago($v->getId());
		}


		$this->aFormaPago = $v;
	}


	
	public function getFormaPago($con = null)
	{
		if ($this->aFormaPago === null && ($this->id_forma_pago !== null)) {
						$this->aFormaPago = FormaPagoPeer::retrieveByPK($this->id_forma_pago, $con);

			
		}
		return $this->aFormaPago;
	}

} 