<?php


abstract class BaseUsuarios extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombre;


	
	protected $id_grupos;

	
	protected $aGrupos;

	
	protected $collCorredors;

	
	protected $lastCorredorCriteria = null;

	
	protected $collPosts;

	
	protected $lastPostCriteria = null;

	
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

	
	public function getIdGrupos()
	{

		return $this->id_grupos;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsuariosPeer::ID;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = UsuariosPeer::NOMBRE;
		}

	} 
	
	public function setIdGrupos($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_grupos !== $v) {
			$this->id_grupos = $v;
			$this->modifiedColumns[] = UsuariosPeer::ID_GRUPOS;
		}

		if ($this->aGrupos !== null && $this->aGrupos->getId() !== $v) {
			$this->aGrupos = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nombre = $rs->getString($startcol + 1);

			$this->id_grupos = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Usuarios object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuariosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsuariosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsuariosPeer::DATABASE_NAME);
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


												
			if ($this->aGrupos !== null) {
				if ($this->aGrupos->isModified()) {
					$affectedRows += $this->aGrupos->save($con);
				}
				$this->setGrupos($this->aGrupos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UsuariosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += UsuariosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCorredors !== null) {
				foreach($this->collCorredors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPosts !== null) {
				foreach($this->collPosts as $referrerFK) {
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


												
			if ($this->aGrupos !== null) {
				if (!$this->aGrupos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGrupos->getValidationFailures());
				}
			}


			if (($retval = UsuariosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCorredors !== null) {
					foreach($this->collCorredors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPosts !== null) {
					foreach($this->collPosts as $referrerFK) {
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
		$pos = UsuariosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdGrupos();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuariosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
			$keys[2] => $this->getIdGrupos(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsuariosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdGrupos($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuariosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdGrupos($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuariosPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuariosPeer::ID)) $criteria->add(UsuariosPeer::ID, $this->id);
		if ($this->isColumnModified(UsuariosPeer::NOMBRE)) $criteria->add(UsuariosPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(UsuariosPeer::ID_GRUPOS)) $criteria->add(UsuariosPeer::ID_GRUPOS, $this->id_grupos);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsuariosPeer::DATABASE_NAME);

		$criteria->add(UsuariosPeer::ID, $this->id);

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

		$copyObj->setIdGrupos($this->id_grupos);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCorredors() as $relObj) {
				$copyObj->addCorredor($relObj->copy($deepCopy));
			}

			foreach($this->getPosts() as $relObj) {
				$copyObj->addPost($relObj->copy($deepCopy));
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
			self::$peer = new UsuariosPeer();
		}
		return self::$peer;
	}

	
	public function setGrupos($v)
	{


		if ($v === null) {
			$this->setIdGrupos(NULL);
		} else {
			$this->setIdGrupos($v->getId());
		}


		$this->aGrupos = $v;
	}


	
	public function getGrupos($con = null)
	{
		if ($this->aGrupos === null && ($this->id_grupos !== null)) {
						$this->aGrupos = GruposPeer::retrieveByPK($this->id_grupos, $con);

			
		}
		return $this->aGrupos;
	}

	
	public function initCorredors()
	{
		if ($this->collCorredors === null) {
			$this->collCorredors = array();
		}
	}

	
	public function getCorredors($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
			   $this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

				CorredorPeer::addSelectColumns($criteria);
				$this->collCorredors = CorredorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

				CorredorPeer::addSelectColumns($criteria);
				if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
					$this->collCorredors = CorredorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCorredorCriteria = $criteria;
		return $this->collCorredors;
	}

	
	public function countCorredors($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

		return CorredorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCorredor(Corredor $l)
	{
		$this->collCorredors[] = $l;
		$l->setUsuarios($this);
	}


	
	public function getCorredorsJoinSociedadMedica($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
				$this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinSociedadMedica($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinSociedadMedica($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}


	
	public function getCorredorsJoinLocalidad($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
				$this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinLocalidad($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinLocalidad($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}


	
	public function getCorredorsJoinPais($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
				$this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinPais($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinPais($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}


	
	public function getCorredorsJoinChips($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCorredors === null) {
			if ($this->isNew()) {
				$this->collCorredors = array();
			} else {

				$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

				$this->collCorredors = CorredorPeer::doSelectJoinChips($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastCorredorCriteria) || !$this->lastCorredorCriteria->equals($criteria)) {
				$this->collCorredors = CorredorPeer::doSelectJoinChips($criteria, $con);
			}
		}
		$this->lastCorredorCriteria = $criteria;

		return $this->collCorredors;
	}

	
	public function initPosts()
	{
		if ($this->collPosts === null) {
			$this->collPosts = array();
		}
	}

	
	public function getPosts($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPosts === null) {
			if ($this->isNew()) {
			   $this->collPosts = array();
			} else {

				$criteria->add(PostPeer::ID_USUARIOS, $this->getId());

				PostPeer::addSelectColumns($criteria);
				$this->collPosts = PostPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PostPeer::ID_USUARIOS, $this->getId());

				PostPeer::addSelectColumns($criteria);
				if (!isset($this->lastPostCriteria) || !$this->lastPostCriteria->equals($criteria)) {
					$this->collPosts = PostPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPostCriteria = $criteria;
		return $this->collPosts;
	}

	
	public function countPosts($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PostPeer::ID_USUARIOS, $this->getId());

		return PostPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPost(Post $l)
	{
		$this->collPosts[] = $l;
		$l->setUsuarios($this);
	}

} 