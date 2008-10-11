<?php


abstract class BaseUsuario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $id_grupo;


	
	protected $id_corredor;


	
	protected $created_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $aGrupo;

	
	protected $aCorredor;

	
	protected $collAlquilers;

	
	protected $lastAlquilerCriteria = null;

	
	protected $collPostsRelatedByCreatedBy;

	
	protected $lastPostRelatedByCreatedByCriteria = null;

	
	protected $collPostsRelatedByUpdatedBy;

	
	protected $lastPostRelatedByUpdatedByCriteria = null;

	
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

	
	public function getIdGrupo()
	{

		return $this->id_grupo;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsuarioPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = UsuarioPeer::NOMBRE;
		}

	} 
	
	public function setIdGrupo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_grupo !== $v) {
			$this->id_grupo = $v;
			$this->modifiedColumns[] = UsuarioPeer::ID_GRUPO;
		}

		if ($this->aGrupo !== null && $this->aGrupo->getId() !== $v) {
			$this->aGrupo = null;
		}

	} 
	
	public function setIdCorredor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_corredor !== $v) {
			$this->id_corredor = $v;
			$this->modifiedColumns[] = UsuarioPeer::ID_CORREDOR;
		}

		if ($this->aCorredor !== null && $this->aCorredor->getId() !== $v) {
			$this->aCorredor = null;
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
			$this->modifiedColumns[] = UsuarioPeer::CREATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = UsuarioPeer::CREATED_BY;
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
			$this->modifiedColumns[] = UsuarioPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = UsuarioPeer::UPDATED_BY;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->id_grupo = $rs->getInt($startcol + 2);

			$this->id_corredor = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->created_by = $rs->getInt($startcol + 5);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Usuario object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsuarioPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(UsuarioPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(UsuarioPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME);
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


												
			if ($this->aGrupo !== null) {
				if ($this->aGrupo->isModified()) {
					$affectedRows += $this->aGrupo->save($con);
				}
				$this->setGrupo($this->aGrupo);
			}

			if ($this->aCorredor !== null) {
				if ($this->aCorredor->isModified()) {
					$affectedRows += $this->aCorredor->save($con);
				}
				$this->setCorredor($this->aCorredor);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsuarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UsuarioPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlquilers !== null) {
				foreach($this->collAlquilers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPostsRelatedByCreatedBy !== null) {
				foreach($this->collPostsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPostsRelatedByUpdatedBy !== null) {
				foreach($this->collPostsRelatedByUpdatedBy as $referrerFK) {
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


												
			if ($this->aGrupo !== null) {
				if (!$this->aGrupo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGrupo->getValidationFailures());
				}
			}

			if ($this->aCorredor !== null) {
				if (!$this->aCorredor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCorredor->getValidationFailures());
				}
			}


			if (($retval = UsuarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlquilers !== null) {
					foreach($this->collAlquilers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPostsRelatedByCreatedBy !== null) {
					foreach($this->collPostsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPostsRelatedByUpdatedBy !== null) {
					foreach($this->collPostsRelatedByUpdatedBy as $referrerFK) {
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
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdGrupo();
				break;
			case 3:
				return $this->getIdCorredor();
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
		$keys = UsuarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getIdGrupo(),
			$keys[3] => $this->getIdCorredor(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getCreatedBy(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdGrupo($value);
				break;
			case 3:
				$this->setIdCorredor($value);
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
		$keys = UsuarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdGrupo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdCorredor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedBy($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuarioPeer::ID)) $criteria->add(UsuarioPeer::ID, $this->id);
		if ($this->isColumnModified(UsuarioPeer::NOMBRE)) $criteria->add(UsuarioPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(UsuarioPeer::ID_GRUPO)) $criteria->add(UsuarioPeer::ID_GRUPO, $this->id_grupo);
		if ($this->isColumnModified(UsuarioPeer::ID_CORREDOR)) $criteria->add(UsuarioPeer::ID_CORREDOR, $this->id_corredor);
		if ($this->isColumnModified(UsuarioPeer::CREATED_AT)) $criteria->add(UsuarioPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(UsuarioPeer::CREATED_BY)) $criteria->add(UsuarioPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(UsuarioPeer::UPDATED_AT)) $criteria->add(UsuarioPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(UsuarioPeer::UPDATED_BY)) $criteria->add(UsuarioPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		$criteria->add(UsuarioPeer::ID, $this->id);

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

		$copyObj->setIdGrupo($this->id_grupo);

		$copyObj->setIdCorredor($this->id_corredor);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlquilers() as $relObj) {
				$copyObj->addAlquiler($relObj->copy($deepCopy));
			}

			foreach($this->getPostsRelatedByCreatedBy() as $relObj) {
				$copyObj->addPostRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getPostsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addPostRelatedByUpdatedBy($relObj->copy($deepCopy));
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
			self::$peer = new UsuarioPeer();
		}
		return self::$peer;
	}

	
	public function setGrupo($v)
	{


		if ($v === null) {
			$this->setIdGrupo(NULL);
		} else {
			$this->setIdGrupo($v->getId());
		}


		$this->aGrupo = $v;
	}


	
	public function getGrupo($con = null)
	{
		if ($this->aGrupo === null && ($this->id_grupo !== null)) {
						$this->aGrupo = GrupoPeer::retrieveByPK($this->id_grupo, $con);

			
		}
		return $this->aGrupo;
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

				$criteria->add(AlquilerPeer::ID_USUARIO, $this->getId());

				AlquilerPeer::addSelectColumns($criteria);
				$this->collAlquilers = AlquilerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlquilerPeer::ID_USUARIO, $this->getId());

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

		$criteria->add(AlquilerPeer::ID_USUARIO, $this->getId());

		return AlquilerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlquiler(Alquiler $l)
	{
		$this->collAlquilers[] = $l;
		$l->setUsuario($this);
	}


	
	public function getAlquilersJoinInventario($criteria = null, $con = null)
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

				$criteria->add(AlquilerPeer::ID_USUARIO, $this->getId());

				$this->collAlquilers = AlquilerPeer::doSelectJoinInventario($criteria, $con);
			}
		} else {
									
			$criteria->add(AlquilerPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastAlquilerCriteria) || !$this->lastAlquilerCriteria->equals($criteria)) {
				$this->collAlquilers = AlquilerPeer::doSelectJoinInventario($criteria, $con);
			}
		}
		$this->lastAlquilerCriteria = $criteria;

		return $this->collAlquilers;
	}


	
	public function getAlquilersJoinFechaEtapaCarrera($criteria = null, $con = null)
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

				$criteria->add(AlquilerPeer::ID_USUARIO, $this->getId());

				$this->collAlquilers = AlquilerPeer::doSelectJoinFechaEtapaCarrera($criteria, $con);
			}
		} else {
									
			$criteria->add(AlquilerPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastAlquilerCriteria) || !$this->lastAlquilerCriteria->equals($criteria)) {
				$this->collAlquilers = AlquilerPeer::doSelectJoinFechaEtapaCarrera($criteria, $con);
			}
		}
		$this->lastAlquilerCriteria = $criteria;

		return $this->collAlquilers;
	}

	
	public function initPostsRelatedByCreatedBy()
	{
		if ($this->collPostsRelatedByCreatedBy === null) {
			$this->collPostsRelatedByCreatedBy = array();
		}
	}

	
	public function getPostsRelatedByCreatedBy($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPostsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collPostsRelatedByCreatedBy = array();
			} else {

				$criteria->add(PostPeer::CREATED_BY, $this->getId());

				PostPeer::addSelectColumns($criteria);
				$this->collPostsRelatedByCreatedBy = PostPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PostPeer::CREATED_BY, $this->getId());

				PostPeer::addSelectColumns($criteria);
				if (!isset($this->lastPostRelatedByCreatedByCriteria) || !$this->lastPostRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collPostsRelatedByCreatedBy = PostPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPostRelatedByCreatedByCriteria = $criteria;
		return $this->collPostsRelatedByCreatedBy;
	}

	
	public function countPostsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PostPeer::CREATED_BY, $this->getId());

		return PostPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPostRelatedByCreatedBy(Post $l)
	{
		$this->collPostsRelatedByCreatedBy[] = $l;
		$l->setUsuarioRelatedByCreatedBy($this);
	}

	
	public function initPostsRelatedByUpdatedBy()
	{
		if ($this->collPostsRelatedByUpdatedBy === null) {
			$this->collPostsRelatedByUpdatedBy = array();
		}
	}

	
	public function getPostsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPostsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collPostsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(PostPeer::UPDATED_BY, $this->getId());

				PostPeer::addSelectColumns($criteria);
				$this->collPostsRelatedByUpdatedBy = PostPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PostPeer::UPDATED_BY, $this->getId());

				PostPeer::addSelectColumns($criteria);
				if (!isset($this->lastPostRelatedByUpdatedByCriteria) || !$this->lastPostRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collPostsRelatedByUpdatedBy = PostPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPostRelatedByUpdatedByCriteria = $criteria;
		return $this->collPostsRelatedByUpdatedBy;
	}

	
	public function countPostsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PostPeer::UPDATED_BY, $this->getId());

		return PostPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPostRelatedByUpdatedBy(Post $l)
	{
		$this->collPostsRelatedByUpdatedBy[] = $l;
		$l->setUsuarioRelatedByUpdatedBy($this);
	}

} 