<?php

/**
 * Chip form base class.
 *
 * @package    form
 * @subpackage chip
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseChipForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'codigo_chip' => new sfWidgetFormInput(),
      'created_at'  => new sfWidgetFormDateTime(),
      'created_by'  => new sfWidgetFormInput(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'updated_by'  => new sfWidgetFormInput(),
      'id_estado'   => new sfWidgetFormPropelSelect(array('model' => 'Estado', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Chip', 'column' => 'id', 'required' => false)),
      'codigo_chip' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_by'  => new sfValidatorInteger(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_by'  => new sfValidatorInteger(array('required' => false)),
      'id_estado'   => new sfValidatorPropelChoice(array('model' => 'Estado', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chip[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chip';
  }


}
