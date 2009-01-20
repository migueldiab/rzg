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
	
  public function executeSave()
  {
    if ($this->getRequestParameter('agregar_etapa')) {
      return $this->forward('carrera', 'etapa');
    }
    else {
      return $this->forward('carrera', 'edit');
    }
  }
  
  public function executeEtapa()
  {    
    $this->carrera = $this->getCarreraOrCreate();
    if ($this->getRequest()->isMethod('post'))
    {
      $this->updateCarreraFromRequest();
      try
      {
        $this->saveCarrera($this->carrera);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Carreras.');
        return $this->forward('carrera', 'edit');
      }
    }
    $this->redirect('etapacarrera/edit?id_carrera='.$this->carrera->getId());
  }

}
