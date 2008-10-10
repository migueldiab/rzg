<?php


abstract class BaseEquipamiento extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $marca;


	
	protected $id_tipo_equipamiento;

	
	protected $aTipoEquipamiento;

	
	protected $collCorredorEquipamientos;

	
	protected $lastCorredorEquipamientoCriteria = null;

	
	protected $collInventarios;

	
	protected $lastInventarioCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getMarca()
	{

		return $this->marca;
	}

	
	public function getIdTipoEquipamiento()
	{

		return $this->id_tipo_equipamiento;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EquipamientoPeer::ID;
		}

	} 
	
	public function setMarca($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->marca !== $v) {
			$this->marca = $v;
			$this->modifiedColumns[] = EquipamientoPeer::MARCA;
		}

	} 
	
	public function setIdTipoEquipamiento($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_tipo_equipamiento !== $v) {
			$this->id_tipo_equipamiento = $v;
			$this->modifiedColumns[] = EquipamientoPeer::ID_TIPO_EQUIPAMIENTO;
		}

		if ($this->aTipoEquipamiento !== null && $this->aTipoEquipamiento->getId() !== $v) {
			$this->aTipoEquipamiento = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->marca = $rs->getString($startcol + 1);

			$this->id_tipo_equipamiento = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Equipamiento object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EquipamientoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EquipamientoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EquipamientoPeer::DATABASE_NAME);
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
					$pk = EquipamientoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += EquipamientoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCorredorEquipamientos !== null) {
				foreach($this->collCorredorEquipamientos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInventarios !== null) {
				foreach($this->collInventarios as $referrerFK) {
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


												
			if ($this->aTipoEquipamiento !== null) {
				if (!$this->aTipoEquipamiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipoEquipamiento->getValidationFailures());
				}
			}


			if (($retval = EquipamientoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCorredorEquipamientos !== null) {
					foreach($this->collCorredorEquipamientos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInventarios !== null) {
					foreach($this->collInventarios as $referrerFK) {
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
		$pos = EquipamientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMarca();
				break;
			case 2:
				return $this->getIdTipoEquipamiento();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EquipamientoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMarca(),
			$keys[2] => $this->getIdTipoEquipamiento(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EquipamientoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMarca($value);
				break;
			case 2:
				$this->setIdTipoEquipamiento($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EquipamientoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMarca($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdTipoEquipamiento($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EquipamientoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EquipamientoPeer::ID)) $criteria->add(EquipamientoPeer::ID, $this->id);
		if ($this->isColumnModified(EquipamientoPeer::MARCA)) $criteria->add(EquipamientoPeer::MARCA, $this->marca);
		if ($this->isColumnModified(EquipamientoPeer::ID_TIPO_EQUIPAMIENTO)) $criteria->add(EquipamientoPeer::ID_TIPO_EQUIPAMIENTO, $this->id_tipo_equipamiento);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EquipamientoPeer::DATABASE_NAME);

		$criteria->add(EquipamientoPeer::ID, $this->id);

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

		$copyObj->setMarca($this->marca);

		$copyObj->setIdTipoEquipamiento($this->id_tipo_equipamiento);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCorredorEquipamientos() as $relObj) {
				$copyObj->addCorredorEquipamiento($relObj->copy($deepCopy));
			}

			foreach($this->getInventarios() as $relObj) {
				$copyObj->addInventario($relObj->copy($deepCopy));
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
			self::$peer = new EquipamientoPeer();
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

	
	public function initCorredorEquipamientos()
	{
		if ($this->collCorredorEquipamientos === null) {
			$this->collCorredorEquipamientos = array();
		}
	}

	
	public function getCorredorEquipamientos($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredorEquipamientos === null) {
			if ($this->isNew()) {
			   $this->collCorredorEquipamientos = array();
			} else {

				$criteria->add(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $this->getId());

				CorredorEquipamientoPeer::addSelectColumns($criteria);
				$this->collCorredorEquipamientos = CorredorEquipamientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $this->getId());

				CorredorEquipamientoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCorredorEquipamientoCriteria) || !$this->lastCorredorEquipamientoCriteria->equals($criteria)) {
					$this->collCorredorEquipamientos = CorredorEquipamientoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCorredorEquipamientoCriteria = $criteria;
		return $this->collCorredorEquipamientos;
	}

	
	public function countCorredorEquipamientos($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $this->getId());

		return CorredorEquipamientoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCorredorEquipamiento(CorredorEquipamiento $l)
	{
		$this->collCorredorEquipamientos[] = $l;
		$l->setEquipamiento($this);
	}


	
	public function getCorredorEquipamientosJoinCorredor($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredorEquipamientos === null) {
			if ($this->isNew()) {
				$this->collCorredorEquipamientos = array();
			} else {

				$criteria->add(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $this->getId());

				$this->collCorredorEquipamientos = CorredorEquipamientoPeer::doSelectJoinCorredor($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $this->getId());

			if (!isset($this->lastCorredorEquipamientoCriteria) || !$this->lastCorredorEquipamientoCriteria->equals($criteria)) {
				$this->collCorredorEquipamientos = CorredorEquipamientoPeer::doSelectJoinCorredor($criteria, $con);
			}
		}
		$this->lastCorredorEquipamientoCriteria = $criteria;

		return $this->collCorredorEquipamientos;
	}

	
	public function initInventarios()
	{
		if ($this->collInventarios === null) {
			$this->collInventarios = array();
		}
	}

	
	public function getInventarios($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInventarios === null) {
			if ($this->isNew()) {
			   $this->collInventarios = array();
			} else {

				$criteria->add(InventarioPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

				InventarioPeer::addSelectColumns($criteria);
				$this->collInventarios = InventarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InventarioPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

				InventarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastInventarioCriteria) || !$this->lastInventarioCriteria->equals($criteria)) {
					$this->collInventarios = InventarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInventarioCriteria = $criteria;
		return $this->collInventarios;
	}

	
	public function countInventarios($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InventarioPeer::ID_TIPO_EQUIPAMIENTO, $this->getId());

		return InventarioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInventario(Inventario $l)
	{
		$this->collInventarios[] = $l;
		$l->setEquipamiento($this);
	}

} 