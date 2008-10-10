<?php


abstract class BaseFormaPago extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;

	
	protected $collCuentaCorrientes;

	
	protected $lastCuentaCorrienteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FormaPagoPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = FormaPagoPeer::NOMBRE;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating FormaPago object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FormaPagoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FormaPagoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FormaPagoPeer::DATABASE_NAME);
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
					$pk = FormaPagoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FormaPagoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCuentaCorrientes !== null) {
				foreach($this->collCuentaCorrientes as $referrerFK) {
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


			if (($retval = FormaPagoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCuentaCorrientes !== null) {
					foreach($this->collCuentaCorrientes as $referrerFK) {
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
		$pos = FormaPagoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombre();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FormaPagoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FormaPagoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombre($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FormaPagoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FormaPagoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FormaPagoPeer::ID)) $criteria->add(FormaPagoPeer::ID, $this->id);
		if ($this->isColumnModified(FormaPagoPeer::NOMBRE)) $criteria->add(FormaPagoPeer::NOMBRE, $this->nombre);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FormaPagoPeer::DATABASE_NAME);

		$criteria->add(FormaPagoPeer::ID, $this->id);

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

		$copyObj->setNombre($this->nombre);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCuentaCorrientes() as $relObj) {
				$copyObj->addCuentaCorriente($relObj->copy($deepCopy));
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
			self::$peer = new FormaPagoPeer();
		}
		return self::$peer;
	}

	
	public function initCuentaCorrientes()
	{
		if ($this->collCuentaCorrientes === null) {
			$this->collCuentaCorrientes = array();
		}
	}

	
	public function getCuentaCorrientes($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentaCorrientes === null) {
			if ($this->isNew()) {
			   $this->collCuentaCorrientes = array();
			} else {

				$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

				CuentaCorrientePeer::addSelectColumns($criteria);
				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

				CuentaCorrientePeer::addSelectColumns($criteria);
				if (!isset($this->lastCuentaCorrienteCriteria) || !$this->lastCuentaCorrienteCriteria->equals($criteria)) {
					$this->collCuentaCorrientes = CuentaCorrientePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuentaCorrienteCriteria = $criteria;
		return $this->collCuentaCorrientes;
	}

	
	public function countCuentaCorrientes($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

		return CuentaCorrientePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCuentaCorriente(CuentaCorriente $l)
	{
		$this->collCuentaCorrientes[] = $l;
		$l->setFormaPago($this);
	}


	
	public function getCuentaCorrientesJoinCorredor($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentaCorrientes === null) {
			if ($this->isNew()) {
				$this->collCuentaCorrientes = array();
			} else {

				$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelectJoinCorredor($criteria, $con);
			}
		} else {
									
			$criteria->add(CuentaCorrientePeer::ID_FORMA_PAGO, $this->getId());

			if (!isset($this->lastCuentaCorrienteCriteria) || !$this->lastCuentaCorrienteCriteria->equals($criteria)) {
				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelectJoinCorredor($criteria, $con);
			}
		}
		$this->lastCuentaCorrienteCriteria = $criteria;

		return $this->collCuentaCorrientes;
	}

} 