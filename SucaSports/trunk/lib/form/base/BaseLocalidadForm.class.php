<?php

/**
 * Localidad form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseLocalidadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'id_pais'    => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'nombre'     => new sfWidgetFormInput(),
      'updated_by' => new sfWidgetFormInput(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Localidad', 'column' => 'id', 'required' => false)),
      'id_pais'    => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'updated_by' => new sfValidatorInteger(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('localidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Localidad';
  }


}
