<?php

/**
 * Permiso form base class.
 *
 * @package    form
 * @subpackage permiso
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BasePermisoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'permiso'    => new sfWidgetFormInputHidden(),
      'grupos_id'  => new sfWidgetFormInputHidden(),
      'updated_at' => new sfWidgetFormDateTime(),
      'updated_by' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'permiso'    => new sfValidatorPropelChoice(array('model' => 'Permiso', 'column' => 'permiso', 'required' => false)),
      'grupos_id'  => new sfValidatorPropelChoice(array('model' => 'Grupo', 'column' => 'id', 'required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_by' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('permiso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Permiso';
  }


}
