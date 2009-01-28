<?php

/**
 * post actions.
 *
 * @package    sucasports
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class postActions extends autopostActions
{
  public function executeEditar()
  {
    $this->post = $this->getPostOrCreate();
    
    if ($this->getRequest()->isMethod('post'))
    {
      $this->updatePostFromRequest();
      try
      {
        $this->savePost($this->post);
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('edit', 'Could not save the edited Posts.');
        return $this->forward('post', 'list');
      }
      $this->getUser()->setFlash('notice', 'Your modifications have been saved');
      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('post/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('post/list');
      }
      else
      {
        return $this->redirect('post/edit?id='.$this->post->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  public function executeEdit()
  {
    return $this->redirect('post/editar');
  }  
  protected function updatePostFromRequest()
  {
    $post = $this->getRequestParameter('post');
    if (isset($post['texto']))
    {
      $this->post->setTexto($post['texto']);
    }
    if (isset($post['fecha_etapa_carrera']))
    {
      $datos = split('/', $post['fecha_etapa_carrera']);
      $fecha_etapa = $datos[0];
      $etapa = $datos[1];
      $carrera = $datos[2];
      try
      {
        $dateFormat = new sfDateFormat($this->getUser()->getCulture());
        if (!is_array($fecha_etapa))
        {
          $value = $dateFormat->format($fecha_etapa, 'i', $dateFormat->getInputPattern('d'));
        }
        else
        {
          $value_array = $fecha_etapa;
          $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
        }
        $this->post->setFechaEtapaCarreraFechaInicio($value);
      }
      catch (sfException $e)
      {
        // not a date
      }
      $this->post->setFechaEtapaCarreraIdEtapa($etapa);
      $this->post->setFechaEtapaCarreraIdCarrera($carrera);
    }
  }
}
