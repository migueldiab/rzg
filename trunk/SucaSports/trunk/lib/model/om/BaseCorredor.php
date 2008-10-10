<?php


abstract class BaseCorredor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $tipo_documento;


	
	protected $nombre;


	
	protected $apellido;


	
	protected $telefono;


	
	protected $movil;


	
	protected $telefono_emergencia;


	
	protected $direccion;


	
	protected $fecha_nacimiento;


	
	protected $pareja;


	
	protected $hijos;


	
	protected $id_sociedad_medica;


	
	protected $historia_medica;


	
	protected $sexo;


	
	protected $id_localidad;


	
	protected $id_pais;


	
	protected $id_chips;


	
	protected $id_usuario;

	
	protected $aSociedadMedica;

	
	protected $aLocalidad;

	
	protected $aPais;

	
	protected $aChips;

	
	protected $aUsuarios;

	
	protected $collAsociacionCorredors;

	
	protected $lastAsociacionCorredorCriteria = null;

	
	protected $collCorredorEquipamientos;

	
	protected $lastCorredorEquipamientoCriteria = null;

	
	protected $collCuentaCorrientes;

	
	protected $lastCuentaCorrienteCriteria = null;

	
	protected $collInscripcions;

	
	protected $lastInscripcionCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTipoDocumento()
	{

		return $this->tipo_documento;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getApellido()
	{

		return $this->apellido;
	}

	
	public function getTelefono()
	{

		return $this->telefono;
	}

	
	public function getMovil()
	{

		return $this->movil;
	}

	
	public function getTelefonoEmergencia()
	{

		return $this->telefono_emergencia;
	}

	
	public function getDireccion()
	{

		return $this->direccion;
	}

	
	public function getFechaNacimiento($format = 'Y-m-d')
	{

		if ($this->fecha_nacimiento === null || $this->fecha_nacimiento === '') {
			return null;
		} elseif (!is_int($this->fecha_nacimiento)) {
						$ts = strtotime($this->fecha_nacimiento);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha_nacimiento] as date/time value: " . var_export($this->fecha_nacimiento, true));
			}
		} else {
			$ts = $this->fecha_nacimiento;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPareja()
	{

		return $this->pareja;
	}

	
	public function getHijos()
	{

		return $this->hijos;
	}

	
	public function getIdSociedadMedica()
	{

		return $this->id_sociedad_medica;
	}

	
	public function getHistoriaMedica()
	{

		return $this->historia_medica;
	}

	
	public function getSexo()
	{

		return $this->sexo;
	}

	
	public function getIdLocalidad()
	{

		return $this->id_localidad;
	}

	
	public function getIdPais()
	{

		return $this->id_pais;
	}

	
	public function getIdChips()
	{

		return $this->id_chips;
	}

	
	public function getIdUsuario()
	{

		return $this->id_usuario;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CorredorPeer::ID;
		}

	} 
	
	public function setTipoDocumento($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tipo_documento !== $v) {
			$this->tipo_documento = $v;
			$this->modifiedColumns[] = CorredorPeer::TIPO_DOCUMENTO;
		}

	} 
	
	public function setNombre($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = CorredorPeer::NOMBRE;
		}

	} 
	
	public function setApellido($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = CorredorPeer::APELLIDO;
		}

	} 
	
	public function setTelefono($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = CorredorPeer::TELEFONO;
		}

	} 
	
	public function setMovil($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->movil !== $v) {
			$this->movil = $v;
			$this->modifiedColumns[] = CorredorPeer::MOVIL;
		}

	} 
	
	public function setTelefonoEmergencia($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->telefono_emergencia !== $v) {
			$this->telefono_emergencia = $v;
			$this->modifiedColumns[] = CorredorPeer::TELEFONO_EMERGENCIA;
		}

	} 
	
	public function setDireccion($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = CorredorPeer::DIRECCION;
		}

	} 
	
	public function setFechaNacimiento($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha_nacimiento] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha_nacimiento !== $ts) {
			$this->fecha_nacimiento = $ts;
			$this->modifiedColumns[] = CorredorPeer::FECHA_NACIMIENTO;
		}

	} 
	
	public function setPareja($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->pareja !== $v) {
			$this->pareja = $v;
			$this->modifiedColumns[] = CorredorPeer::PAREJA;
		}

	} 
	
	public function setHijos($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->hijos !== $v) {
			$this->hijos = $v;
			$this->modifiedColumns[] = CorredorPeer::HIJOS;
		}

	} 
	
	public function setIdSociedadMedica($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_sociedad_medica !== $v) {
			$this->id_sociedad_medica = $v;
			$this->modifiedColumns[] = CorredorPeer::ID_SOCIEDAD_MEDICA;
		}

		if ($this->aSociedadMedica !== null && $this->aSociedadMedica->getId() !== $v) {
			$this->aSociedadMedica = null;
		}

	} 
	
	public function setHistoriaMedica($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->historia_medica !== $v) {
			$this->historia_medica = $v;
			$this->modifiedColumns[] = CorredorPeer::HISTORIA_MEDICA;
		}

	} 
	
	public function setSexo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = CorredorPeer::SEXO;
		}

	} 
	
	public function setIdLocalidad($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_localidad !== $v) {
			$this->id_localidad = $v;
			$this->modifiedColumns[] = CorredorPeer::ID_LOCALIDAD;
		}

		if ($this->aLocalidad !== null && $this->aLocalidad->getId() !== $v) {
			$this->aLocalidad = null;
		}

	} 
	
	public function setIdPais($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_pais !== $v) {
			$this->id_pais = $v;
			$this->modifiedColumns[] = CorredorPeer::ID_PAIS;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
		}

	} 
	
	public function setIdChips($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_chips !== $v) {
			$this->id_chips = $v;
			$this->modifiedColumns[] = CorredorPeer::ID_CHIPS;
		}

		if ($this->aChips !== null && $this->aChips->getId() !== $v) {
			$this->aChips = null;
		}

	} 
	
	public function setIdUsuario($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_usuario !== $v) {
			$this->id_usuario = $v;
			$this->modifiedColumns[] = CorredorPeer::ID_USUARIO;
		}

		if ($this->aUsuarios !== null && $this->aUsuarios->getId() !== $v) {
			$this->aUsuarios = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->tipo_documento = $rs->getInt($startcol + 1);

			$this->nombre = $rs->getString($startcol + 2);

			$this->apellido = $rs->getString($startcol + 3);

			$this->telefono = $rs->getString($startcol + 4);

			$this->movil = $rs->getString($startcol + 5);

			$this->telefono_emergencia = $rs->getString($startcol + 6);

			$this->direccion = $rs->getString($startcol + 7);

			$this->fecha_nacimiento = $rs->getDate($startcol + 8, null);

			$this->pareja = $rs->getString($startcol + 9);

			$this->hijos = $rs->getString($startcol + 10);

			$this->id_sociedad_medica = $rs->getInt($startcol + 11);

			$this->historia_medica = $rs->getString($startcol + 12);

			$this->sexo = $rs->getString($startcol + 13);

			$this->id_localidad = $rs->getInt($startcol + 14);

			$this->id_pais = $rs->getInt($startcol + 15);

			$this->id_chips = $rs->getInt($startcol + 16);

			$this->id_usuario = $rs->getInt($startcol + 17);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Corredor object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CorredorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CorredorPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CorredorPeer::DATABASE_NAME);
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


												
			if ($this->aSociedadMedica !== null) {
				if ($this->aSociedadMedica->isModified()) {
					$affectedRows += $this->aSociedadMedica->save($con);
				}
				$this->setSociedadMedica($this->aSociedadMedica);
			}

			if ($this->aLocalidad !== null) {
				if ($this->aLocalidad->isModified()) {
					$affectedRows += $this->aLocalidad->save($con);
				}
				$this->setLocalidad($this->aLocalidad);
			}

			if ($this->aPais !== null) {
				if ($this->aPais->isModified()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}

			if ($this->aChips !== null) {
				if ($this->aChips->isModified()) {
					$affectedRows += $this->aChips->save($con);
				}
				$this->setChips($this->aChips);
			}

			if ($this->aUsuarios !== null) {
				if ($this->aUsuarios->isModified()) {
					$affectedRows += $this->aUsuarios->save($con);
				}
				$this->setUsuarios($this->aUsuarios);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CorredorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CorredorPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAsociacionCorredors !== null) {
				foreach($this->collAsociacionCorredors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCorredorEquipamientos !== null) {
				foreach($this->collCorredorEquipamientos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCuentaCorrientes !== null) {
				foreach($this->collCuentaCorrientes as $referrerFK) {
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


												
			if ($this->aSociedadMedica !== null) {
				if (!$this->aSociedadMedica->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSociedadMedica->getValidationFailures());
				}
			}

			if ($this->aLocalidad !== null) {
				if (!$this->aLocalidad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLocalidad->getValidationFailures());
				}
			}

			if ($this->aPais !== null) {
				if (!$this->aPais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPais->getValidationFailures());
				}
			}

			if ($this->aChips !== null) {
				if (!$this->aChips->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aChips->getValidationFailures());
				}
			}

			if ($this->aUsuarios !== null) {
				if (!$this->aUsuarios->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarios->getValidationFailures());
				}
			}


			if (($retval = CorredorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAsociacionCorredors !== null) {
					foreach($this->collAsociacionCorredors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCorredorEquipamientos !== null) {
					foreach($this->collCorredorEquipamientos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCuentaCorrientes !== null) {
					foreach($this->collCuentaCorrientes as $referrerFK) {
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CorredorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTipoDocumento();
				break;
			case 2:
				return $this->getNombre();
				break;
			case 3:
				return $this->getApellido();
				break;
			case 4:
				return $this->getTelefono();
				break;
			case 5:
				return $this->getMovil();
				break;
			case 6:
				return $this->getTelefonoEmergencia();
				break;
			case 7:
				return $this->getDireccion();
				break;
			case 8:
				return $this->getFechaNacimiento();
				break;
			case 9:
				return $this->getPareja();
				break;
			case 10:
				return $this->getHijos();
				break;
			case 11:
				return $this->getIdSociedadMedica();
				break;
			case 12:
				return $this->getHistoriaMedica();
				break;
			case 13:
				return $this->getSexo();
				break;
			case 14:
				return $this->getIdLocalidad();
				break;
			case 15:
				return $this->getIdPais();
				break;
			case 16:
				return $this->getIdChips();
				break;
			case 17:
				return $this->getIdUsuario();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CorredorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTipoDocumento(),
			$keys[2] => $this->getNombre(),
			$keys[3] => $this->getApellido(),
			$keys[4] => $this->getTelefono(),
			$keys[5] => $this->getMovil(),
			$keys[6] => $this->getTelefonoEmergencia(),
			$keys[7] => $this->getDireccion(),
			$keys[8] => $this->getFechaNacimiento(),
			$keys[9] => $this->getPareja(),
			$keys[10] => $this->getHijos(),
			$keys[11] => $this->getIdSociedadMedica(),
			$keys[12] => $this->getHistoriaMedica(),
			$keys[13] => $this->getSexo(),
			$keys[14] => $this->getIdLocalidad(),
			$keys[15] => $this->getIdPais(),
			$keys[16] => $this->getIdChips(),
			$keys[17] => $this->getIdUsuario(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CorredorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTipoDocumento($value);
				break;
			case 2:
				$this->setNombre($value);
				break;
			case 3:
				$this->setApellido($value);
				break;
			case 4:
				$this->setTelefono($value);
				break;
			case 5:
				$this->setMovil($value);
				break;
			case 6:
				$this->setTelefonoEmergencia($value);
				break;
			case 7:
				$this->setDireccion($value);
				break;
			case 8:
				$this->setFechaNacimiento($value);
				break;
			case 9:
				$this->setPareja($value);
				break;
			case 10:
				$this->setHijos($value);
				break;
			case 11:
				$this->setIdSociedadMedica($value);
				break;
			case 12:
				$this->setHistoriaMedica($value);
				break;
			case 13:
				$this->setSexo($value);
				break;
			case 14:
				$this->setIdLocalidad($value);
				break;
			case 15:
				$this->setIdPais($value);
				break;
			case 16:
				$this->setIdChips($value);
				break;
			case 17:
				$this->setIdUsuario($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CorredorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipoDocumento($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNombre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setApellido($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelefono($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMovil($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelefonoEmergencia($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDireccion($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFechaNacimiento($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPareja($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setHijos($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIdSociedadMedica($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setHistoriaMedica($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSexo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setIdLocalidad($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setIdPais($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setIdChips($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setIdUsuario($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CorredorPeer::DATABASE_NAME);

		if ($this->isColumnModified(CorredorPeer::ID)) $criteria->add(CorredorPeer::ID, $this->id);
		if ($this->isColumnModified(CorredorPeer::TIPO_DOCUMENTO)) $criteria->add(CorredorPeer::TIPO_DOCUMENTO, $this->tipo_documento);
		if ($this->isColumnModified(CorredorPeer::NOMBRE)) $criteria->add(CorredorPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CorredorPeer::APELLIDO)) $criteria->add(CorredorPeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(CorredorPeer::TELEFONO)) $criteria->add(CorredorPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(CorredorPeer::MOVIL)) $criteria->add(CorredorPeer::MOVIL, $this->movil);
		if ($this->isColumnModified(CorredorPeer::TELEFONO_EMERGENCIA)) $criteria->add(CorredorPeer::TELEFONO_EMERGENCIA, $this->telefono_emergencia);
		if ($this->isColumnModified(CorredorPeer::DIRECCION)) $criteria->add(CorredorPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(CorredorPeer::FECHA_NACIMIENTO)) $criteria->add(CorredorPeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
		if ($this->isColumnModified(CorredorPeer::PAREJA)) $criteria->add(CorredorPeer::PAREJA, $this->pareja);
		if ($this->isColumnModified(CorredorPeer::HIJOS)) $criteria->add(CorredorPeer::HIJOS, $this->hijos);
		if ($this->isColumnModified(CorredorPeer::ID_SOCIEDAD_MEDICA)) $criteria->add(CorredorPeer::ID_SOCIEDAD_MEDICA, $this->id_sociedad_medica);
		if ($this->isColumnModified(CorredorPeer::HISTORIA_MEDICA)) $criteria->add(CorredorPeer::HISTORIA_MEDICA, $this->historia_medica);
		if ($this->isColumnModified(CorredorPeer::SEXO)) $criteria->add(CorredorPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(CorredorPeer::ID_LOCALIDAD)) $criteria->add(CorredorPeer::ID_LOCALIDAD, $this->id_localidad);
		if ($this->isColumnModified(CorredorPeer::ID_PAIS)) $criteria->add(CorredorPeer::ID_PAIS, $this->id_pais);
		if ($this->isColumnModified(CorredorPeer::ID_CHIPS)) $criteria->add(CorredorPeer::ID_CHIPS, $this->id_chips);
		if ($this->isColumnModified(CorredorPeer::ID_USUARIO)) $criteria->add(CorredorPeer::ID_USUARIO, $this->id_usuario);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CorredorPeer::DATABASE_NAME);

		$criteria->add(CorredorPeer::ID, $this->id);
		$criteria->add(CorredorPeer::ID_USUARIO, $this->id_usuario);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getId();

		$pks[1] = $this->getIdUsuario();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setId($keys[0]);

		$this->setIdUsuario($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setTipoDocumento($this->tipo_documento);

		$copyObj->setNombre($this->nombre);

		$copyObj->setApellido($this->apellido);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setMovil($this->movil);

		$copyObj->setTelefonoEmergencia($this->telefono_emergencia);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setFechaNacimiento($this->fecha_nacimiento);

		$copyObj->setPareja($this->pareja);

		$copyObj->setHijos($this->hijos);

		$copyObj->setIdSociedadMedica($this->id_sociedad_medica);

		$copyObj->setHistoriaMedica($this->historia_medica);

		$copyObj->setSexo($this->sexo);

		$copyObj->setIdLocalidad($this->id_localidad);

		$copyObj->setIdPais($this->id_pais);

		$copyObj->setIdChips($this->id_chips);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAsociacionCorredors() as $relObj) {
				$copyObj->addAsociacionCorredor($relObj->copy($deepCopy));
			}

			foreach($this->getCorredorEquipamientos() as $relObj) {
				$copyObj->addCorredorEquipamiento($relObj->copy($deepCopy));
			}

			foreach($this->getCuentaCorrientes() as $relObj) {
				$copyObj->addCuentaCorriente($relObj->copy($deepCopy));
			}

			foreach($this->getInscripcions() as $relObj) {
				$copyObj->addInscripcion($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
		$copyObj->setIdUsuario(NULL); 
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
			self::$peer = new CorredorPeer();
		}
		return self::$peer;
	}

	
	public function setSociedadMedica($v)
	{


		if ($v === null) {
			$this->setIdSociedadMedica(NULL);
		} else {
			$this->setIdSociedadMedica($v->getId());
		}


		$this->aSociedadMedica = $v;
	}


	
	public function getSociedadMedica($con = null)
	{
		if ($this->aSociedadMedica === null && ($this->id_sociedad_medica !== null)) {
						$this->aSociedadMedica = SociedadMedicaPeer::retrieveByPK($this->id_sociedad_medica, $con);

			
		}
		return $this->aSociedadMedica;
	}

	
	public function setLocalidad($v)
	{


		if ($v === null) {
			$this->setIdLocalidad(NULL);
		} else {
			$this->setIdLocalidad($v->getId());
		}


		$this->aLocalidad = $v;
	}


	
	public function getLocalidad($con = null)
	{
		if ($this->aLocalidad === null && ($this->id_localidad !== null)) {
						$this->aLocalidad = LocalidadPeer::retrieveByPK($this->id_localidad, $con);

			
		}
		return $this->aLocalidad;
	}

	
	public function setPais($v)
	{


		if ($v === null) {
			$this->setIdPais(NULL);
		} else {
			$this->setIdPais($v->getId());
		}


		$this->aPais = $v;
	}


	
	public function getPais($con = null)
	{
		if ($this->aPais === null && ($this->id_pais !== null)) {
						$this->aPais = PaisPeer::retrieveByPK($this->id_pais, $con);

			
		}
		return $this->aPais;
	}

	
	public function setChips($v)
	{


		if ($v === null) {
			$this->setIdChips(NULL);
		} else {
			$this->setIdChips($v->getId());
		}


		$this->aChips = $v;
	}


	
	public function getChips($con = null)
	{
		if ($this->aChips === null && ($this->id_chips !== null)) {
						$this->aChips = ChipsPeer::retrieveByPK($this->id_chips, $con);

			
		}
		return $this->aChips;
	}

	
	public function setUsuarios($v)
	{


		if ($v === null) {
			$this->setIdUsuario(NULL);
		} else {
			$this->setIdUsuario($v->getId());
		}


		$this->aUsuarios = $v;
	}


	
	public function getUsuarios($con = null)
	{
		if ($this->aUsuarios === null && ($this->id_usuario !== null)) {
						$this->aUsuarios = UsuariosPeer::retrieveByPK($this->id_usuario, $con);

			
		}
		return $this->aUsuarios;
	}

	
	public function initAsociacionCorredors()
	{
		if ($this->collAsociacionCorredors === null) {
			$this->collAsociacionCorredors = array();
		}
	}

	
	public function getAsociacionCorredors($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsociacionCorredors === null) {
			if ($this->isNew()) {
			   $this->collAsociacionCorredors = array();
			} else {

				$criteria->add(AsociacionCorredorPeer::ID_CORREDOR, $this->getId());

				AsociacionCorredorPeer::addSelectColumns($criteria);
				$this->collAsociacionCorredors = AsociacionCorredorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AsociacionCorredorPeer::ID_CORREDOR, $this->getId());

				AsociacionCorredorPeer::addSelectColumns($criteria);
				if (!isset($this->lastAsociacionCorredorCriteria) || !$this->lastAsociacionCorredorCriteria->equals($criteria)) {
					$this->collAsociacionCorredors = AsociacionCorredorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAsociacionCorredorCriteria = $criteria;
		return $this->collAsociacionCorredors;
	}

	
	public function countAsociacionCorredors($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AsociacionCorredorPeer::ID_CORREDOR, $this->getId());

		return AsociacionCorredorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAsociacionCorredor(AsociacionCorredor $l)
	{
		$this->collAsociacionCorredors[] = $l;
		$l->setCorredor($this);
	}


	
	public function getAsociacionCorredorsJoinAsociacion($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAsociacionCorredors === null) {
			if ($this->isNew()) {
				$this->collAsociacionCorredors = array();
			} else {

				$criteria->add(AsociacionCorredorPeer::ID_CORREDOR, $this->getId());

				$this->collAsociacionCorredors = AsociacionCorredorPeer::doSelectJoinAsociacion($criteria, $con);
			}
		} else {
									
			$criteria->add(AsociacionCorredorPeer::ID_CORREDOR, $this->getId());

			if (!isset($this->lastAsociacionCorredorCriteria) || !$this->lastAsociacionCorredorCriteria->equals($criteria)) {
				$this->collAsociacionCorredors = AsociacionCorredorPeer::doSelectJoinAsociacion($criteria, $con);
			}
		}
		$this->lastAsociacionCorredorCriteria = $criteria;

		return $this->collAsociacionCorredors;
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

				$criteria->add(CorredorEquipamientoPeer::ID_CORREDOR, $this->getId());

				CorredorEquipamientoPeer::addSelectColumns($criteria);
				$this->collCorredorEquipamientos = CorredorEquipamientoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CorredorEquipamientoPeer::ID_CORREDOR, $this->getId());

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

		$criteria->add(CorredorEquipamientoPeer::ID_CORREDOR, $this->getId());

		return CorredorEquipamientoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCorredorEquipamiento(CorredorEquipamiento $l)
	{
		$this->collCorredorEquipamientos[] = $l;
		$l->setCorredor($this);
	}


	
	public function getCorredorEquipamientosJoinEquipamiento($criteria = null, $con = null)
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

				$criteria->add(CorredorEquipamientoPeer::ID_CORREDOR, $this->getId());

				$this->collCorredorEquipamientos = CorredorEquipamientoPeer::doSelectJoinEquipamiento($criteria, $con);
			}
		} else {
									
			$criteria->add(CorredorEquipamientoPeer::ID_CORREDOR, $this->getId());

			if (!isset($this->lastCorredorEquipamientoCriteria) || !$this->lastCorredorEquipamientoCriteria->equals($criteria)) {
				$this->collCorredorEquipamientos = CorredorEquipamientoPeer::doSelectJoinEquipamiento($criteria, $con);
			}
		}
		$this->lastCorredorEquipamientoCriteria = $criteria;

		return $this->collCorredorEquipamientos;
	}

	
	public function initCuentaCorrientes()
	{
		if ($this->collCuentaCorrientes === null) {
			$this->collCuentaCorrientes = array();
		}
	}

	
	public function getCuentaCorrientes($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentaCorrientes === null) {
			if ($this->isNew()) {
			   $this->collCuentaCorrientes = array();
			} else {

				$criteria->add(CuentaCorrientePeer::ID_CORREDOR, $this->getId());

				CuentaCorrientePeer::addSelectColumns($criteria);
				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CuentaCorrientePeer::ID_CORREDOR, $this->getId());

				CuentaCorrientePeer::addSelectColumns($criteria);
				if (!isset($this->lastCuentaCorrienteCriteria) || !$this->lastCuentaCorrienteCriteria->equals($criteria)) {
					$this->collCuentaCorrientes = CuentaCorrientePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCuentaCorrienteCriteria = $criteria;
		return $this->collCuentaCorrientes;
	}

	
	public function countCuentaCorrientes($criteria = null, $distinct = false, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CuentaCorrientePeer::ID_CORREDOR, $this->getId());

		return CuentaCorrientePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCuentaCorriente(CuentaCorriente $l)
	{
		$this->collCuentaCorrientes[] = $l;
		$l->setCorredor($this);
	}


	
	public function getCuentaCorrientesJoinFormaPago($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCuentaCorrientes === null) {
			if ($this->isNew()) {
				$this->collCuentaCorrientes = array();
			} else {

				$criteria->add(CuentaCorrientePeer::ID_CORREDOR, $this->getId());

				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelectJoinFormaPago($criteria, $con);
			}
		} else {
									
			$criteria->add(CuentaCorrientePeer::ID_CORREDOR, $this->getId());

			if (!isset($this->lastCuentaCorrienteCriteria) || !$this->lastCuentaCorrienteCriteria->equals($criteria)) {
				$this->collCuentaCorrientes = CuentaCorrientePeer::doSelectJoinFormaPago($criteria, $con);
			}
		}
		$this->lastCuentaCorrienteCriteria = $criteria;

		return $this->collCuentaCorrientes;
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

				$criteria->add(InscripcionPeer::ID_CORREDOR, $this->getId());

				InscripcionPeer::addSelectColumns($criteria);
				$this->collInscripcions = InscripcionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InscripcionPeer::ID_CORREDOR, $this->getId());

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

		$criteria->add(InscripcionPeer::ID_CORREDOR, $this->getId());

		return InscripcionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInscripcion(Inscripcion $l)
	{
		$this->collInscripcions[] = $l;
		$l->setCorredor($this);
	}


	
	public function getInscripcionsJoinFechaEtapaCarrera($criteria = null, $con = null)
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

				$criteria->add(InscripcionPeer::ID_CORREDOR, $this->getId());

				$this->collInscripcions = InscripcionPeer::doSelectJoinFechaEtapaCarrera($criteria, $con);
			}
		} else {
									
			$criteria->add(InscripcionPeer::ID_CORREDOR, $this->getId());

			if (!isset($this->lastInscripcionCriteria) || !$this->lastInscripcionCriteria->equals($criteria)) {
				$this->collInscripcions = InscripcionPeer::doSelectJoinFechaEtapaCarrera($criteria, $con);
			}
		}
		$this->lastInscripcionCriteria = $criteria;

		return $this->collInscripcions;
	}

} 