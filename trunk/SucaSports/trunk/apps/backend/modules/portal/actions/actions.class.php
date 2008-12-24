<?php

/**
 * portal actions.
 *
 * @package    sucasports
 * @subpackage portal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class portalActions extends autoportalActions
{
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
      $this->updatePortalFromRequest();
      try
      {
        $this->savePortal($this->portal);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Portals.');
        return $this->forward('portal', 'list');
      }
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');
    }
    else
    {
      $this->labels = $this->getLabels();
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
      $this->updatePortalFromRequest();
      try
      {
        $this->savePortal($this->portal);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Portals.');
        return $this->forward('portal', 'list');
      }
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');
    }
    else
    {
      $this->labels = $this->getLabels();
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
      $this->updatePortalFromRequest();
      try
      {
        $this->savePortal($this->portal);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Portals.');
        return $this->forward('portal', 'list');
      }
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');
    }
    else
    {
      $this->labels = $this->getLabels();
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
      $this->updatePortalFromRequest();
      try
      {
        $this->savePortal($this->portal);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Portals.');
        return $this->forward('portal', 'list');
      }
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');
    }
    else
    {
      $this->labels = $this->getLabels();
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
      $this->updatePortalFromRequest();
      try
      {
        $this->savePortal($this->portal);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Portals.');
        return $this->forward('portal', 'list');
      }
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }    
}
