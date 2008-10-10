<?php


abstract class BaseFechaEtapaCarrera extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_carrera;


	
	protected $max_corredores;


	
	protected $fecha_inicio;


	
	protected $fecha_fin;

	
	protected $aEtapaCarrera;

	
	protected $collAlquileress;

	
	protected $lastAlquileresCriteria = null;

	
	protected $collEquipamientoCarreras;

	
	protected $lastEquipamientoCarreraCriteria = null;

	
	protected $collInscripcions;

	
	protected $lastInscripcionCriteria = null;

	
	protected $collResultadoss;

	
	protected $lastResultadosCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdCarrera()
	{

		return $this->id_carrera;
	}

	
	public function getMaxCorredores()
	{

		return $this->max_corredores;
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

	
	public function getFechaFin($format = 'Y-m-d')
	{

		if ($this->fecha_fin === null || $this->fecha_fin === '') {
			return null;
		} elseif (!is_int($this->fecha_fin)) {
						$ts = strtotime($this->fecha_fin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_fin] as date/time value: " . var_export($this->fecha_fin, true));
			}
		} else {
			$ts = $this->fecha_fin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::ID;
		}

	} 
	
	public function setIdCarrera($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_carrera !== $v) {
			$this->id_carrera = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::ID_CARRERA;
		}

		if ($this->aEtapaCarrera !== null && $this->aEtapaCarrera->getId() !== $v) {
			$this->aEtapaCarrera = null;
		}

	} 
	
	public function setMaxCorredores($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->max_corredores !== $v) {
			$this->max_corredores = $v;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::MAX_CORREDORES;
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
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::FECHA_INICIO;
		}

	} 
	
	public function setFechaFin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_fin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_fin !== $ts) {
			$this->fecha_fin = $ts;
			$this->modifiedColumns[] = FechaEtapaCarreraPeer::FECHA_FIN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_carrera = $rs->getInt($startcol + 1);

			$this->max_corredores = $rs->getInt($startcol + 2);

			$this->fecha_inicio = $rs->getDate($startcol + 3, null);

			$this->fecha_fin = $rs->getDate($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating FechaEtapaCarrera object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FechaEtapaCarreraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FechaEtapaCarreraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FechaEtapaCarreraPeer::DATABASE_NAME);
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


												
			if ($this->aEtapaCarrera !== null) {
				if ($this->aEtapaCarrera->isModified()) {
					$affectedRows += $this->aEtapaCarrera->save($con);
				}
				$this->setEtapaCarrera($this->aEtapaCarrera);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FechaEtapaCarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FechaEtapaCarreraPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAlquileress !== null) {
				foreach($this->collAlquileress as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEquipamientoCarreras !== null) {
				foreach($this->collEquipamientoCarreras as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInscripcions !== null) {
				foreach($this->collInscripcions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collResultadoss !== null) {
				foreach($this->collResultadoss as $referrerFK) {
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


												
			if ($this->aEtapaCarrera !== null) {
				if (!$this->aEtapaCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEtapaCarrera->getValidationFailures());
				}
			}


			if (($retval = FechaEtapaCarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlquileress !== null) {
					foreach($this->collAlquileress as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEquipamientoCarreras !== null) {
					foreach($this->collEquipamientoCarreras as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInscripcions !== null) {
					foreach($this->collInscripcions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collResultadoss !== null) {
					foreach($this->collResultadoss as $referrerFK) {
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
		$pos = FechaEtapaCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdCarrera();
				break;
			case 2:
				return $this->getMaxCorredores();
				break;
			case 3:
				return $this->getFechaInicio();
				break;
			case 4:
				return $this->getFechaFin();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FechaEtapaCarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdCarrera(),
			$keys[2] => $this->getMaxCorredores(),
			$keys[3] => $this->getFechaInicio(),
			$keys[4] => $this->getFechaFin(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FechaEtapaCarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdCarrera($value);
				break;
			case 2:
				$this->setMaxCorredores($value);
				break;
			case 3:
				$this->setFechaInicio($value);
				break;
			case 4:
				$this->setFechaFin($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FechaEtapaCarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdCarrera($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMaxCorredores($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaInicio($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFechaFin($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(FechaEtapaCarreraPeer::ID)) $criteria->add(FechaEtapaCarreraPeer::ID, $this->id);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::ID_CARRERA)) $criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $this->id_carrera);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::MAX_CORREDORES)) $criteria->add(FechaEtapaCarreraPeer::MAX_CORREDORES, $this->max_corredores);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::FECHA_INICIO)) $criteria->add(FechaEtapaCarreraPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(FechaEtapaCarreraPeer::FECHA_FIN)) $criteria->add(FechaEtapaCarreraPeer::FECHA_FIN, $this->fecha_fin);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FechaEtapaCarreraPeer::DATABASE_NAME);

		$criteria->add(FechaEtapaCarreraPeer::ID, $this->id);

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

		$copyObj->setIdCarrera($this->id_carrera);

		$copyObj->setMaxCorredores($this->max_corredores);

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFin($this->fecha_fin);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAlquileress() as $relObj) {
				$copyObj->addAlquileres($relObj->copy($deepCopy));
			}

			foreach($this->getEquipamientoCarreras() as $relObj) {
				$copyObj->addEquipamientoCarrera($relObj->copy($deepCopy));
			}

			foreach($this->getInscripcions() as $relObj) {
				$copyObj->addInscripcion($relObj->copy($deepCopy));
			}

			foreach($this->getResultadoss() as $relObj) {
				$copyObj->addResultados($relObj->copy($deepCopy));
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
			self::$peer = new FechaEtapaCarreraPeer();
		}
		return self::$peer;
	}

	
	public function setEtapaCarrera($v)
	{


		if ($v === null) {
			$this->setIdCarrera(NULL);
		} else {
			$this->setIdCarrera($v->getId());
		}


		$this->aEtapaCarrera = $v;
	}


	
	public function getEtapaCarrera($con = null)
	{
		if ($this->aEtapaCarrera === null && ($this->id_carrera !== null)) {
						$this->aEtapaCarrera = EtapaCarreraPeer::retrieveByPK($this->id_carrera, $con);

			
		}
		return $this->aEtapaCarrera;
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

				$criteria->add(AlquileresPeer::ID_FECHA_CARRERA, $this->getId());

				AlquileresPeer::addSelectColumns($criteria);
				$this->collAlquileress = AlquileresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlquileresPeer::ID_FECHA_CARRERA, $this->getId());

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

		$criteria->add(AlquileresPeer::ID_FECHA_CARRERA, $this->getId());

		return AlquileresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAlquileres(Alquileres $l)
	{
		$this->collAlquileress[] = $l;
		$l->setFechaEtapaCarrera($this);
	}


	
	public function getAlquileressJoinInventario($criteria = null, $con = null)
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

				$criteria->add(AlquileresPeer::ID_FECHA_CARRERA, $this->getId());

				$this->collAlquileress = AlquileresPeer::doSelectJoinInventario($criteria, $con);
			}
		} else {
									
			$criteria->add(AlquileresPeer::ID_FECHA_CARRERA, $this->getId());

			if (!isset($this->lastAlquileresCriteria) || !$this->lastAlquileresCriteria->equals($criteria)) {
				$this->collAlquileress = AlquileresPeer::doSelectJoinInventario($criteria, $con);
			}
		}
		$this->lastAlquileresCriteria = $criteria;

		return $this->collAlquileress;
	}

	
	public function initEquipamientoCarreras()
	{
		if ($this->collEquipamientoCarreras === null) {
			$this->collEquipamientoCarreras = array();
		}
	}

	
	public function getEquipamientoCarreras($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEquipamientoCarreras === null) {
			if ($this->isNew()) {
			   $this->collEquipamientoCarreras = array();
			} else {

				$criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->getId());

				EquipamientoCarreraPeer::addSelectColumns($criteria);
				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->getId());

				EquipamientoCarreraPeer::addSelectColumns($criteria);
				if (!isset($this->lastEquipamientoCarreraCriteria) || !$this->lastEquipamientoCarreraCriteria->equals($criteria)) {
					$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEquipamientoCarreraCriteria = $criteria;
		return $this->collEquipamientoCarreras;
	}

	
	public function countEquipamientoCarreras($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->getId());

		return EquipamientoCarreraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEquipamientoCarrera(EquipamientoCarrera $l)
	{
		$this->collEquipamientoCarreras[] = $l;
		$l->setFechaEtapaCarrera($this);
	}


	
	public function getEquipamientoCarrerasJoinTipoEquipamiento($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEquipamientoCarreras === null) {
			if ($this->isNew()) {
				$this->collEquipamientoCarreras = array();
			} else {

				$criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->getId());

				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelectJoinTipoEquipamiento($criteria, $con);
			}
		} else {
									
			$criteria->add(EquipamientoCarreraPeer::ID_CARRERA, $this->getId());

			if (!isset($this->lastEquipamientoCarreraCriteria) || !$this->lastEquipamientoCarreraCriteria->equals($criteria)) {
				$this->collEquipamientoCarreras = EquipamientoCarreraPeer::doSelectJoinTipoEquipamiento($criteria, $con);
			}
		}
		$this->lastEquipamientoCarreraCriteria = $criteria;

		return $this->collEquipamientoCarreras;
	}

	
	public function initInscripcions()
	{
		if ($this->collInscripcions === null) {
			$this->collInscripcions = array();
		}
	}

	
	public function getInscripcions($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInscripcions === null) {
			if ($this->isNew()) {
			   $this->collInscripcions = array();
			} else {

				$criteria->add(InscripcionPeer::ID_CARRERA, $this->getId());

				InscripcionPeer::addSelectColumns($criteria);
				$this->collInscripcions = InscripcionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InscripcionPeer::ID_CARRERA, $this->getId());

				InscripcionPeer::addSelectColumns($criteria);
				if (!isset($this->lastInscripcionCriteria) || !$this->lastInscripcionCriteria->equals($criteria)) {
					$this->collInscripcions = InscripcionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInscripcionCriteria = $criteria;
		return $this->collInscripcions;
	}

	
	public function countInscripcions($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InscripcionPeer::ID_CARRERA, $this->getId());

		return InscripcionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInscripcion(Inscripcion $l)
	{
		$this->collInscripcions[] = $l;
		$l->setFechaEtapaCarrera($this);
	}


	
	public function getInscripcionsJoinCorredor($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInscripcions === null) {
			if ($this->isNew()) {
				$this->collInscripcions = array();
			} else {

				$criteria->add(InscripcionPeer::ID_CARRERA, $this->getId());

				$this->collInscripcions = InscripcionPeer::doSelectJoinCorredor($criteria, $con);
			}
		} else {
									
			$criteria->add(InscripcionPeer::ID_CARRERA, $this->getId());

			if (!isset($this->lastInscripcionCriteria) || !$this->lastInscripcionCriteria->equals($criteria)) {
				$this->collInscripcions = InscripcionPeer::doSelectJoinCorredor($criteria, $con);
			}
		}
		$this->lastInscripcionCriteria = $criteria;

		return $this->collInscripcions;
	}

	
	public function initResultadoss()
	{
		if ($this->collResultadoss === null) {
			$this->collResultadoss = array();
		}
	}

	
	public function getResultadoss($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collResultadoss === null) {
			if ($this->isNew()) {
			   $this->collResultadoss = array();
			} else {

				$criteria->add(ResultadosPeer::ID_FECHA_CARRERA, $this->getId());

				ResultadosPeer::addSelectColumns($criteria);
				$this->collResultadoss = ResultadosPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ResultadosPeer::ID_FECHA_CARRERA, $this->getId());

				ResultadosPeer::addSelectColumns($criteria);
				if (!isset($this->lastResultadosCriteria) || !$this->lastResultadosCriteria->equals($criteria)) {
					$this->collResultadoss = ResultadosPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastResultadosCriteria = $criteria;
		return $this->collResultadoss;
	}

	
	public function countResultadoss($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ResultadosPeer::ID_FECHA_CARRERA, $this->getId());

		return ResultadosPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addResultados(Resultados $l)
	{
		$this->collResultadoss[] = $l;
		$l->setFechaEtapaCarrera($this);
	}

} 