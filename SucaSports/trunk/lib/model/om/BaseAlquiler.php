<?php


abstract class BaseAlquiler extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_inventario;


	
	protected $fecha_inicio;


	
	protected $id_etapa;


	
	protected $id_carrera;


	
	protected $id_cuenta_corriente;


	
	protected $id_corredor;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aInventario;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdInventario()
	{

		return $this->id_inventario;
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

	
	public function getIdCuentaCorriente()
	{

		return $this->id_cuenta_corriente;
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

	
	public function setIdInventario($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_inventario !== $v) {
			$this->id_inventario = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID_INVENTARIO;
		}

		if ($this->aInventario !== null && $this->aInventario->getId() !== $v) {
			$this->aInventario = null;
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
			$this->modifiedColumns[] = AlquilerPeer::FECHA_INICIO;
		}

	} 
	
	public function setIdEtapa($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_etapa !== $v) {
			$this->id_etapa = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID_ETAPA;
		}

	} 
	
	public function setIdCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_carrera !== $v) {
			$this->id_carrera = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID_CARRERA;
		}

	} 
	
	public function setIdCuentaCorriente($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_cuenta_corriente !== $v) {
			$this->id_cuenta_corriente = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID_CUENTA_CORRIENTE;
		}

	} 
	
	public function setIdCorredor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_corredor !== $v) {
			$this->id_corredor = $v;
			$this->modifiedColumns[] = AlquilerPeer::ID_CORREDOR;
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

			$this->id_inventario = $rs->getInt($startcol + 0);

			$this->fecha_inicio = $rs->getDate($startcol + 1, null);

			$this->id_etapa = $rs->getInt($startcol + 2);

			$this->id_carrera = $rs->getInt($startcol + 3);

			$this->id_cuenta_corriente = $rs->getInt($startcol + 4);

			$this->id_corredor = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->created_by = $rs->getInt($startcol + 7);

			$this->updated_at = $rs->getTimestamp($startcol + 8, null);

			$this->updated_by = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlquilerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
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
				return $this->getIdInventario();
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
				return $this->getIdCuentaCorriente();
				break;
			case 5:
				return $this->getIdCorredor();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getCreatedBy();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			case 9:
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
			$keys[0] => $this->getIdInventario(),
			$keys[1] => $this->getFechaInicio(),
			$keys[2] => $this->getIdEtapa(),
			$keys[3] => $this->getIdCarrera(),
			$keys[4] => $this->getIdCuentaCorriente(),
			$keys[5] => $this->getIdCorredor(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getCreatedBy(),
			$keys[8] => $this->getUpdatedAt(),
			$keys[9] => $this->getUpdatedBy(),
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
				$this->setIdInventario($value);
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
				$this->setIdCuentaCorriente($value);
				break;
			case 5:
				$this->setIdCorredor($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setCreatedBy($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
			case 9:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlquilerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdInventario($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechaInicio($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdEtapa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdCarrera($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdCuentaCorriente($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIdCorredor($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlquilerPeer::ID_INVENTARIO)) $criteria->add(AlquilerPeer::ID_INVENTARIO, $this->id_inventario);
		if ($this->isColumnModified(AlquilerPeer::FECHA_INICIO)) $criteria->add(AlquilerPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(AlquilerPeer::ID_ETAPA)) $criteria->add(AlquilerPeer::ID_ETAPA, $this->id_etapa);
		if ($this->isColumnModified(AlquilerPeer::ID_CARRERA)) $criteria->add(AlquilerPeer::ID_CARRERA, $this->id_carrera);
		if ($this->isColumnModified(AlquilerPeer::ID_CUENTA_CORRIENTE)) $criteria->add(AlquilerPeer::ID_CUENTA_CORRIENTE, $this->id_cuenta_corriente);
		if ($this->isColumnModified(AlquilerPeer::ID_CORREDOR)) $criteria->add(AlquilerPeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(AlquilerPeer::CREATED_AT)) $criteria->add(AlquilerPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AlquilerPeer::CREATED_BY)) $criteria->add(AlquilerPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(AlquilerPeer::UPDATED_AT)) $criteria->add(AlquilerPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(AlquilerPeer::UPDATED_BY)) $criteria->add(AlquilerPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlquilerPeer::DATABASE_NAME);

		$criteria->add(AlquilerPeer::ID_INVENTARIO, $this->id_inventario);
		$criteria->add(AlquilerPeer::FECHA_INICIO, $this->fecha_inicio);
		$criteria->add(AlquilerPeer::ID_ETAPA, $this->id_etapa);
		$criteria->add(AlquilerPeer::ID_CARRERA, $this->id_carrera);
		$criteria->add(AlquilerPeer::ID_CUENTA_CORRIENTE, $this->id_cuenta_corriente);
		$criteria->add(AlquilerPeer::ID_CORREDOR, $this->id_corredor);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getIdInventario();

		$pks[1] = $this->getFechaInicio();

		$pks[2] = $this->getIdEtapa();

		$pks[3] = $this->getIdCarrera();

		$pks[4] = $this->getIdCuentaCorriente();

		$pks[5] = $this->getIdCorredor();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setIdInventario($keys[0]);

		$this->setFechaInicio($keys[1]);

		$this->setIdEtapa($keys[2]);

		$this->setIdCarrera($keys[3]);

		$this->setIdCuentaCorriente($keys[4]);

		$this->setIdCorredor($keys[5]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		$copyObj->setNew(true);

		$copyObj->setIdInventario(NULL); 
		$copyObj->setFechaInicio(NULL); 
		$copyObj->setIdEtapa(NULL); 
		$copyObj->setIdCarrera(NULL); 
		$copyObj->setIdCuentaCorriente(NULL); 
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
			self::$peer = new AlquilerPeer();
		}
		return self::$peer;
	}

	
	public function setInventario($v)
	{


		if ($v === null) {
			$this->setIdInventario(NULL);
		} else {
			$this->setIdInventario($v->getId());
		}


		$this->aInventario = $v;
	}


	
	public function getInventario($con = null)
	{
		if ($this->aInventario === null && ($this->id_inventario !== null)) {
						$this->aInventario = InventarioPeer::retrieveByPK($this->id_inventario, $con);

			
		}
		return $this->aInventario;
	}

} 