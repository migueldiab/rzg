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
	
  public function executeSave($request)
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
  public function executeEdit($request)
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
    public function executeDelete($request)
  {
    $this->carrera = CarreraPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->carrera);
    $c = new Criteria();
    $c->add(CategoriaCarreraPeer::ID_CARRERA, $carrera->getPrimaryKey());
    CategoriaCarreraPeer::CleanCategoriaCarrera($c);
    try
    {
      $this->deleteCarrera($this->carrera);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Carrera. Make sure it does not have any associated items.');
      return $this->forward('carrera', 'list');
    }

    return $this->redirect('carrera/list');
  }
}
