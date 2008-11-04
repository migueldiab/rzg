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
    $c = new Criteria();
    $c->add(EtapaCarreraPeer::ID_CARRERA, $this->getRequestParameter('id'));
    $etapa = EtapaCarreraPeer::doSelectOne($c);
    echo "<br>".$etapa->getNumeroEtapa();
    echo "<br> ".$etapa->getUpdatedBy();
    echo "<br> ".$etapa->getNombre();
    
    
//        print_r($param);
//        print_r($this->getRequestParameter('id'));
        exit;
        return $this->redirect('etapacarrera/edit/$param');
    }    
}
