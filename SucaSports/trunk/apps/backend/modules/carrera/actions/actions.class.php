<?php

/**
 * Carrera actions.
 *
 * @package    sucasports
 * @subpackage Carrera
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class CarreraActions extends autoCarreraActions
{
    public function executeEtapa(){
        
    $etapa = new EtapaCarrera();  
    //$c = new Criteria();
    //$c->add(EtapaCarreraPeer::ID_CARRERA, $this->getRequestParameter('id'));
    //$etapa = EtapaCarreraPeer::doSelectOne($c);
    $etapa->setIdCarrera($this->getRequestParameter('id'));
    $etapa->save();
    
    //echo "<br>".$etapa->getNumeroEtapa();
    //echo "<br> ".$etapa->getUpdatedBy();
    //echo "<br> ".$etapa->getNombre();
    $this->redirect('etapacarrera/edit?id_etapa='.$etapa->getIdEtapa().'&id_carrera='.$this->getRequestParameter('id'));
//        print_r($this->getRequestParameter('id'));
    }
  
}
