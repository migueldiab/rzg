<?php


abstract class BaseCuentaCorriente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_corredor;


	
	protected $id_forma_pago;


	
	protected $monto;

	
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
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_corredor = $rs->getInt($startcol + 1);

			$this->id_forma_pago = $rs->getInt($startcol + 2);

			$this->monto = $rs->getFloat($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CuentaCorrientePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdCorredor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdFormaPago($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CuentaCorrientePeer::DATABASE_NAME);

		if ($this->isColumnModified(CuentaCorrientePeer::ID)) $criteria->add(CuentaCorrientePeer::ID, $this->id);
		if ($this->isColumnModified(CuentaCorrientePeer::ID_CORREDOR)) $criteria->add(CuentaCorrientePeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(CuentaCorrientePeer::ID_FORMA_PAGO)) $criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->id_forma_pago);
		if ($this->isColumnModified(CuentaCorrientePeer::MONTO)) $criteria->add(CuentaCorrientePeer::MONTO, $this->monto);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CuentaCorrientePeer::DATABASE_NAME);

		$criteria->add(CuentaCorrientePeer::ID, $this->id);

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

		$copyObj->setIdCorredor($this->id_corredor);

		$copyObj->setIdFormaPago($this->id_forma_pago);

		$copyObj->setMonto($this->monto);


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