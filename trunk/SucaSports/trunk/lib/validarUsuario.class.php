<?php
 
class validarUsuario extends sfValidator
{    
  public function initialize($context, $parameters = null)
  {
    parent::initialize($context);
 
    $this->setParameter('login_error', 'Entrada inválida');
    $this->setParameter('inactive_account', 'Cuenta inactiva');

    $this->getParameterHolder()->add($parameters);
 
    return true;
  }
 
  public function execute(&$value, &$error)
  {
    $this->context->getUser()->getAttributeHolder()->removeNamespace();
    $password_param = $this->getParameter('password');
    $password = $this->getContext()->getRequest()->getParameter($password_param);
 
    $login = $value;
 
    if ($login == 'anonymous')
    {
      $error = $this->getParameter('login_error');
      return false;
    }
    $c = new Criteria();
    $c->add(UsuarioPeer::DOCUMENTO, $login);
    $usuario = UsuarioPeer::doSelectOne($c);
    if ($usuario)
    {
      if (sha1($password) == $usuario->getPassword())
      {
      	  if ($usuario->getEstado() == 'a') {
            $this->context->getUser()->setAuthenticated(true);

            //$this->context->getUser()->addCredential('root');
            $grupo = GrupoPeer::retrieveByPK($usuario->getIdGrupo());
            if (!isset($grupo)) {
              return false;
            }
            else {
              $this->context->getUser()->addCredential($grupo->getNombre());
            }

            $this->context->getUser()->setAttribute('usuario', $usuario, 'sesion');
            return true;
          }
          elseif ($usuario->getEstado() == 'i')  {
            $error = $this->getParameter('inactive_account');
            $this->context->getUser()->setAttribute('estado_usuario', 'inactivo');
            return false;
          }
      }
      else {
      	
      }
    }
 
    $error = $this->getParameter('login_error');
    return false;
  }
}
