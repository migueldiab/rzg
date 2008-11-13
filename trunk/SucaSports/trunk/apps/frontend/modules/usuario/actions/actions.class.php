<?php

/**
 * usuario actions.
 *
 * @package    sucasports
 * @subpackage usuario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class usuarioActions extends autousuarioActions
{
	public function executeLogin()
	{
	  if ($this->getRequest()->getMethod() != sfRequest::POST)
	  {
	    $this->getRequest()->setAttribute('url_original', $this->getRequest()->getReferer());
	  }
	  else
	  {
	    $usuario = $this->getRequestParameter('usuario');
	 
	    $c = new Criteria();
	    $c->add(UsuarioPeer::NOMBRE, $usuario);
	    $usuario = UsuarioPeer::doSelectOne($c);
	 
	    if ($usuario)
	    {
	      if (true)
	      {
	        $this->getUser()->setAuthenticated(true);
	        $this->getUser()->addCredential('temp');
	 
	        $this->getUser()->setAttribute('usuario', $usuario, 'sesion');
	        
	        $this->redirect($this->getRequestParameter('url_original', '@homepage'));
	      }
	    }
	  }
	}
	public function handleErrorLogin()
	{
	  return sfView::SUCCESS;
	}		
	public function executeLogout()
	{
	  $this->getUser()->setAuthenticated(false);
	  $this->getUser()->clearCredentials();
	 
	  $this->getUser()->getAttributeHolder()->removeNamespace('sesion');
	 
	  $this->redirect('@homepage');
	}
		
			
}
