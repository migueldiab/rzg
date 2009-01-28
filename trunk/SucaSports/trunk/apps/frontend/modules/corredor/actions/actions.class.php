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
    if (!$usuario->getCorredor()) {
      $corredor = $this->getRequestParameter('corredor');
      if (!isset($corredor['id_tipo_documento']) ||
          !isset($corredor['nombre']) ||
          !isset($corredor['apellido']) ||
          !isset($corredor['sexo']) ||
          !isset($corredor['fecha_nacimiento']))
      {
        $this->getUser()->setFlash('notice', 'Necesitamos todos los datos personales para poder crear su perfil.');
        $this->forward('corredor','datosPersonales');
      }
      else
      {
        $this->corredor = new Corredor();
        $this->corredor->setDocumento($usuario->getDocumento());
      }
    }
    $this->updateCorredorFromRequest();
    $this->saveCorredor($this->corredor);
    $this->getUser()->setFlash('notice', 'Tus datos se guardaron correctamente.');
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
    $usuario = $this->getUser()->getAttribute('usuario', '', 'sesion');
    if ($usuario->getCorredor()) {
      $this->corredor = $usuario->getCorredor();
    }
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
    if ($this->getRequestParameter('corredor')) {
      $form_corredor = $this->getRequestParameter('corredor');
      $corredor->setIdTipoDocumento($form_corredor['id_tipo_documento']);
      $corredor->setNombre($form_corredor['nombre']);
      $corredor->setApellido($form_corredor['apellido']);
      $corredor->setSexo($form_corredor['sexo']);
      $corredor->setFechaNacimiento($form_corredor['fecha_nacimiento']);
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
  protected function updateCorredorFromRequest()
  {
    $corredor = $this->getRequestParameter('corredor');

    if (isset($corredor['id_tipo_documento']))
    {
    $this->corredor->setIdTipoDocumento($corredor['id_tipo_documento'] ? $corredor['id_tipo_documento'] : null);
    }
    if (isset($corredor['documento']))
    {
      $this->corredor->setDocumento($corredor['documento']);
    }
    if (isset($corredor['nombre']))
    {
      $this->corredor->setNombre($corredor['nombre']);
    }
    if (isset($corredor['apellido']))
    {
      $this->corredor->setApellido($corredor['apellido']);
    }
    if (isset($corredor['sexo']))
    {
      $this->corredor->setSexo($corredor['sexo']);
    }
    if (isset($corredor['fecha_nacimiento']))
    {
      if ($corredor['fecha_nacimiento'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($corredor['fecha_nacimiento']))
          {
            $value = $dateFormat->format($corredor['fecha_nacimiento'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $corredor['fecha_nacimiento'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->corredor->setFechaNacimiento($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->corredor->setFechaNacimiento(null);
      }
    }
    if (isset($corredor['telefono']))
    {
      $this->corredor->setTelefono($corredor['telefono']);
    }
    if (isset($corredor['movil']))
    {
      $this->corredor->setMovil($corredor['movil']);
    }
    if (isset($corredor['telefono_emergencia']))
    {
      $this->corredor->setTelefonoEmergencia($corredor['telefono_emergencia']);
    }
    if (isset($corredor['direccion']))
    {
      $this->corredor->setDireccion($corredor['direccion']);
    }
    if (isset($corredor['id_pais']))
    {
    $this->corredor->setIdPais($corredor['id_pais'] ? $corredor['id_pais'] : null);
    }
    if (isset($corredor['id_localidad']))
    {
    $this->corredor->setIdLocalidad($corredor['id_localidad'] ? $corredor['id_localidad'] : null);
    }
    if (isset($corredor['id_sociedad_medica']))
    {
    $this->corredor->setIdSociedadMedica($corredor['id_sociedad_medica'] ? $corredor['id_sociedad_medica'] : null);
    }
    if (isset($corredor['historia_medica']))
    {
      $this->corredor->setHistoriaMedica($corredor['historia_medica']);
    }
    if (isset($corredor['id_chips']))
    {
    $this->corredor->setIdChips($corredor['id_chips'] ? $corredor['id_chips'] : null);
    }
    if (isset($corredor['pareja']))
    {
      $this->corredor->setPareja($corredor['pareja']);
    }
    if (isset($corredor['hijos']))
    {
      $this->corredor->setHijos($corredor['hijos']);
    }
  }
  
}