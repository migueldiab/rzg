<?php

/**
 * Inventario form base class.
 *
 * @package    form
 * @subpackage inventario
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseInventarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'nombre'               => new sfWidgetFormInput(),
      'id_tipo_equipamiento' => new sfWidgetFormPropelSelect(array('model' => 'Equipamiento', 'add_empty' => true)),
      'updated_at'           => new sfWidgetFormDateTime(),
      'updated_by'           => new sfWidgetFormInput(),
      'id_estado'            => new sfWidgetFormPropelSelect(array('model' => 'Estado', 'add_empty' => true)),
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
