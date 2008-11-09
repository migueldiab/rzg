<?php

/**
 * Subclass for representing a row from the 'carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Carrera extends BaseCarrera
{    
    public function __toString() {
      return $this->getNombre();
    }
    public function getCategoriaCarrera($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCategoriaCarreras === null) {
			if ($this->isNew()) {
			   $this->collCategoriaCarreras = array();
			} else {

				$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->getId());

				CategoriaCarreraPeer::addSelectColumns($criteria);
				$this->collCategoriaCarreras = CategoriaCarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CategoriaCarreraPeer::ID_CARRERA, $this->getId());

				CategoriaCarreraPeer::addSelectColumns($criteria);
				if (!isset($this->lastCategoriaCarreraCriteria) || !$this->lastCategoriaCarreraCriteria->equals($criteria)) {
					$this->collCategoriaCarreras = CategoriaCarreraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCategoriaCarreraCriteria = $criteria;
		return $this->collCategoriaCarreras;
	}
    public function getEtapaCarrera($criteria = null, $con = null)
	{
				if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEtapaCarreras === null) {
			if ($this->isNew()) {
			   $this->collEtapaCarreras = array();
			} else {

				$criteria->add(EtapaCarreraPeer::ID_CARRERA, $this->getId());

				EtapaCarreraPeer::addSelectColumns($criteria);
				$this->collEtapaCarreras = EtapaCarreraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EtapaCarreraPeer::ID_CARRERA, $this->getId());

				EtapaCarreraPeer::addSelectColumns($criteria);
				if (!isset($this->lastEtapaCarreraCriteria) || !$this->lastEtapaCarreraCriteria->equals($criteria)) {
					$this->collEtapaCarreras = EtapaCarreraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEtapaCarreraCriteria = $criteria;
        foreach ($this->collEtapaCarreras as $etapa){
            echo $etapa->GetNumeroEtapa();
            echo '&nbsp&nbsp&nbsp&';
            echo $etapa->GetNombre();
            echo '<br />';
            //print_r($etapa);
        }
        //print_r($this->collEtapaCarreras);
		return $this->collEtapaCarreras;
        
	}
}
