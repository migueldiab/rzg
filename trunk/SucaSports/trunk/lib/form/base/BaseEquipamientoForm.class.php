<?php

/**
 * Equipamiento form base class.
 *
 * @package    form
 * @subpackage equipamiento
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseEquipamientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'marca'                      => new sfWidgetFormInput(),
      'id_tipo_equipamiento'       => new sfWidgetFormPropelSelect(array('model' => 'TipoEquipamiento', 'add_empty' => false)),
      'created_at'                 => new sfWidgetFormDateTime(),
      'created_by'                 => new sfWidgetFormInput(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'updated_by'                 => new sfWidgetFormInput(),
      'corredor_equipamiento_list' => new sfWidgetFormPropelSelectMany(array('model' => 'Corredor')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'Equipamiento', 'column' => 'id', 'required' => false)),
      'marca'                      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_tipo_equipamiento'       => new sfValidatorPropelChoice(array('model' => 'TipoEquipamiento', 'column' => 'id')),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
      'created_by'                 => new sfValidatorInteger(array('required' => false)),
      'updated_at'                 => new sfValidatorDateTime(array('required' => false)),
      'updated_by'                 => new sfValidatorInteger(array('required' => false)),
      'corredor_equipamiento_list' => new sfValidatorPropelChoiceMany(array('model' => 'Corredor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipamiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Equipamiento';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['corredor_equipamiento_list']))
    {
      $values = array();
      foreach ($this->object->getCorredorEquipamientos() as $obj)
      {
        $values[] = $obj->getIdCorredor();
      }

      $this->setDefault('corredor_equipamiento_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCorredorEquipamientoList($con);
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
    $c->add(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $this->object->getPrimaryKey());
    CorredorEquipamientoPeer::doDelete($c, $con);

    $values = $this->getValue('corredor_equipamiento_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CorredorEquipamiento();
        $obj->setIdEquipamiento($this->object->getPrimaryKey());
        $obj->setIdCorredor($value);
        $obj->save();
      }
    }
  }

}
