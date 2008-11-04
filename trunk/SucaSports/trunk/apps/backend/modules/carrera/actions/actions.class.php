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
    public function executeEtapa0() {
        return $this->redirect('etapacarrera/create');
    }

    public function executeEtapa(){
        $prueba = $this->getRequestParameter('id');
        echo $prueba;
        echo "antes del for";
        return $this->redirect('etapacarrera/edit');
    }    
}
