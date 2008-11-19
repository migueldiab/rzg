<?php

/**
 * CorredorEquipamiento form base class.
 *
 * @package    form
 * @subpackage corredor_equipamiento
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseCorredorEquipamientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_corredor'     => new sfWidgetFormInputHidden(),
      'id_equipamiento' => new sfWidgetFormInputHidden(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'updated_by'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id_corredor'     => new sfValidatorPropelChoice(array('model' => 'Corredor', 'column' => 'id', 'required' => false)),
      'id_equipamiento' => new sfValidatorPropelChoice(array('model' => 'Equipamiento', 'column' => 'id', 'required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_by'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('corredor_equipamiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CorredorEquipamiento';
  }


}
