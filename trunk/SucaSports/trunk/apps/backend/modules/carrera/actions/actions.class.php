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
public function executeIndex()
  {
    return $this->forward('carrera', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Carrera', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/carrera')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/carrera');
    }
  }

  public function executeCreate()
  {
    return $this->forward('carrera', 'edit');
  }

  public function executeSave()
  {
    //return $this->forward('carrera', 'edit');
        if ($this->getRequest()->isMethod('post'))
    {
     $data = $this->getRequestParameter('data');
     
     $NombreCarrera = CarreraPeer::retrieveByPk($data['nombre']);     
     $NombreCarrera = new Carrera();
     $NombreCarrera -> setNombre($data['nombre']);
     $NombreCarrera -> save();
     
     $data = $this->getRequestParameter('data');
     
     $NombreCarrera = CarreraPeer::retrieveByPk($data['url']);     
     $NombreCarrera = new Carrera();
     $NombreCarrera -> setUrl($data['url']);
     $NombreCarrera -> save();
     
     $data = $this->getRequestParameter('data');
     
     $NombreCarrera = CarreraPeer::retrieveByPk($data['descripcion']);     
     $NombreCarrera = new Carrera();
     $NombreCarrera -> setDescripcion($data['descripcion']);
     $NombreCarrera -> save();

    }
  }


  public function executeDeleteSelected()
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (CarreraPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Carreras. Make sure they do not have any associated items.');
      return $this->forward('carrera', 'list');
    }

    return $this->redirect('carrera/list');
  }

  public function executeEdit()
  {
    $this->carrera = $this->getCarreraOrCreate();
	
	$this->categoria = new Categoria();
    
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

  public function executeDelete()
  {
    $this->carrera = CarreraPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->carrera);

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

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->carrera = $this->getCarreraOrCreate();
    $this->updateCarreraFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveCarrera($carrera)
  {
    $carrera->save();
  }

  protected function deleteCarrera($carrera)
  {
    $carrera->delete();
  }

  protected function updateCarreraFromRequest()
  {
    $carrera = $this->getRequestParameter('carrera');
    if (isset($carrera['nombre']))
    {
      $this->carrera->setNombre($carrera['nombre']);
    }
    if (isset($carrera['url']))
    {
      $this->carrera->setUrl($carrera['url']);
    }
    if (isset($carrera['descripcion']))
    {
      $this->carrera->setDescripcion($carrera['descripcion']);
    }
    if (isset($carrera['created_at']))
    {
      if ($carrera['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($carrera['created_at']))
          {
            $value = $dateFormat->format($carrera['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $carrera['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->carrera->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->carrera->setCreatedAt(null);
      }
    }
    if (isset($carrera['created_by']))
    {
      $this->carrera->setCreatedBy($carrera['created_by']);
    }
    if (isset($carrera['updated_at']))
    {
      if ($carrera['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($carrera['updated_at']))
          {
            $value = $dateFormat->format($carrera['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $carrera['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->carrera->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->carrera->setUpdatedAt(null);
      }
    }
    if (isset($carrera['updated_by']))
    {
      $this->carrera->setUpdatedBy($carrera['updated_by']);
    }
  }

  protected function getCarreraOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $carrera = new Carrera();
    }
    else
    {
      $carrera = CarreraPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($carrera);
    }

    return $carrera;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/carrera/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/carrera/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/carrera/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/carrera/sort'))
    {
      $sort_column = sfInflector::camelize(strtolower($sort_column));
      $sort_column = CarreraPeer::translateFieldName($sort_column, BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/carrera/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'carrera{id}' => 'Id:',
      'carrera{categoria}' =>'Categoria:',
      'carrera{nombre}' => 'Nombre:',
      'carrera{url}' => 'Url:',
      'carrera{fecha}' =>'Fecha',
      'carrera{descripcion}' => 'Descripcion:',
      'carrera{categoria_carrera}' => 'Categoria carrera:',
      'carrera{created_at}' => 'Created at:',
      'carrera{created_by}' => 'Created by:',
      'carrera{updated_at}' => 'Updated at:',
      'carrera{updated_by}' => 'Updated by:',
    );
  }
}
