<?php

/**
 * home actions.
 *
 * @package    sucasports
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex($request)
  {
    if ($this->getRequest()->isMethod('post'))
    {
     $datos = $this->getRequestParameter('datos');

     echo 'El Dato es : '.$datos['primer'];
     $tipo_documento = TipoDocumentoPeer::retrieveByPk($datos['primer']);
     echo 'El tipo es : '.$tipo_documento->getNombre();

     $tipo_documento = new TipoDocumento();
     $tipo_documento->setNombre($datos['segundo']);
     $tipo_documento->save();

    }
  }
}
