<?php


abstract class BaseAsociacionCorredor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_asociacion;


	
	protected $id_corredor;

	
	protected $aAsociacion;

	
	protected $aCorredor;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdAsociacion()
	{

		return $this->id_asociacion;
	}

	
	public function getIdCorredor()
	{

		return $this->id_corredor;
	}

	
	public function setIdAsociacion($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_asociacion !== $v) {
			$this->id_asociacion = $v;
			$this->modifiedColumns[] = AsociacionCorredorPeer::ID_ASOCIACION;
		}

		if ($this->aAsociacion !== null && $this->aAsociacion->getId() !== $v) {
			$this->aAsociacion = null;
		}

	} 
	
	public function setIdCorredor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_corredor !== $v) {
			$this->id_corredor = $v;
			$this->modifiedColumns[] = AsociacionCorredorPeer::ID_CORREDOR;
		}

		if ($this->aCorredor !== null && $this->aCorredor->getId() !== $v) {
			$this->aCorredor = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_asociacion = $rs->getInt($startcol + 0);

			$this->id_corredor = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AsociacionCorredor object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AsociacionCorredorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AsociacionCorredorPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AsociacionCorredorPeer::DATABASE_NAME);
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


												
			if ($this->aAsociacion !== null) {
				if ($this->aAsociacion->isModified()) {
					$affectedRows += $this->aAsociacion->save($con);
				}
				$this->setAsociacion($this->aAsociacion);
			}

			if ($this->aCorredor !== null) {
				if ($this->aCorredor->isModified()) {
					$affectedRows += $this->aCorredor->save($con);
				}
				$this->setCorredor($this->aCorredor);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AsociacionCorredorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += AsociacionCorredorPeer::doUpdate($this, $con);
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


												
			if ($this->aAsociacion !== null) {
				if (!$this->aAsociacion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAsociacion->getValidationFailures());
				}
			}

			if ($this->aCorredor !== null) {
				if (!$this->aCorredor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCorredor->getValidationFailures());
				}
			}


			if (($retval = AsociacionCorredorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AsociacionCorredorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdAsociacion();
				break;
			case 1:
				return $this->getIdCorredor();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AsociacionCorredorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdAsociacion(),
			$keys[1] => $this->getIdCorredor(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AsociacionCorredorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdAsociacion($value);
				break;
			case 1:
				$this->setIdCorredor($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AsociacionCorredorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdAsociacion($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdCorredor($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AsociacionCorredorPeer::DATABASE_NAME);

		if ($this->isColumnModified(AsociacionCorredorPeer::ID_ASOCIACION)) $criteria->add(AsociacionCorredorPeer::ID_ASOCIACION, $this->id_asociacion);
		if ($this->isColumnModified(AsociacionCorredorPeer::ID_CORREDOR)) $criteria->add(AsociacionCorredorPeer::ID_CORREDOR, $this->id_corredor);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AsociacionCorredorPeer::DATABASE_NAME);

		$criteria->add(AsociacionCorredorPeer::ID_ASOCIACION, $this->id_asociacion);
		$criteria->add(AsociacionCorredorPeer::ID_CORREDOR, $this->id_corredor);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getIdAsociacion();

		$pks[1] = $this->getIdCorredor();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setIdAsociacion($keys[0]);

		$this->setIdCorredor($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{


		$copyObj->setNew(true);

		$copyObj->setIdAsociacion(NULL); 
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
			self::$peer = new AsociacionCorredorPeer();
		}
		return self::$peer;
	}

	
	public function setAsociacion($v)
	{


		if ($v === null) {
			$this->setIdAsociacion(NULL);
		} else {
			$this->setIdAsociacion($v->getId());
		}


		$this->aAsociacion = $v;
	}


	
	public function getAsociacion($con = null)
	{
		if ($this->aAsociacion === null && ($this->id_asociacion !== null)) {
						$this->aAsociacion = AsociacionPeer::retrieveByPK($this->id_asociacion, $con);

			
		}
		return $this->aAsociacion;
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