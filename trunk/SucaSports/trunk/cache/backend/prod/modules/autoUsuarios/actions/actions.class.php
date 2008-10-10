<?php

/**
 * autoUsuarios actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoUsuarios
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 9926 2008-06-27 12:25:54Z noel $
 */
class autoUsuariosActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('usuarios', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Usuarios', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/usuarios')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/usuarios');
    }
  }

  public function executeCreate()
  {
    return $this->forward('usuarios', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('usuarios', 'edit');
  }


  public function executeDeleteSelected()
  {
    $this->selectedItems = $this->getRequestParameter('sf_admin_batch_selection', array());

    try
    {
      foreach (UsuariosPeer::retrieveByPks($this->selectedItems) as $object)
      {
        $object->delete();
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Usuarioss. Make sure they do not have any associated items.');
      return $this->forward('usuarios', 'list');
    }

    return $this->redirect('usuarios/list');
  }

  public function executeEdit()
  {
    $this->usuarios = $this->getUsuariosOrCreate();

    if ($this->getRequest()->isMethod('post'))
    {
      $this->updateUsuariosFromRequest();

      try
      {
        $this->saveUsuarios($this->usuarios);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Usuarioss.');
        return $this->forward('usuarios', 'list');
      }

      $this->getUser()->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('usuarios/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('usuarios/list');
      }
      else
      {
        return $this->redirect('usuarios/edit?id='.$this->usuarios->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->usuarios = UsuariosPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->usuarios);

    try
    {
      $this->deleteUsuarios($this->usuarios);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Usuarios. Make sure it does not have any associated items.');
      return $this->forward('usuarios', 'list');
    }

    return $this->redirect('usuarios/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->usuarios = $this->getUsuariosOrCreate();
    $this->updateUsuariosFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveUsuarios($usuarios)
  {
    $usuarios->save();

  }

  protected function deleteUsuarios($usuarios)
  {
    $usuarios->delete();
  }

  protected function updateUsuariosFromRequest()
  {
    $usuarios = $this->getRequestParameter('usuarios');

    if (isset($usuarios['nombre']))
    {
      $this->usuarios->setNombre($usuarios['nombre']);
    }
    if (isset($usuarios['id_grupos']))
    {
    $this->usuarios->setIdGrupos($usuarios['id_grupos'] ? $usuarios['id_grupos'] : null);
    }
  }

  protected function getUsuariosOrCreate($id = 'id')
  {
    if ($this->getRequestParameter($id) === ''
     || $this->getRequestParameter($id) === null)
    {
      $usuarios = new Usuarios();
    }
    else
    {
      $usuarios = UsuariosPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($usuarios);
    }

    return $usuarios;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/usuarios/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/usuarios/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/usuarios/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/usuarios/sort'))
    {
      $sort_column = sfInflector::camelize(strtolower($sort_column));
      $sort_column = UsuariosPeer::translateFieldName($sort_column, BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/usuarios/sort') == 'asc')
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
      'usuarios{id}' => 'Id:',
      'usuarios{nombre}' => 'Nombre:',
      'usuarios{id_grupos}' => 'Id grupos:',
    );
  }
}
