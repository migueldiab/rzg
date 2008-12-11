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
  public function executePerfil() {
  	$usuario = $this->getUser()->getAttribute('usuario', '', 'sesion');
    $this->corredor = $usuario->getCorredor();
    if (!$this->corredor) {
      $this->corredor = new Corredor();
      $this->corredor->setDocumento($usuario->getDocumento());
    }  	
    $this->labels = $this->getLabels();    
  }
  public function asociarCorredorUsuario($idCorredor) {
  	$elUsuario = $this->getUser()->getAttribute('usuario', '', 'sesion');
  	$usuario = UsuarioPeer::retrieveByPk($elUsuario->getId());
  	$usuario->setIdCorredor($idCorredor);
  	$usuario->save();
  	$this->context->getUser()->setAttribute('usuario', $usuario, 'sesion');
  	
  }
}