<?php

/**
 * TipoEquipamiento form base class.
 *
 * @package    form
 * @subpackage tipo_equipamiento
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseTipoEquipamientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'tipo'       => new sfWidgetFormInput(),
      'updated_at' => new sfWidgetFormDateTime(),
      'updated_by' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'TipoEquipamiento', 'column' => 'id', 'required' => false)),
      'tipo'       => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_by' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_equipamiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoEquipamiento';
  }


}
