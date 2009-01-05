<?php

/**
 * inscripcion actions.
 *
 * @package    sucasports
 * @subpackage inscripcion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class inscripcionActions extends autoinscripcionActions
{
	 public function executeNueva() {
    $this->inscripcion = new Inscripcion();

    if ($this->getRequest()->isMethod('post'))
    {
      $this->updateInscripcionFromRequest();

      try
      {
        $this->saveInscripcion($this->inscripcion);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Inscripcions.');
        return $this->forward('inscripcion', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('inscripcion/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('inscripcion/list');
      }
      else
      {
        return $this->redirect('inscripcion/edit?id_corredor='.$this->inscripcion->getIdCorredor().'&fecha_inicio='.$this->inscripcion->getFechaInicio().'&id_etapa='.$this->inscripcion->getIdEtapa().'&id_carrera='.$this->inscripcion->getIdCarrera());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
	 	
	 }
}
