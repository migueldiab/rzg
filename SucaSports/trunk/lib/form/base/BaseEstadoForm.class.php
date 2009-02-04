<?php

/**
 * Estado form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseEstadoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInput(),
      'updated_at' => new sfWidgetFormDateTime(),
      'updated_by' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Estado', 'column' => 'id', 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_by' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estado';
  }


}
