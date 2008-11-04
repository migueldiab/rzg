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
        $c = new Criteria();
        $c->add(EtapaCarreraPeer::ID_CARRERA, $this->getRequestParameter('id'));
        $carrera = new Carrera();
        $param = $carrera->getEtapaCarreras($c);
        print_r($param);
        print_r($this->getRequestParameter('id'));
        exit;
        return $this->redirect('etapacarrera/edit/$param');
    }    
}
