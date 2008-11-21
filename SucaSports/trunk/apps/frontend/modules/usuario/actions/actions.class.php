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
		//$pepe = new validarUsuario();
	  if ($this->getRequest()->getMethod() != sfRequest::POST)
	  {
	    $this->getRequest()->setAttribute('url_original', $this->getRequest()->getReferer());
	  }
	  else
	  {
	  	if ($this->getRequestParameter('url_original'))
        $this->redirect($this->getRequestParameter('url_original'));
      else
        $this->redirect('@homepage');
	  }
	}
	public function handleErrorLogin()
	{
    $this->getRequest()->setAttribute('url_original', $this->getRequestParameter('url_original', '@homepage'));
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
