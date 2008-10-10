<?php


abstract class BasePost extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $texto;


	
	protected $id_usuarios;

	
	protected $aUsuarios;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTexto()
	{

		return $this->texto;
	}

	
	public function getIdUsuarios()
	{

		return $this->id_usuarios;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PostPeer::ID;
		}

	} 
	
	public function setTexto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->texto !== $v) {
			$this->texto = $v;
			$this->modifiedColumns[] = PostPeer::TEXTO;
		}

	} 
	
	public function setIdUsuarios($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_usuarios !== $v) {
			$this->id_usuarios = $v;
			$this->modifiedColumns[] = PostPeer::ID_USUARIOS;
		}

		if ($this->aUsuarios !== null && $this->aUsuarios->getId() !== $v) {
			$this->aUsuarios = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->texto = $rs->getString($startcol + 1);

			$this->id_usuarios = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Post object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PostPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PostPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PostPeer::DATABASE_NAME);
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


												
			if ($this->aUsuarios !== null) {
				if ($this->aUsuarios->isModified()) {
					$affectedRows += $this->aUsuarios->save($con);
				}
				$this->setUsuarios($this->aUsuarios);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PostPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += PostPeer::doUpdate($this, $con);
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


												
			if ($this->aUsuarios !== null) {
				if (!$this->aUsuarios->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarios->getValidationFailures());
				}
			}


			if (($retval = PostPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTexto();
				break;
			case 2:
				return $this->getIdUsuarios();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PostPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTexto(),
			$keys[2] => $this->getIdUsuarios(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTexto($value);
				break;
			case 2:
				$this->setIdUsuarios($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PostPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTexto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdUsuarios($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PostPeer::DATABASE_NAME);

		if ($this->isColumnModified(PostPeer::ID)) $criteria->add(PostPeer::ID, $this->id);
		if ($this->isColumnModified(PostPeer::TEXTO)) $criteria->add(PostPeer::TEXTO, $this->texto);
		if ($this->isColumnModified(PostPeer::ID_USUARIOS)) $criteria->add(PostPeer::ID_USUARIOS, $this->id_usuarios);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PostPeer::DATABASE_NAME);

		$criteria->add(PostPeer::ID, $this->id);

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

		$copyObj->setTexto($this->texto);

		$copyObj->setIdUsuarios($this->id_usuarios);


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
			self::$peer = new PostPeer();
		}
		return self::$peer;
	}

	
	public function setUsuarios($v)
	{


		if ($v === null) {
			$this->setIdUsuarios(NULL);
		} else {
			$this->setIdUsuarios($v->getId());
		}


		$this->aUsuarios = $v;
	}


	
	public function getUsuarios($con = null)
	{
		if ($this->aUsuarios === null && ($this->id_usuarios !== null)) {
						$this->aUsuarios = UsuariosPeer::retrieveByPK($this->id_usuarios, $con);

			
		}
		return $this->aUsuarios;
	}

} 