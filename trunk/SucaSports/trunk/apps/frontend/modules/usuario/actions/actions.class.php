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
	    if ($this->getUser()->isAuthenticated()) {
	      return $this->redirect('corredor/perfil');      
	    }
    	$this->forward('usuario', 'edit');
    }
    
  protected function updateUsuarioFromRequest()
  {
    $usuario = $this->getRequestParameter('usuario');
    if (!isset($usuario['verify_password']) ||
        !isset($usuario['documento']) ||
        !isset($usuario['email']) ||
        !isset($usuario['password'])) {
        $this->getUser()->setFlash('error', 'Por favor, complete todos los datos');
        $this->forward('usuario', 'edit');
      
    }
    if ($this->usuario->ValidateID($usuario['documento']))
    {
        if ($this->usuario->VerifyPassword($usuario['verify_password'],$usuario['password']) != 1)
        {
            $this->getUser()->setFlash('error', 'La contraseña y su verificacion deben ser iguales');
            return $this->forward('usuario', 'edit');
        }
        if ($this->usuario->check_email_address($usuario['email']))
        {
            $this->usuario->setDocumento($usuario['documento']);
            $this->usuario->setEmail($usuario['email']);
            $this->usuario->setPasswordEncryptar($usuario['password']);
            $this->usuario->setEstado('i');
            $this->usuario->setIdGrupo(2);
            $hashString = md5(date('U'));
            $this->usuario->setVerificador($hashString);
        }
        else
        {
            $this->getUser()->setFlash('error', 'La dirección de correo no es válida, verifique');
            return $this->forward('usuario', 'edit');
        }
    }
    else
    {
        $this->getUser()->setFlash('error', 'El usuario ya existe en nuestra base de datos');
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
    /*
     * Crea el cuerpo del mensaje con el Component enviarConfirmacion
     * usando components.class.php y _enviarConfirmacion.php en templates
     */
    $mailBody = $this->getComponent('usuario', 'enviarConfirmacion', array('usuario' => $this->usuario));
    try {
      $this->usuario->save();
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('edit', 'Error al crear el usuario, disculpe las molestias.');
      return $this->forward('usuario', 'edit');
    }
    try
    {
        /*
         * En la tabla configuraci�n se necesita un campo con parametro SMTP_SERVER y valor
         * igual al servidor de SMTP desde d�nde se env�an los mails...
         */
      $smtp = ConfiguracionPeer::getParametro('SMTP_SERVER');
      $from = ConfiguracionPeer::getParametro('EMAIL_FROM');
      $pass = ConfiguracionPeer::getParametro('SMTP_PASSWORD');

      $connection = new Swift_Connection_SMTP($smtp, 25);
      $mailer = new Swift($connection);
      $connection->setUsername($from);
      $connection->setPassword($pass);
      $message = new Swift_Message('SucaSports : Confirmación de registro', $mailBody, 'text/html');
      // Send
      $mailer->send($message, $this->usuario->getEmail(), $from);
      $mailer->disconnect();
    }
    catch (Exception $e)
    {
      $mailer->disconnect();
      $this->getRequest()->setError('edit', 'Error al enviar el correo de confirmación, disculpe las molestias.');
      return $this->forward('usuario', 'edit');
    }
    $this->getUser()->setFlash('notice', 'Usuario creado exitosamente, verifique su correo para acivar su cuenta');
    $this->redirect('@homepage');
  }

  public function executeEdit()
  {
    $this->usuario = new Usuario();
    $this->labels = $this->getLabels();
  }


   public function executeRecuperar()
  {
    if ($this->getUser()->isAuthenticated()) {
      return $this->redirect('corredor/perfil');      
    }
  	$this->usuario = new Usuario();
    $this->labels = $this->getLabels(); 
  }


public function executeEnviarCorreoRecuperar()
  {
    if ($this->getRequestParameter('email')) {
    $email = $this->getRequestParameter('email');
    $this->usuario = new Usuario();
    $this->usuario = UsuarioPeer::retrieveByEmail($email);
    $this->usuario = UsuarioPeer::retrieveByEmail($email);
    if (isset($this->usuario)) {
        $hashString = md5(date('U'));
        $this->usuario->setVerificador($hashString);
        $this->usuario->save();
        $this->labels = $this->getLabels();

        $mail = new sfMail();
        $mail->initialize();
        $mail->setMailer('sendmail');
        $mail->setCharset('utf-8');

        $mail->setSender('webmaster@sucasports.com', 'Suca Sports Webmaster');
        $mail->setFrom('info@Sucasports.com', 'Suca Sports');
        $mail->addReplyTo('do_not_reply@sucasports.com');
        $mail->addAddress($this->usuario->getEmail());
        $mail->setSubject('Password reset confirmation');
        $mail->setBody('
        Estimado usuario'.$this->usuario->getDocumento().'

        Para poder cambiar su contraseña debe hacer click en el siguiente link

        http://sucasports/frontend_dev.php/usuario/UnblockUser?email='.$email.'?val='.$hashString);
        $mail->send();
    }
    }
}

  public function executeUnblockUser()
  {
    if (($this->getRequestParameter('email')) && ($this->getRequestParameter('val')))
    {
      $email = $this->getRequestParameter('email');
      $val = $this->getRequestParameter('val');
      $usuario = UsuarioPeer::retrieveByEmail($email);
      if ($val == $usuario->getVerificador())
      {
        $usuario->setVerificador($hashString);
        $usuario->save();
        $this->forward('usuario', 'cambiarContrasena?id='.$usuario->getIdusuario);
      }
      else
      {
        $this->forward('usuario', 'login');
      }
    }    
  }


  public function executeCambiarContrasena()
  {
    
      if ($this->getRequestParameter('id')){
       $this->usuario = UsuarioPeer::retrieveByPk($this->getRequestParameter('id'));
      }
      $this->labels = $this->getLabels(); 
     }

  public function executeActivateUser()
  {
    if (($this->getRequestParameter('email')) && ($this->getRequestParameter('val')))
    {
      $email = $this->getRequestParameter('email');
      $val = $this->getRequestParameter('val');
      $usuario = UsuarioPeer::retrieveByEmail($email);
      
      if (isset($usuario)) 
      {
	      //$usuario = UsuarioPeer::retrieveByPK($idUsuario);
	      if ($val == $usuario->getVerificador()) 
	      {
	          $usuario->setEstado('a');
	          $usuario->save();
	          $this->getUser()->setFlash('notice', 'Usuario activado correctamente, ingrese al sistema');
	          $this->forward('usuario', 'login');
	      }
	      else 
	      {
	        $this->getUser()->setFlash('error', 'El link de activacion es invalido');
          $this->forward('usuario', 'enviarActivacion');
	      }
      }
      else 
      {
        $this->getUser()->setFlash('error', 'El usuario con correo '.$email.' no existe en nuestra base de datos');
        $this->forward('usuario', 'enviarActivacion');
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'El link de activacion es invalido o ha expirado');
      $this->forward('usuario', 'enviarActivacion');
    }
  }
  public function executeEnviarActivacion() {
  	
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
