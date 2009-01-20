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
	 public function executeGuardar() {
    
	 }
	 public function executeNueva() {
    $usuario = $this->getUser()->getAttribute('usuario', '', 'sesion');
    
    if (!$usuario->getIdCorredor()) {
    	$this->getUser()->setFlash('notice', 'Por favor complete su perfil antes de inscribirse a una carrera');
      return $this->redirect('corredor/perfil');      	 
    }
    
	 	$carrera = CarreraPeer::retrieveByPK($this->getRequestParameter('id_carrera'));
	 	$this->carrera = $carrera;
	 	
	 	$inscripcion = new Inscripcion();
    $inscripcion->setFechaInicio($this->getRequestParameter('fecha_etapa'));
    $inscripcion->setIdCarrera($this->getRequestParameter('id_carrera'));
    $inscripcion->setIdEtapa($this->getRequestParameter('id_etapa'));
    
    $fecha_etapa = FechaEtapaCarreraPeer::retrieveByPK($inscripcion->getFechaInicio(), $inscripcion->getIdEtapa(), $inscripcion->getIdCarrera());
    
    $cuenta_corriente = new CuentaCorriente();
    $cuenta_corriente->setIdCorredor($usuario->getIdCorredor());
    
		$corredor = CorredorPeer::retrieveByPK($usuario->getIdCorredor());
		
    $inscripcion->setIdCorredor($corredor->getId());
    $this->cuenta_corriente = $cuenta_corriente;
    $this->inscripcion = $inscripcion;
    $this->fecha_etapa = $fecha_etapa;
	 	
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
