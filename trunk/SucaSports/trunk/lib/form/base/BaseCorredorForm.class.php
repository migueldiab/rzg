<?php

/**
 * Corredor form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseCorredorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'documento'                  => new sfWidgetFormInput(),
      'id_tipo_documento'          => new sfWidgetFormPropelChoice(array('model' => 'TipoDocumento', 'add_empty' => true)),
      'nombre'                     => new sfWidgetFormInput(),
      'apellido'                   => new sfWidgetFormInput(),
      'telefono'                   => new sfWidgetFormInput(),
      'movil'                      => new sfWidgetFormInput(),
      'telefono_emergencia'        => new sfWidgetFormInput(),
      'direccion'                  => new sfWidgetFormInput(),
      'fecha_nacimiento'           => new sfWidgetFormDate(),
      'pareja'                     => new sfWidgetFormInput(),
      'hijos'                      => new sfWidgetFormInput(),
      'id_sociedad_medica'         => new sfWidgetFormPropelChoice(array('model' => 'SociedadMedica', 'add_empty' => true)),
      'historia_medica'            => new sfWidgetFormTextarea(),
      'sexo'                       => new sfWidgetFormInput(),
      'id_localidad'               => new sfWidgetFormPropelChoice(array('model' => 'Localidad', 'add_empty' => true)),
      'id_pais'                    => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'id_chips'                   => new sfWidgetFormPropelChoice(array('model' => 'Chip', 'add_empty' => true)),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'updated_by'                 => new sfWidgetFormInput(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'created_by'                 => new sfWidgetFormInput(),
      'asociacion_corredor_list'   => new sfWidgetFormPropelChoiceMany(array('model' => 'Asociacion')),
      'corredor_equipamiento_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Equipamiento')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'Corredor', 'column' => 'id', 'required' => false)),
      'documento'                  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_tipo_documento'          => new sfValidatorPropelChoice(array('model' => 'TipoDocumento', 'column' => 'id', 'required' => false)),
      'nombre'                     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'apellido'                   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'telefono'                   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'movil'                      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'telefono_emergencia'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'direccion'                  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'fecha_nacimiento'           => new sfValidatorDate(array('required' => false)),
      'pareja'                     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'hijos'                      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_sociedad_medica'         => new sfValidatorPropelChoice(array('model' => 'SociedadMedica', 'column' => 'id', 'required' => false)),
      'historia_medica'            => new sfValidatorString(array('required' => false)),
      'sexo'                       => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'id_localidad'               => new sfValidatorPropelChoice(array('model' => 'Localidad', 'column' => 'id', 'required' => false)),
      'id_pais'                    => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'id_chips'                   => new sfValidatorPropelChoice(array('model' => 'Chip', 'column' => 'id', 'required' => false)),
      'updated_at'                 => new sfValidatorDateTime(array('required' => false)),
      'updated_by'                 => new sfValidatorInteger(array('required' => false)),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
      'created_by'                 => new sfValidatorInteger(array('required' => false)),
      'asociacion_corredor_list'   => new sfValidatorPropelChoiceMany(array('model' => 'Asociacion', 'required' => false)),
      'corredor_equipamiento_list' => new sfValidatorPropelChoiceMany(array('model' => 'Equipamiento', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('corredor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Corredor';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['asociacion_corredor_list']))
    {
      $values = array();
      foreach ($this->object->getAsociacionCorredors() as $obj)
      {
        $values[] = $obj->getIdAsociacion();
      }

      $this->setDefault('asociacion_corredor_list', $values);
    }

    if (isset($this->widgetSchema['corredor_equipamiento_list']))
    {
      $values = array();
      foreach ($this->object->getCorredorEquipamientos() as $obj)
      {
        $values[] = $obj->getIdEquipamiento();
      }

      $this->setDefault('corredor_equipamiento_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveAsociacionCorredorList($con);
    $this->saveCorredorEquipamientoList($con);
  }

  public function saveAsociacionCorredorList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['asociacion_corredor_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(AsociacionCorredorPeer::ID_CORREDOR, $this->object->getPrimaryKey());
    AsociacionCorredorPeer::doDelete($c, $con);

    $values = $this->getValue('asociacion_corredor_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new AsociacionCorredor();
        $obj->setIdCorredor($this->object->getPrimaryKey());
        $obj->setIdAsociacion($value);
        $obj->save();
      }
    }
  }

  public function saveCorredorEquipamientoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['corredor_equipamiento_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CorredorEquipamientoPeer::ID_CORREDOR, $this->object->getPrimaryKey());
    CorredorEquipamientoPeer::doDelete($c, $con);

    $values = $this->getValue('corredor_equipamiento_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CorredorEquipamiento();
        $obj->setIdCorredor($this->object->getPrimaryKey());
        $obj->setIdEquipamiento($value);
        $obj->save();
      }
    }
  }

}
