<?php

/**
 * etapacarrera actions.
 *
 * @package    sucasports
 * @subpackage etapacarrera
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class etapacarreraActions extends autoetapacarreraActions
{
public function executeIndex()
  {
    return $this->forward('etapacarrera', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/etapa_carrera/filters');

    // pager
    $this->pager = new sfPropelPager('EtapaCarrera', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/etapa_carrera')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/etapa_carrera');
    }
  }

  public function executeCreate()
  {
    return $this->forward('etapacarrera', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('etapacarrera', 'edit');
  }


  public function executeDeleteSelected()
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (EtapaCarreraPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Etapa carreras. Make sure they do not have any associated items.');
      return $this->forward('etapacarrera', 'list');
    }

    return $this->redirect('etapacarrera/list');
  }

  public function executeEdit()
  {
    $this->etapa_carrera = $this->getEtapaCarreraOrCreate();

    if ($this->getRequest()->isMethod('post'))
    {
      $this->updateEtapaCarreraFromRequest();

      try
      {
        $this->saveEtapaCarrera($this->etapa_carrera);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Etapa carreras.');
        return $this->forward('etapacarrera', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('etapacarrera/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('etapacarrera/list');
      }
      else
      {
        return $this->redirect('etapacarrera/edit?id_etapa='.$this->etapa_carrera->getIdEtapa().'&id_carrera='.$this->etapa_carrera->getIdCarrera());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->etapa_carrera = EtapaCarreraPeer::retrieveByPk($this->getRequestParameter('id_etapa'),
               $this->getRequestParameter('id_carrera'));
    $this->forward404Unless($this->etapa_carrera);

    try
    {
      $this->deleteEtapaCarrera($this->etapa_carrera);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Etapa carrera. Make sure it does not have any associated items.');
      return $this->forward('etapacarrera', 'list');
    }

    return $this->redirect('etapacarrera/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->etapa_carrera = $this->getEtapaCarreraOrCreate();
    $this->updateEtapaCarreraFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveEtapaCarrera($etapa_carrera)
  {
    $etapa_carrera->save();

  }

  protected function deleteEtapaCarrera($etapa_carrera)
  {
    $etapa_carrera->delete();
  }

  protected function updateEtapaCarreraFromRequest()
  {
    $etapa_carrera = $this->getRequestParameter('etapa_carrera');

    if (isset($etapa_carrera['carrera']))
    {
      $this->etapa_carrera->setCarrera($etapa_carrera['carrera']);
    }
    if (isset($etapa_carrera['nombre']))
    {
      $this->etapa_carrera->setNombre($etapa_carrera['nombre']);
    }
    if (isset($etapa_carrera['numero_etapa']))
    {
      $this->etapa_carrera->setNumeroEtapa($etapa_carrera['numero_etapa']);
    }
  }

  protected function getEtapaCarreraOrCreate($id_etapa = 'id_etapa', $id_carrera = 'id_carrera')
  {
    if ($this->getRequestParameter($id_etapa) === ''
     || $this->getRequestParameter($id_etapa) === null
     || $this->getRequestParameter($id_carrera) === ''
     || $this->getRequestParameter($id_carrera) === null)
    {
      $etapa_carrera = new EtapaCarrera();
    }
    else
    {
      $etapa_carrera = EtapaCarreraPeer::retrieveByPk($this->getRequestParameter($id_etapa),
                    $this->getRequestParameter($id_carrera));

      $this->forward404Unless($etapa_carrera);
    }

    return $etapa_carrera;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/etapa_carrera');
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/etapa_carrera/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/etapa_carrera/filters');
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/etapa_carrera/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/etapa_carrera/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/etapa_carrera/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['id_carrera_is_empty']))
    {
      $criterion = $c->getNewCriterion(EtapaCarreraPeer::ID_CARRERA, '');
      $criterion->addOr($c->getNewCriterion(EtapaCarreraPeer::ID_CARRERA, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['id_carrera']) && $this->filters['id_carrera'] !== '')
    {
      $c->add(EtapaCarreraPeer::ID_CARRERA, $this->filters['id_carrera']);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/etapa_carrera/sort'))
    {
      $sort_column = sfInflector::camelize(strtolower($sort_column));
      $sort_column = EtapaCarreraPeer::translateFieldName($sort_column, BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/etapa_carrera/sort') == 'asc')
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
      'etapa_carrera{carrera}' => 'Carrera:',
      'etapa_carrera{nombre}' => 'Nombre:',
      'etapa_carrera{numero_etapa}' => 'Numero etapa:',
    );
  }
 }
