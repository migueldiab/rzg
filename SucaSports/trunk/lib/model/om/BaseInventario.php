<?php


abstract class BaseInventario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $id_tipo_equipamiento;

	
	protected $aEquipamiento;

	
	protected $collAlquileress;

	
	protected $lastAlquileresCriteria = null;

	
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
			$this->modifiedColumns[] = InventarioPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = InventarioPeer::NOMBRE;
		}

	} 
	
	public function setIdTipoEquipamiento($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_tipo_equipamiento !== $v) {
			$this->id_tipo_equipamiento = $v;
			$this->modifiedColumns[] = InventarioPeer::ID_TIPO_EQUIPAMIENTO;
		}

		if ($this->aEquipamiento !== null && $this->aEquipamiento->getId() !== $v) {
			$this->aEquipamiento = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->id_tipo_equipamiento = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Inventario object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(InventarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InventarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InventarioPeer::DATABASE_NAME);
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


												
			if ($this->aEquipamiento !== null) {
				if ($this->aEquipamiento->isModified()) {
					$affectedRows += $this->aEquipamiento->save($con);
				}
				$this->setEquipamiento($this->aEquipamiento);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InventarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += InventarioPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlquileress !== null) {
				foreach($this->collAlquileress as $referrerFK) {
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


												
			if ($this->aEquipamiento !== null) {
				if (!$this->aEquipamiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEquipamiento->getValidationFailures());
				}
			}


			if (($retval = InventarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlquileress !== null) {
					foreach($this->collAlquileress as $referrerFK) {
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
		$pos = InventarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			case 2:
				return $this->getIdTipoEquipamiento();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InventarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getIdTipoEquipamiento(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InventarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			case 2:
				$this->setIdTipoEquipamiento($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InventarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdTipoEquipamiento($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InventarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(InventarioPeer::ID)) $criteria->add(InventarioPeer::ID, $this->id);
		if ($this->isColumnModified(InventarioPeer::NOMBRE)) $criteria->add(InventarioPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(InventarioPeer::ID_TIPO_EQUIPAMIENTO)) $criteria->add(InventarioPeer::ID_TIPO_EQUIPAMIENTO, $this->id_tipo_equipamiento);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InventarioPeer::DATABASE_NAME);

		$criteria->add(InventarioPeer::ID, $this->id);

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

		$copyObj->setIdTipoEquipamiento($this->id_tipo_equipamiento);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlquileress() as $relObj) {
				$copyObj->addAlquileres($relObj->copy($deepCopy));
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
			self::$peer = new InventarioPeer();
		}
		return self::$peer;
	}

	
	public function setEquipamiento($v)
	{


		if ($v === null) {
			$this->setIdTipoEquipamiento(NULL);
		} else {
			$this->setIdTipoEquipamiento($v->getId());
		}


		$this->aEquipamiento = $v;
	}


	
	public function getEquipamiento($con = null)
	{
		if ($this->aEquipamiento === null && ($this->id_tipo_equipamiento !== null)) {
						$this->aEquipamiento = EquipamientoPeer::retrieveByPK($this->id_tipo_equipamiento, $con);

			
		}
		return $this->aEquipamiento;
	}

	
	public function initAlquileress()
	{
		if ($this->collAlquileress === null) {
			$this->collAlquileress = array();
		}
	}

	
	public function getAlquileress($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlquileress === null) {
			if ($this->isNew()) {
			   $this->collAlquileress = array();
			} else {

				$criteria->add(AlquileresPeer::ID_EQUIPAMIENTO, $this->getId());

				AlquileresPeer::addSelectColumns($criteria);
				$this->collAlquileress = AlquileresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlquileresPeer::ID_EQUIPAMIENTO, $this->getId());

				AlquileresPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlquileresCriteria) || !$this->lastAlquileresCriteria->equals($criteria)) {
					$this->collAlquileress = AlquileresPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlquileresCriteria = $criteria;
		return $this->collAlquileress;
	}

	
	public function countAlquileress($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlquileresPeer::ID_EQUIPAMIENTO, $this->getId());

		return AlquileresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlquileres(Alquileres $l)
	{
		$this->collAlquileress[] = $l;
		$l->setInventario($this);
	}


	
	public function getAlquileressJoinFechaEtapaCarrera($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlquileress === null) {
			if ($this->isNew()) {
				$this->collAlquileress = array();
			} else {

				$criteria->add(AlquileresPeer::ID_EQUIPAMIENTO, $this->getId());

				$this->collAlquileress = AlquileresPeer::doSelectJoinFechaEtapaCarrera($criteria, $con);
			}
		} else {
									
			$criteria->add(AlquileresPeer::ID_EQUIPAMIENTO, $this->getId());

			if (!isset($this->lastAlquileresCriteria) || !$this->lastAlquileresCriteria->equals($criteria)) {
				$this->collAlquileress = AlquileresPeer::doSelectJoinFechaEtapaCarrera($criteria, $con);
			}
		}
		$this->lastAlquileresCriteria = $criteria;

		return $this->collAlquileress;
	}

} 