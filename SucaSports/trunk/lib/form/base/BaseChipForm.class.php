<?php

/**
 * Chip form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
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
      'id_estado'   => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
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
