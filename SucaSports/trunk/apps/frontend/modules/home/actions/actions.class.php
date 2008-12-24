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

     $tipo_documento = TipoDocumentoPeer::retrieveByPk($datos['primer']);

     $tipo_documento = new TipoDocumento();
     $tipo_documento->setNombre($datos['segundo']);
     $tipo_documento->save();

    }
    
    $this->pager = new sfPropelPager('Post', 4);
    $c = new Criteria();
    $c->addDescendingOrderByColumn('created_at');
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/post')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/post');
    }
    
  }
  public function executeQuienes()
  {
    $c = new Criteria();
    $c->add(PortalPeer::NOMBREPAGINA,'QUIENES');
    $this->portal = PortalPeer::doSelectOne($c);
    if (!$this->portal) {
      $portal = new Portal();
      $portal->setNombrepagina('QUIENES');
      $portal->save();

      $c = new Criteria();
      $c->add(PortalPeer::NOMBREPAGINA,'QUIENES');
      $this->portal = PortalPeer::doSelectOne($c);
      $this->forward404Unless($this->portal);
    }

    if ($this->getRequest()->isMethod('post'))
    {
      
    }
  }
  public function executeCalendario()
  {
    $c = new Criteria();
    $c->add(PortalPeer::NOMBREPAGINA,'CALENDARIO');
    $this->portal = PortalPeer::doSelectOne($c);
    if (!$this->portal) {
      $portal = new Portal();
      $portal->setNombrepagina('CALENDARIO');
      $portal->save();

      $c = new Criteria();
      $c->add(PortalPeer::NOMBREPAGINA,'CALENDARIO');
      $this->portal = PortalPeer::doSelectOne($c);
      $this->forward404Unless($this->portal);
    }

    if ($this->getRequest()->isMethod('post'))
    {
      
    }
  }
  public function executeEntrevistas()
  {
  $c = new Criteria();
    $c->add(PortalPeer::NOMBREPAGINA,'ENTREVISTAS');
    $this->portal = PortalPeer::doSelectOne($c);
    if (!$this->portal) {
      $portal = new Portal();
      $portal->setNombrepagina('ENTREVISTAS');
      $portal->save();

      $c = new Criteria();
      $c->add(PortalPeer::NOMBREPAGINA,'ENTREVISTAS');
      $this->portal = PortalPeer::doSelectOne($c);
      $this->forward404Unless($this->portal);
    }

    if ($this->getRequest()->isMethod('post'))
    {
      
    }
  }
  public function executeTeam()
  {
  $c = new Criteria();
    $c->add(PortalPeer::NOMBREPAGINA,'TEAM');
    $this->portal = PortalPeer::doSelectOne($c);
    if (!$this->portal) {
      $portal = new Portal();
      $portal->setNombrepagina('TEAM');
      $portal->save();

      $c = new Criteria();
      $c->add(PortalPeer::NOMBREPAGINA,'TEAM');
      $this->portal = PortalPeer::doSelectOne($c);
      $this->forward404Unless($this->portal);
    }

    if ($this->getRequest()->isMethod('post'))
    {
      
    }
  }
  public function executeLinks()
  {
  $c = new Criteria();
    $c->add(PortalPeer::NOMBREPAGINA,'LINKS');
    $this->portal = PortalPeer::doSelectOne($c);
    if (!$this->portal) {
      $portal = new Portal();
      $portal->setNombrepagina('LINKS');
      $portal->save();

      $c = new Criteria();
      $c->add(PortalPeer::NOMBREPAGINA,'LINKS');
      $this->portal = PortalPeer::doSelectOne($c);
      $this->forward404Unless($this->portal);
    }

    if ($this->getRequest()->isMethod('post'))
    {
      
    }
  }
  
}
