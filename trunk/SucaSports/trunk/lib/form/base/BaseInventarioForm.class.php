<?php

/**
 * Inventario form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseInventarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'nombre'               => new sfWidgetFormInput(),
      'id_tipo_equipamiento' => new sfWidgetFormPropelChoice(array('model' => 'Equipamiento', 'add_empty' => true)),
      'updated_at'           => new sfWidgetFormDateTime(),
      'updated_by'           => new sfWidgetFormInput(),
      'id_estado'            => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Inventario', 'column' => 'id', 'required' => false)),
      'nombre'               => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'id_tipo_equipamiento' => new sfValidatorPropelChoice(array('model' => 'Equipamiento', 'column' => 'id', 'required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_by'           => new sfValidatorInteger(array('required' => false)),
      'id_estado'            => new sfValidatorPropelChoice(array('model' => 'Estado', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('inventario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inventario';
  }


}
