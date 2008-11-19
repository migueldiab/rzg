<?php

/**
 * fechaetapacarrera actions.
 *
 * @package    sucasports
 * @subpackage fechaetapacarrera
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fechaetapacarreraActions extends autofechaetapacarreraActions
{
public function executeEditar()
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
        return $this->redirect('fechaetapacarrera/edit?fecha_inicio='.$this->fecha_etapa_carrera->getFechaInicio().'&id_etapa='.$this->fecha_etapa_carrera->getIdEtapa().'&id_carrera='.$this->fecha_etapa_carrera->getIdCarrera());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


   protected function updateFechaEtapaCarreraFromRequest()
  {
    echo "HOLA !";
    $this->fecha_etapa_carrera->setIdCarrera($this->getRequestParameter('id_carrera'));
    $this->fecha_etapa_carrera->setIdEtapa($this->getRequestParameter('id_etapa'));
    $this->fecha_etapa_carrera->setFechaInicio($this->getRequestParameter('fecha_inicio'));

    if (isset($fecha_etapa_carrera['max_corredores']))
    {
      $this->fecha_etapa_carrera->setMaxCorredores($fecha_etapa_carrera['max_corredores']);
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
  }
 public function executeCrearEtapa()
 {
     
 }

}
