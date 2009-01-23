<?php

/**
 * Carrera actions.
 *
 * @package    sucasports
 * @subpackage Carrera
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class CarreraActions extends autoCarreraActions
{
	
  public function executeSave()
  {
      return $this->forward('carrera', 'edit');
  }
  
  public function executeEtapa()
  {
     $this->carrera = $this->getCarreraOrCreate();
     if ($this->getRequest()->isMethod('post'))
     {
      $this->updateCarreraFromRequest();
      try
      {
        $this->saveCarrera($this->carrera);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Carreras.');
        return $this->forward('carrera', 'edit');
      }
     }
     $this->redirect('etapacarrera/create?id_carrera='.$this->carrera->getId());
  }
  public function executeEdit()
  {
    $this->carrera = $this->getCarreraOrCreate();

    if ($this->getRequest()->isMethod('post'))
    {
      $this->updateCarreraFromRequest();

      try
      {
        $this->saveCarrera($this->carrera);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Carreras.');
        return $this->forward('carrera', 'list');
      }

      if ($this->getRequestParameter('agregar_etapa')) {
        return $this->forward('carrera', 'etapa');
      }
    
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('carrera/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('carrera/list');
      }
      else
      {
        return $this->redirect('carrera/edit?id='.$this->carrera->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  public function validateEdit() {
      return true;
  }
  protected function saveCarrera($carrera)
  {
      $carrera->save();

      // Update many-to-many for "categoria_carrera"
      $c = new Criteria();
      $c->add(CategoriaCarreraPeer::ID_CARRERA, $carrera->getPrimaryKey());
      CategoriaCarreraPeer::doDelete($c);

      $ids = $this->getRequestParameter('associated_categoria_carrera');
      if (is_array($ids))
      {
        foreach ($ids as $id)
        {
          $CategoriaCarrera = new CategoriaCarrera();
          $CategoriaCarrera->setIdCarrera($carrera->getPrimaryKey());
          $CategoriaCarrera->setIdCategoria($id);
          $CategoriaCarrera->save();
        }
      }
  }

  public function executeActivarInscripcion() {
    // pager
    $this->pager = new sfPropelPager('Carrera', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/post')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/post');
    }  	
  }
}
