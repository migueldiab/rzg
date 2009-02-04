<?php

/**
 * Usuario form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'documento'         => new sfWidgetFormInput(),
      'email'             => new sfWidgetFormInput(),
      'password'          => new sfWidgetFormInput(),
      'id_grupo'          => new sfWidgetFormPropelChoice(array('model' => 'Grupo', 'add_empty' => true)),
      'id_corredor'       => new sfWidgetFormPropelChoice(array('model' => 'Corredor', 'add_empty' => true)),
      'pregunta_secreta'  => new sfWidgetFormInput(),
      'respuesta_secreta' => new sfWidgetFormInput(),
      'estado'            => new sfWidgetFormInput(),
      'verificador'       => new sfWidgetFormInput(),
      'created_at'        => new sfWidgetFormDateTime(),
      'created_by'        => new sfWidgetFormInput(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'updated_by'        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'documento'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'password'          => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_grupo'          => new sfValidatorPropelChoice(array('model' => 'Grupo', 'column' => 'id', 'required' => false)),
      'id_corredor'       => new sfValidatorPropelChoice(array('model' => 'Corredor', 'column' => 'id', 'required' => false)),
      'pregunta_secreta'  => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'respuesta_secreta' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'estado'            => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'verificador'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'created_by'        => new sfValidatorInteger(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_by'        => new sfValidatorInteger(array('required' => false)),
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
