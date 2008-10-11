<?php

/**
 * Home actions.
 *
 * @package    sucasports
 * @subpackage Home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class HomeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex($request)
  {
    //$this->forward('default', 'module');
    $this->texto = "Primero esto : ";

    
  }
}
