<?php

/**
 * Usuario form base class.
 *
 * @package    form
 * @subpackage usuario
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInput(),
      'id_grupo'    => new sfWidgetFormPropelSelect(array('model' => 'Grupo', 'add_empty' => true)),
      'id_corredor' => new sfWidgetFormPropelSelect(array('model' => 'Corredor', 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'created_by'  => new sfWidgetFormInput(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'updated_by'  => new sfWidgetFormInput(),
      'password'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_grupo'    => new sfValidatorPropelChoice(array('model' => 'Grupo', 'column' => 'id', 'required' => false)),
      'id_corredor' => new sfValidatorPropelChoice(array('model' => 'Corredor', 'column' => 'id', 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_by'  => new sfValidatorInteger(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_by'  => new sfValidatorInteger(array('required' => false)),
      'password'    => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }


}
