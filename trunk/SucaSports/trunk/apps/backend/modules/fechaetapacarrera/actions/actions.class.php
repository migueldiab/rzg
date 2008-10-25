<?php

/**
 * fechaetapacarrera actions.
 *
 * @package    sucasports
 * @subpackage fechaetapacarrera
 * @author     Marcos
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fechaetapacarreraActions extends autofechaetapacarreraActions
{
public function executeDisplayCarreraEtapaFechas()
{
     if ($this->getRequest()->hasParameter('id_carrera'))
    {
      $fecha_etapa_carrera = FechaEtapaCarreraPeer:: retrieveByCarreraEtapa($this->getRequestParameter($carrera_id),$this->getRequestParameter($carrera_id));
    }
//$this->fecha_etapa_carrera = $this->getFechaEtapaCarrerabyCarreraEtapa();
 //return $this->forward('fechaetapacarrera', 'list?filters[id_carrera]=$id_carrera&filters[id_etapa_carrera]=$id_etapa&filter=filter');
}


protected function getFechaEtapaCarrerabyCarreraEtapa($id_carrera = 'id_carrera', $id_etapa = '$id_etapa')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
        $c = new Criteria();
        $c->add(FechaEtapaCarreraPeer::ID_CARRERA, '0');
        $carrera = FechaEtapaCarreraPeer::doSelect($c);

      echo "no hay etapas para la carrera";
    }
    else
    {
      $fecha_etapa_carrera = FechaEtapaCarreraPeer:: retrieveByCarreraEtapa($this->getRequestParameter($carrera_id),$this->getRequestParameter($carrera_id));

      $this->forward404Unless($fecha_etapa_carrera);
    }
    return $fecha_etapa_carrera;
  }


  public function executeIndex()
  {
    return $this->forward('fechaetapacarrera', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fecha_etapa_carrera/filters');

    // pager
    $this->pager = new sfPropelPager('FechaEtapaCarrera', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/fecha_etapa_carrera')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/fecha_etapa_carrera');
    }
  }

  public function executeCreate()
  {
    return $this->forward('fechaetapacarrera', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('fechaetapacarrera', 'edit');
  }


  public function executeDeleteSelected()
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (FechaEtapaCarreraPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Fecha etapa carreras. Make sure they do not have any associated items.');
      return $this->forward('fechaetapacarrera', 'list');
    }

    return $this->redirect('fechaetapacarrera/list');
  }

  public function executeEdit()
  {
    $this->fecha_etapa_carrera = $this->getFechaEtapaCarreraOrCreate();

    if ($this->getRequest()->isMethod('post'))
    {
      $this->updateFechaEtapaCarreraFromRequest();

      try
      {
        $this->saveFechaEtapaCarrera($this->fecha_etapa_carrera);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Fecha etapa carreras.');
        return $this->forward('fechaetapacarrera', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fechaetapacarrera/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fechaetapacarrera/list');
      }
      else
      {
        return $this->redirect('fechaetapacarrera/edit?id='.$this->fecha_etapa_carrera->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->fecha_etapa_carrera = FechaEtapaCarreraPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->fecha_etapa_carrera);

    try
    {
      $this->deleteFechaEtapaCarrera($this->fecha_etapa_carrera);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Fecha etapa carrera. Make sure it does not have any associated items.');
      return $this->forward('fechaetapacarrera', 'list');
    }

    return $this->redirect('fechaetapacarrera/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fecha_etapa_carrera = $this->getFechaEtapaCarreraOrCreate();
    $this->updateFechaEtapaCarreraFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveFechaEtapaCarrera($fecha_etapa_carrera)
  {
    $fecha_etapa_carrera->save();

  }

  protected function deleteFechaEtapaCarrera($fecha_etapa_carrera)
  {
    $fecha_etapa_carrera->delete();
  }

  protected function updateFechaEtapaCarreraFromRequest()
  {
    $fecha_etapa_carrera = $this->getRequestParameter('fecha_etapa_carrera');

    if (isset($fecha_etapa_carrera['max_corredores']))
    {
      $this->fecha_etapa_carrera->setMaxCorredores($fecha_etapa_carrera['max_corredores']);
    }
    if (isset($fecha_etapa_carrera['fecha_inicio']))
    {
      if ($fecha_etapa_carrera['fecha_inicio'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fecha_etapa_carrera['fecha_inicio']))
          {
            $value = $dateFormat->format($fecha_etapa_carrera['fecha_inicio'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fecha_etapa_carrera['fecha_inicio'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fecha_etapa_carrera->setFechaInicio($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fecha_etapa_carrera->setFechaInicio(null);
      }
    }
    if (isset($fecha_etapa_carrera['fecha_fin']))
    {
      if ($fecha_etapa_carrera['fecha_fin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fecha_etapa_carrera['fecha_fin']))
          {
            $value = $dateFormat->format($fecha_etapa_carrera['fecha_fin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fecha_etapa_carrera['fecha_fin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fecha_etapa_carrera->setFechaFin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fecha_etapa_carrera->setFechaFin(null);
      }
    }
    if (isset($fecha_etapa_carrera['costo']))
    {
      $this->fecha_etapa_carrera->setCosto($fecha_etapa_carrera['costo']);
    }
    if (isset($fecha_etapa_carrera['created_at']))
    {
      if ($fecha_etapa_carrera['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fecha_etapa_carrera['created_at']))
          {
            $value = $dateFormat->format($fecha_etapa_carrera['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fecha_etapa_carrera['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fecha_etapa_carrera->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fecha_etapa_carrera->setCreatedAt(null);
      }
    }
    if (isset($fecha_etapa_carrera['created_by']))
    {
      $this->fecha_etapa_carrera->setCreatedBy($fecha_etapa_carrera['created_by']);
    }
    if (isset($fecha_etapa_carrera['updated_at']))
    {
      if ($fecha_etapa_carrera['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fecha_etapa_carrera['updated_at']))
          {
            $value = $dateFormat->format($fecha_etapa_carrera['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $fecha_etapa_carrera['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fecha_etapa_carrera->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fecha_etapa_carrera->setUpdatedAt(null);
      }
    }
    if (isset($fecha_etapa_carrera['updated_by']))
    {
      $this->fecha_etapa_carrera->setUpdatedBy($fecha_etapa_carrera['updated_by']);
    }
    if (isset($fecha_etapa_carrera['id_etapa_carrera']))
    {
      $this->fecha_etapa_carrera->setIdEtapaCarrera($fecha_etapa_carrera['id_etapa_carrera']);
    }
    if (isset($fecha_etapa_carrera['id_carrera']))
    {
      $this->fecha_etapa_carrera->setIdCarrera($fecha_etapa_carrera['id_carrera']);
    }
  }

  protected function getFechaEtapaCarreraOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $fecha_etapa_carrera = new FechaEtapaCarrera();
    }
    else
    {
      $fecha_etapa_carrera = FechaEtapaCarreraPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($fecha_etapa_carrera);
    }

    return $fecha_etapa_carrera;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/fecha_etapa_carrera');
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/fecha_etapa_carrera/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/fecha_etapa_carrera/filters');
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/fecha_etapa_carrera/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/fecha_etapa_carrera/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/fecha_etapa_carrera/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['id_carrera_is_empty']))
    {
      $criterion = $c->getNewCriterion(FechaEtapaCarreraPeer::ID_CARRERA, '');
      $criterion->addOr($c->getNewCriterion(FechaEtapaCarreraPeer::ID_CARRERA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['id_carrera']) && $this->filters['id_carrera'] !== '')
    {
      $c->add(FechaEtapaCarreraPeer::ID_CARRERA, $this->filters['id_carrera']);
    }
    if (isset($this->filters['id_etapa_carrera_is_empty']))
    {
      $criterion = $c->getNewCriterion(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, '');
      $criterion->addOr($c->getNewCriterion(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['id_etapa_carrera']) && $this->filters['id_etapa_carrera'] !== '')
    {
      $c->add(FechaEtapaCarreraPeer::ID_ETAPA_CARRERA, $this->filters['id_etapa_carrera']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/fecha_etapa_carrera/sort'))
    {
      $sort_column = sfInflector::camelize(strtolower($sort_column));
      $sort_column = FechaEtapaCarreraPeer::translateFieldName($sort_column, BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/fecha_etapa_carrera/sort') == 'asc')
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
      'fecha_etapa_carrera{id}' => 'Id:',
      'fecha_etapa_carrera{max_corredores}' => 'Max corredores:',
      'fecha_etapa_carrera{fecha_inicio}' => 'Fecha inicio:',
      'fecha_etapa_carrera{fecha_fin}' => 'Fecha fin:',
      'fecha_etapa_carrera{costo}' => 'Costo:',
      'fecha_etapa_carrera{created_at}' => 'Created at:',
      'fecha_etapa_carrera{created_by}' => 'Created by:',
      'fecha_etapa_carrera{updated_at}' => 'Updated at:',
      'fecha_etapa_carrera{updated_by}' => 'Updated by:',
      'fecha_etapa_carrera{id_etapa_carrera}' => 'Id etapa carrera:',
      'fecha_etapa_carrera{id_carrera}' => 'Id carrera:',
    );
  }
}

