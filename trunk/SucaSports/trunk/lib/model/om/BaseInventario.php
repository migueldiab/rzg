<?php


abstract class BaseInventario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $id_tipo_equipamiento;


	
	protected $updated_at;


	
	protected $updated_by;


	
	protected $id_estado;

	
	protected $aEquipamiento;

	
	protected $aEstado;

	
	protected $collAlquilers;

	
	protected $lastAlquilerCriteria = null;

	
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

	
	public function getIdEstado()
	{

		return $this->id_estado;
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
			$this->modifiedColumns[] = InventarioPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = InventarioPeer::UPDATED_BY;
		}

	} 
	
	public function setIdEstado($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_estado !== $v) {
			$this->id_estado = $v;
			$this->modifiedColumns[] = InventarioPeer::ID_ESTADO;
		}

		if ($this->aEstado !== null && $this->aEstado->getId() !== $v) {
			$this->aEstado = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->id_tipo_equipamiento = $rs->getInt($startcol + 2);

			$this->updated_at = $rs->getTimestamp($startcol + 3, null);

			$this->updated_by = $rs->getInt($startcol + 4);

			$this->id_estado = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
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
    if ($this->isModified() && !$this->isColumnModified(InventarioPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

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

			if ($this->aEstado !== null) {
				if ($this->aEstado->isModified()) {
					$affectedRows += $this->aEstado->save($con);
				}
				$this->setEstado($this->aEstado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InventarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InventarioPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlquilers !== null) {
				foreach($this->collAlquilers as $referrerFK) {
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

			if ($this->aEstado !== null) {
				if (!$this->aEstado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstado->getValidationFailures());
				}
			}


			if (($retval = InventarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlquilers !== null) {
					foreach($this->collAlquilers as $referrerFK) {
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
			case 3:
				return $this->getUpdatedAt();
				break;
			case 4:
				return $this->getUpdatedBy();
				break;
			case 5:
				return $this->getIdEstado();
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
			$keys[3] => $this->getUpdatedAt(),
			$keys[4] => $this->getUpdatedBy(),
			$keys[5] => $this->getIdEstado(),
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
			case 3:
				$this->setUpdatedAt($value);
				break;
			case 4:
				$this->setUpdatedBy($value);
				break;
			case 5:
				$this->setIdEstado($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InventarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdTipoEquipamiento($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUpdatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIdEstado($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InventarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(InventarioPeer::ID)) $criteria->add(InventarioPeer::ID, $this->id);
		if ($this->isColumnModified(InventarioPeer::NOMBRE)) $criteria->add(InventarioPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(InventarioPeer::ID_TIPO_EQUIPAMIENTO)) $criteria->add(InventarioPeer::ID_TIPO_EQUIPAMIENTO, $this->id_tipo_equipamiento);
		if ($this->isColumnModified(InventarioPeer::UPDATED_AT)) $criteria->add(InventarioPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(InventarioPeer::UPDATED_BY)) $criteria->add(InventarioPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(InventarioPeer::ID_ESTADO)) $criteria->add(InventarioPeer::ID_ESTADO, $this->id_estado);

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

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setIdEstado($this->id_estado);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlquilers() as $relObj) {
				$copyObj->addAlquiler($relObj->copy($deepCopy));
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

	
	public function setEstado($v)
	{


		if ($v === null) {
			$this->setIdEstado(NULL);
		} else {
			$this->setIdEstado($v->getId());
		}


		$this->aEstado = $v;
	}


	
	public function getEstado($con = null)
	{
		if ($this->aEstado === null && ($this->id_estado !== null)) {
						$this->aEstado = EstadoPeer::retrieveByPK($this->id_estado, $con);

			
		}
		return $this->aEstado;
	}

	
	public function initAlquilers()
	{
		if ($this->collAlquilers === null) {
			$this->collAlquilers = array();
		}
	}

	
	public function getAlquilers($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlquilers === null) {
			if ($this->isNew()) {
			   $this->collAlquilers = array();
			} else {

				$criteria->add(AlquilerPeer::ID_INVENTARIO, $this->getId());

				AlquilerPeer::addSelectColumns($criteria);
				$this->collAlquilers = AlquilerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlquilerPeer::ID_INVENTARIO, $this->getId());

				AlquilerPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlquilerCriteria) || !$this->lastAlquilerCriteria->equals($criteria)) {
					$this->collAlquilers = AlquilerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlquilerCriteria = $criteria;
		return $this->collAlquilers;
	}

	
	public function countAlquilers($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AlquilerPeer::ID_INVENTARIO, $this->getId());

		return AlquilerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlquiler(Alquiler $l)
	{
		$this->collAlquilers[] = $l;
		$l->setInventario($this);
	}

} 