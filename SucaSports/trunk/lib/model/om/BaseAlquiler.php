<?php


abstract class BaseAlquiler extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_equipamiento;


	
	protected $id_fecha_etapa_carrera;


	
	protected $id_usuario;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aInventario;

	
	protected $aFechaEtapaCarrera;

	
	protected $aUsuario;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdEquipamiento()
	{

		return $this->id_equipamiento;
	}

	
	public function getIdFechaEtapaCarrera()
	{

		return $this->id_fecha_etapa_carrera;
	}

	
	public function getIdUsuario()
	{

		return $this->id_usuario;
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
			$this->modifiedColumns[] = AlquilerPeer::ID;
		}

	} 
	
	public function setIdEquipamiento($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_equipamiento !== $v) {
			$this->id_equipamiento = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID_EQUIPAMIENTO;
		}

		if ($this->aInventario !== null && $this->aInventario->getId() !== $v) {
			$this->aInventario = null;
		}

	} 
	
	public function setIdFechaEtapaCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_fecha_etapa_carrera !== $v) {
			$this->id_fecha_etapa_carrera = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID_FECHA_ETAPA_CARRERA;
		}

		if ($this->aFechaEtapaCarrera !== null && $this->aFechaEtapaCarrera->getId() !== $v) {
			$this->aFechaEtapaCarrera = null;
		}

	} 
	
	public function setIdUsuario($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_usuario !== $v) {
			$this->id_usuario = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID_USUARIO;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
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
			$this->modifiedColumns[] = AlquilerPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = AlquilerPeer::CREATED_BY;
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
			$this->modifiedColumns[] = AlquilerPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = AlquilerPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_equipamiento = $rs->getInt($startcol + 1);

			$this->id_fecha_etapa_carrera = $rs->getInt($startcol + 2);

			$this->id_usuario = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Alquiler object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AlquilerPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AlquilerPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AlquilerPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AlquilerPeer::DATABASE_NAME);
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


												
			if ($this->aInventario !== null) {
				if ($this->aInventario->isModified()) {
					$affectedRows += $this->aInventario->save($con);
				}
				$this->setInventario($this->aInventario);
			}

			if ($this->aFechaEtapaCarrera !== null) {
				if ($this->aFechaEtapaCarrera->isModified()) {
					$affectedRows += $this->aFechaEtapaCarrera->save($con);
				}
				$this->setFechaEtapaCarrera($this->aFechaEtapaCarrera);
			}

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlquilerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AlquilerPeer::doUpdate($this, $con);
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


												
			if ($this->aInventario !== null) {
				if (!$this->aInventario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInventario->getValidationFailures());
				}
			}

			if ($this->aFechaEtapaCarrera !== null) {
				if (!$this->aFechaEtapaCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFechaEtapaCarrera->getValidationFailures());
				}
			}

			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}


			if (($retval = AlquilerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlquilerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdEquipamiento();
				break;
			case 2:
				return $this->getIdFechaEtapaCarrera();
				break;
			case 3:
				return $this->getIdUsuario();
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
		$keys = AlquilerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdEquipamiento(),
			$keys[2] => $this->getIdFechaEtapaCarrera(),
			$keys[3] => $this->getIdUsuario(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlquilerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdEquipamiento($value);
				break;
			case 2:
				$this->setIdFechaEtapaCarrera($value);
				break;
			case 3:
				$this->setIdUsuario($value);
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
		$keys = AlquilerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdEquipamiento($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdFechaEtapaCarrera($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdUsuario($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlquilerPeer::ID)) $criteria->add(AlquilerPeer::ID, $this->id);
		if ($this->isColumnModified(AlquilerPeer::ID_EQUIPAMIENTO)) $criteria->add(AlquilerPeer::ID_EQUIPAMIENTO, $this->id_equipamiento);
		if ($this->isColumnModified(AlquilerPeer::ID_FECHA_ETAPA_CARRERA)) $criteria->add(AlquilerPeer::ID_FECHA_ETAPA_CARRERA, $this->id_fecha_etapa_carrera);
		if ($this->isColumnModified(AlquilerPeer::ID_USUARIO)) $criteria->add(AlquilerPeer::ID_USUARIO, $this->id_usuario);
		if ($this->isColumnModified(AlquilerPeer::CREATED_AT)) $criteria->add(AlquilerPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AlquilerPeer::CREATED_BY)) $criteria->add(AlquilerPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(AlquilerPeer::UPDATED_AT)) $criteria->add(AlquilerPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(AlquilerPeer::UPDATED_BY)) $criteria->add(AlquilerPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);

		$criteria->add(AlquilerPeer::ID, $this->id);

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

		$copyObj->setIdEquipamiento($this->id_equipamiento);

		$copyObj->setIdFechaEtapaCarrera($this->id_fecha_etapa_carrera);

		$copyObj->setIdUsuario($this->id_usuario);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


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
			self::$peer = new AlquilerPeer();
		}
		return self::$peer;
	}

	
	public function setInventario($v)
	{


		if ($v === null) {
			$this->setIdEquipamiento(NULL);
		} else {
			$this->setIdEquipamiento($v->getId());
		}


		$this->aInventario = $v;
	}


	
	public function getInventario($con = null)
	{
		if ($this->aInventario === null && ($this->id_equipamiento !== null)) {
						$this->aInventario = InventarioPeer::retrieveByPK($this->id_equipamiento, $con);

			
		}
		return $this->aInventario;
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

	
	public function setUsuario($v)
	{


		if ($v === null) {
			$this->setIdUsuario(NULL);
		} else {
			$this->setIdUsuario($v->getId());
		}


		$this->aUsuario = $v;
	}


	
	public function getUsuario($con = null)
	{
		if ($this->aUsuario === null && ($this->id_usuario !== null)) {
						$this->aUsuario = UsuarioPeer::retrieveByPK($this->id_usuario, $con);

			
		}
		return $this->aUsuario;
	}

} 