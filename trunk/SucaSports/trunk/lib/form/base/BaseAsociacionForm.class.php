<?php

/**
 * Asociacion form base class.
 *
 * @package    form
 * @subpackage asociacion
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseAsociacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'nombre'                   => new sfWidgetFormInput(),
      'direccion'                => new sfWidgetFormInput(),
      'telefono'                 => new sfWidgetFormInput(),
      'contacto'                 => new sfWidgetFormInput(),
      'created_by'               => new sfWidgetFormInput(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_by'               => new sfWidgetFormInput(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'asociacion_corredor_list' => new sfWidgetFormPropelSelectMany(array('model' => 'Corredor')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Asociacion', 'column' => 'id', 'required' => false)),
      'nombre'                   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'direccion'                => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'telefono'                 => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'contacto'                 => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'created_by'               => new sfValidatorInteger(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(array('required' => false)),
      'updated_by'               => new sfValidatorInteger(array('required' => false)),
      'updated_at'               => new sfValidatorDateTime(array('required' => false)),
      'asociacion_corredor_list' => new sfValidatorPropelChoiceMany(array('model' => 'Corredor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('asociacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Asociacion';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['asociacion_corredor_list']))
    {
      $values = array();
      foreach ($this->object->getAsociacionCorredors() as $obj)
      {
        $values[] = $obj->getIdCorredor();
      }

      $this->setDefault('asociacion_corredor_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveAsociacionCorredorList($con);
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
    $c->add(AsociacionCorredorPeer::ID_ASOCIACION, $this->object->getPrimaryKey());
    AsociacionCorredorPeer::doDelete($c, $con);

    $values = $this->getValue('asociacion_corredor_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new AsociacionCorredor();
        $obj->setIdAsociacion($this->object->getPrimaryKey());
        $obj->setIdCorredor($value);
        $obj->save();
      }
    }
  }

}
