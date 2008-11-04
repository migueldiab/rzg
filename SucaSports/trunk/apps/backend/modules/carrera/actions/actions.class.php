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
    public function executeEtapa0() {
        return $this->redirect('etapacarrera/create');
}
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

    public function executeEtapa(){
        $prueba = $this->getRequestParameter('id');
        echo $prueba;
        echo "antes del for";
        return $this->redirect('etapacarrera/edit');
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
     
     $unaCarrera = CarreraPeer::retrieveByPk($data['id']);
     if ($unaCarrera == null) {     
     	$unaCarrera = new Carrera();
     }
     $unaCarrera -> setNombre($data['nombre']);
     $unaCarrera -> setUrl($data['url']);
     $unaCarrera -> setDescripcion($data['descripcion']);
     $unaCarrera -> save();
    }
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
		// AJAX Call will fail to get Carrera Data
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
      'carrera{created_at}' => 'Created at:',
      'carrera{created_by}' => 'Created by:',
      'carrera{updated_at}' => 'Updated at:',
      'carrera{updated_by}' => 'Updated by:',
    );
  }
}
