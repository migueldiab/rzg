<?php

/**
 * Corredor actions.
 *
 * @package    sucasports
 * @subpackage Corredor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class CorredorActions extends autoCorredorActions
{
	public function executeGuardarPerfil() {
	    $usuario = $this->getUser()->getAttribute('usuario', '', 'sesion');
	    
	    $this->corredor = $usuario->getCorredor();
	    if (!$this->corredor) {
	      $this->corredor = new Corredor();
	      $this->corredor->setDocumento($usuario->getDocumento());
	    }
		  $this->updateCorredorFromRequest();
      $this->saveCorredor($this->corredor);
      $this->asociarCorredorUsuario($this->corredor->getId());
      $this->forward('corredor','perfil');
		
	}
  public function executeCarreras() {
    $this->corredor = $this->getCorredor();
    $this->labels = $this->getLabels();    
  	
  }
  public function executeContacto() {
    $this->corredor = $this->getCorredor();
    $this->labels = $this->getLabels();    
  	
  }
  public function executeCuentas() {
    $this->corredor = $this->getCorredor();
    $this->labels = $this->getLabels();    
  	
  }
  public function executeEquipamiento() {
    $this->corredor = $this->getCorredor();
    $this->labels = $this->getLabels();    
  	
  }
  public function executeHistoriaMedica() {
    $this->corredor = $this->getCorredor();
    $this->labels = $this->getLabels();    
    
  }
  public function executeCuenta() {
    $this->corredor = $this->getCorredor();
    $this->labels = $this->getLabels();    
    
  }
  public function executePerfil() {
    
  }
  
  public function executeDatosPersonales() {
  	$this->corredor = $this->getCorredor();
    $this->labels = $this->getLabels();    
  }
  protected function getCorredor() {
    $usuario = $this->getUser()->getAttribute('usuario', '', 'sesion');
    $corredor = $usuario->getCorredor();
    if (!$corredor) {
      $corredor = new Corredor();
      $corredor->setDocumento($usuario->getDocumento());
    }
    return $corredor;
  }
  public function asociarCorredorUsuario($idCorredor) {
  	$elUsuario = $this->getUser()->getAttribute('usuario', '', 'sesion');
  	$usuario = UsuarioPeer::retrieveByPk($elUsuario->getId());
  	$usuario->setIdCorredor($idCorredor);
  	$usuario->save();
  	$this->context->getUser()->setAttribute('usuario', $usuario, 'sesion');
  	
  }
}