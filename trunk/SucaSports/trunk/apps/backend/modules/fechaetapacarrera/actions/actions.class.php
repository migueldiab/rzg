<?php

/**
 * fechaetapacarrera actions.
 *
 * @package    sucasports
 * @subpackage fechaetapacarrera
 * @author     Marcos
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fechaetapacarreraActions extends autofechaetapacarreraActions
{
public function executeDisplayCarreraEtapaFechas()
{
//$this->fecha_etapa_carrera = $this->getFechaEtapaCarrerabyCarreraEtapa();
$this->carrera = CarreraPeer::retrieveByPk($this->getRequestParameter('id_carrera'));
}


protected function getFechaEtapaCarrerabyCarreraEtapa($id_carrera = 'id_carrera', $id_etapa = 'id_etapa')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
        $c = new Criteria();
        $c->add(FechaEtapaCarreraPeer::ID_CARRERA, '0');
        $carrera = FechaEtapaCarreraPeer::doSelect($c);

      echo "no hay etapas para la carrera";
    }
    else
    {
      $fecha_etapa_carrera = FechaEtapaCarreraPeer:: retrieveByCarreraEtapa($this->getRequestParameter($carrera_id),$this->getRequestParameter($carrera_id));

      $this->forward404Unless($fecha_etapa_carrera);
    }
    return $fecha_etapa_carrera;
  }
}

