<?php

/**
 * autoAlquileres actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoAlquileres
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 9926 2008-06-27 12:25:54Z noel $
 */
class autoAlquileresActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('alquileres', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Alquileres', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/alquileres')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/alquileres');
    }
  }

  public function executeCreate()
  {
    return $this->forward('alquileres', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('alquileres', 'edit');
  }


  public function executeDeleteSelected()
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (AlquileresPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Alquileress. Make sure they do not have any associated items.');
      return $this->forward('alquileres', 'list');
    }

    return $this->redirect('alquileres/list');
  }

  public function executeEdit()
  {
    $this->alquileres = $this->getAlquileresOrCreate();

    if ($this->getRequest()->isMethod('post'))
    {
      $this->updateAlquileresFromRequest();

      try
      {
        $this->saveAlquileres($this->alquileres);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Alquileress.');
        return $this->forward('alquileres', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('alquileres/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('alquileres/list');
      }
      else
      {
        return $this->redirect('alquileres/edit?id='.$this->alquileres->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->alquileres = AlquileresPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->alquileres);

    try
    {
      $this->deleteAlquileres($this->alquileres);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Alquileres. Make sure it does not have any associated items.');
      return $this->forward('alquileres', 'list');
    }

    return $this->redirect('alquileres/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->alquileres = $this->getAlquileresOrCreate();
    $this->updateAlquileresFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveAlquileres($alquileres)
  {
    $alquileres->save();

  }

  protected function deleteAlquileres($alquileres)
  {
    $alquileres->delete();
  }

  protected function updateAlquileresFromRequest()
  {
    $alquileres = $this->getRequestParameter('alquileres');

    if (isset($alquileres['id_equipamiento']))
    {
    $this->alquileres->setIdEquipamiento($alquileres['id_equipamiento'] ? $alquileres['id_equipamiento'] : null);
    }
    if (isset($alquileres['id_fecha_carrera']))
    {
    $this->alquileres->setIdFechaCarrera($alquileres['id_fecha_carrera'] ? $alquileres['id_fecha_carrera'] : null);
    }
  }

  protected function getAlquileresOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $alquileres = new Alquileres();
    }
    else
    {
      $alquileres = AlquileresPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($alquileres);
    }

    return $alquileres;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/alquileres/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/alquileres/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/alquileres/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/alquileres/sort'))
    {
      $sort_column = sfInflector::camelize(strtolower($sort_column));
      $sort_column = AlquileresPeer::translateFieldName($sort_column, BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/alquileres/sort') == 'asc')
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
      'alquileres{id}' => 'Id:',
      'alquileres{id_equipamiento}' => 'Id equipamiento:',
      'alquileres{id_fecha_carrera}' => 'Id fecha carrera:',
    );
  }
}
