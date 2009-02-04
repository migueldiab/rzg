<?php

/**
 * Portal form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BasePortalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombrepagina' => new sfWidgetFormInput(),
      'texto'        => new sfWidgetFormTextarea(),
      'updated_by'   => new sfWidgetFormInput(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Portal', 'column' => 'id', 'required' => false)),
      'nombrepagina' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'texto'        => new sfValidatorString(array('required' => false)),
      'updated_by'   => new sfValidatorInteger(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('portal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Portal';
  }


}
