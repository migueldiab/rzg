<?php

/**
 * AsociacionCorredor form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseAsociacionCorredorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_corredor'   => new sfWidgetFormInputHidden(),
      'id_asociacion' => new sfWidgetFormInputHidden(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'updated_by'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id_corredor'   => new sfValidatorPropelChoice(array('model' => 'Corredor', 'column' => 'id', 'required' => false)),
      'id_asociacion' => new sfValidatorPropelChoice(array('model' => 'Asociacion', 'column' => 'id', 'required' => false)),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_by'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('asociacion_corredor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AsociacionCorredor';
  }


}
