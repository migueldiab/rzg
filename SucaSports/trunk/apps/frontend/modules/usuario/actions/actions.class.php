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
	
    public function executeRegistrar()    
    {
      $this->forward('usuario', 'edit');
    }
    
  protected function updateUsuarioFromRequest()
  {
    $usuario = $this->getRequestParameter('usuario');
    if (!isset($usuario['verify_password']) ||
        !isset($usuario['documento']) ||
        !isset($usuario['email']) ||
        !isset($usuario['password'])) {
        $this->getUser()->setFlash('error', 'Error, Some of the data is missing');
        $this->forward('usuario', 'edit');
      
    }
    if ($this->usuario->ValidateID($usuario['documento']))
    {
        if ($this->usuario->VerifyPassword($usuario['verify_password'],$usuario['password']) != 1)
        {
            $this->getUser()->setFlash('error', 'Passwords Do not match');
            return $this->forward('usuario', 'edit');
        }
        if ($this->usuario->check_email_address($usuario['email']))
        {
            $this->usuario->setDocumento($usuario['documento']);
            $this->usuario->setEmail($usuario['email']);
            $this->usuario->setPasswordEncryptar($usuario['password']);
        }
        else
        {
            $this->getUser()->setFlash('error', 'Email Address is not valid');
            return $this->forward('usuario', 'edit');
        }
    }
    else
    {
        $this->getUser()->setFlash('error', 'User already exists');
        return $this->forward('usuario', 'edit');
    }
  }
  public function executeIndex()
  {
    return $this->forward('usuario', 'list');
  }

  public function executeList()
  {
    $this->processSort();
    $this->processFilters();
    // pager
    $this->pager = new sfPropelPager('Usuario', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/usuario')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/usuario');
    }
  }

  public function executeCreate()
  {
    return $this->forward('usuario', 'edit');
  }

  public function executeSave()
  {
  	  $this->usuario = new Usuario();
      $this->updateUsuarioFromRequest();
      try
      {
        $this->usuario->save();
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Usuarios.');
        return $this->forward('usuario', 'list');
      }
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');
      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('usuario/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('usuario/list');
      }
      else
      {
        return $this->redirect('usuario/edit?id='.$this->usuario->getId());
      }
  	  return $this->forward('home', 'index');
  }


  public function executeEdit()
  {
    $this->usuario = new Usuario();
    $this->labels = $this->getLabels();
  }


  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->usuario = $this->getUsuarioOrCreate();
    $this->updateUsuarioFromRequest();
    $this->labels = $this->getLabels();
    return sfView::SUCCESS;
  }

  protected function getLabels()
  {
    return array(
      'usuario{documento}' => 'Documento:',
      'usuario{email}' => 'Email:',
      'usuario{password}' => 'Password:',
      'usuario{verify_password}' => 'Verify password:',
    );
  }
}
