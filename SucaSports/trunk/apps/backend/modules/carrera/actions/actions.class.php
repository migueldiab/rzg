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
//    $carrera = new Carrera;
//    $carrera->setNombre($this->getRequestParameter('nombre'));
//    $carrera->setDescripcion($this->getRequestParameter('descripcion'));
//    $carrera->setUrl($this->getRequestParameter('url'));
//    $carrera->save();
    
    $this->redirect('etapacarrera/edit?id_carrera='.$this->getRequestParameter('id'));

    }
  
}
