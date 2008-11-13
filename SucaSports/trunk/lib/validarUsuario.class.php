<?php
 
class validaorUsuario extends sfValidator
{    
  public function initialize($context, $parameters = null)
  {
    parent::initialize($context);
 
    $this->setParameter('login_error', 'Entrada inválida');
 
    $this->getParameterHolder()->add($parameters);
 
    return true;
  }
 
  public function execute(&$value, &$error)
  {
    $password_param = $this->getParameter('password');
    $password = $this->getContext()->getRequest()->getParameter($password_param);
 
    $login = $value;
 
    if ($login == 'anonymous')
    {
      $error = $this->getParameter('login_error');
      return false;
    }
 
    $c = new Criteria();
    $c->add(UserPeer::NOMBRE, $login);
    $user = UserPeer::doSelectOne($c);
 
    if ($user)
    {
      if (sha1($password) == $user->getPassword())
      {
          $this->getUser()->setAuthenticated(true);
          // FIXME : Agregar credenciales
          $this->getUser()->addCredential('temp');
   
          $this->getUser()->setAttribute('usuario', $usuario, 'sesion');
           
        return true;
      }
    }
 
    $error = $this->getParameter('login_error');
    return false;
  }
}
