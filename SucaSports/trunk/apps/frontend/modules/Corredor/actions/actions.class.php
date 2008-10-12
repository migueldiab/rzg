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
  public function executePerfil() {
    $this->corredor = $this->getCorredorOrCreate();
    if ($this->getRequest()->isMethod('post'))
    {
      $this->updateCorredorFromRequest();
      try
      {
        $this->saveCorredor($this->corredor);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Corredors.');
        return $this->forward('corredor', 'list');
      }
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');
      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('corredor/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('corredor/list');
      }
      else
      {
        return $this->redirect('corredor/edit?id='.$this->corredor->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
