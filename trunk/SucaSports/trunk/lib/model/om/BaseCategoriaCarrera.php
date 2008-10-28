<?php


abstract class BaseCategoriaCarrera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_categoria = 0;


	
	protected $id_carrera = 0;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aCategoria;

	
	protected $aCarrera;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdCategoria()
	{

		return $this->id_categoria;
	}

	
	public function getIdCarrera()
	{

		return $this->id_carrera;
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

	
	public function setIdCategoria($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_categoria !== $v || $v === 0) {
			$this->id_categoria = $v;
			$this->modifiedColumns[] = CategoriaCarreraPeer::ID_CATEGORIA;
		}

		if ($this->aCategoria !== null && $this->aCategoria->getId() !== $v) {
			$this->aCategoria = null;
		}

	} 
	
	public function setIdCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_carrera !== $v || $v === 0) {
			$this->id_carrera = $v;
			$this->modifiedColumns[] = CategoriaCarreraPeer::ID_CARRERA;
		}

		if ($this->aCarrera !== null && $this->aCarrera->getId() !== $v) {
			$this->aCarrera = null;
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
			$this->modifiedColumns[] = CategoriaCarreraPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = CategoriaCarreraPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_categoria = $rs->getInt($startcol + 0);

			$this->id_carrera = $rs->getInt($startcol + 1);

			$this->updated_at = $rs->getTimestamp($startcol + 2, null);

			$this->updated_by = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating CategoriaCarrera object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CategoriaCarreraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CategoriaCarreraPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isModified() && !$this->isColumnModified(CategoriaCarreraPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CategoriaCarreraPeer::DATABASE_NAME);
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


												
			if ($this->aCategoria !== null) {
				if ($this->aCategoria->isModified()) {
					$affectedRows += $this->aCategoria->save($con);
				}
				$this->setCategoria($this->aCategoria);
			}

			if ($this->aCarrera !== null) {
				if ($this->aCarrera->isModified()) {
					$affectedRows += $this->aCarrera->save($con);
				}
				$this->setCarrera($this->aCarrera);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CategoriaCarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CategoriaCarreraPeer::doUpdate($this, $con);
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


												
			if ($this->aCategoria !== null) {
				if (!$this->aCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategoria->getValidationFailures());
				}
			}

			if ($this->aCarrera !== null) {
				if (!$this->aCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCarrera->getValidationFailures());
				}
			}


			if (($retval = CategoriaCarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CategoriaCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdCategoria();
				break;
			case 1:
				return $this->getIdCarrera();
				break;
			case 2:
				return $this->getUpdatedAt();
				break;
			case 3:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CategoriaCarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdCategoria(),
			$keys[1] => $this->getIdCarrera(),
			$keys[2] => $this->getUpdatedAt(),
			$keys[3] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CategoriaCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdCategoria($value);
				break;
			case 1:
				$this->setIdCarrera($value);
				break;
			case 2:
				$this->setUpdatedAt($value);
				break;
			case 3:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CategoriaCarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdCategoria($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdCarrera($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUpdatedAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdatedBy($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CategoriaCarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CategoriaCarreraPeer::ID_CATEGORIA)) $criteria->add(CategoriaCarreraPeer::ID_CATEGORIA, $this->id_categoria);
		if ($this->isColumnModified(CategoriaCarreraPeer::ID_CARRERA)) $criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->id_carrera);
		if ($this->isColumnModified(CategoriaCarreraPeer::UPDATED_AT)) $criteria->add(CategoriaCarreraPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(CategoriaCarreraPeer::UPDATED_BY)) $criteria->add(CategoriaCarreraPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CategoriaCarreraPeer::DATABASE_NAME);

		$criteria->add(CategoriaCarreraPeer::ID_CATEGORIA, $this->id_categoria);
		$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->id_carrera);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getIdCategoria();

		$pks[1] = $this->getIdCarrera();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setIdCategoria($keys[0]);

		$this->setIdCarrera($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		$copyObj->setNew(true);

		$copyObj->setIdCategoria('0'); 
		$copyObj->setIdCarrera('0'); 
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
			self::$peer = new CategoriaCarreraPeer();
		}
		return self::$peer;
	}

	
	public function setCategoria($v)
	{


		if ($v === null) {
			$this->setIdCategoria('0');
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

	
	public function setCarrera($v)
	{


		if ($v === null) {
			$this->setIdCarrera('0');
		} else {
			$this->setIdCarrera($v->getId());
		}


		$this->aCarrera = $v;
	}


	
	public function getCarrera($con = null)
	{
		if ($this->aCarrera === null && ($this->id_carrera !== null)) {
						$this->aCarrera = CarreraPeer::retrieveByPK($this->id_carrera, $con);

			
		}
		return $this->aCarrera;
	}

} 