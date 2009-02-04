<?php

/**
 * Configuracion form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseConfiguracionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'parametro'   => new sfWidgetFormInput(),
      'valor'       => new sfWidgetFormInput(),
      'descripcion' => new sfWidgetFormInput(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'updated_by'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Configuracion', 'column' => 'id', 'required' => false)),
      'parametro'   => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'valor'       => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_by'  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('configuracion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configuracion';
  }


}
