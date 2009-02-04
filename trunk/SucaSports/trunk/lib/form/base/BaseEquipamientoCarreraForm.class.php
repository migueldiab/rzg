<?php

/**
 * EquipamientoCarrera form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseEquipamientoCarreraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipo_equipamiento' => new sfWidgetFormInputHidden(),
      'fecha_inicio'         => new sfWidgetFormInputHidden(),
      'id_etapa'             => new sfWidgetFormInputHidden(),
      'id_carrera'           => new sfWidgetFormInputHidden(),
      'created_at'           => new sfWidgetFormDateTime(),
      'created_by'           => new sfWidgetFormInput(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'updated_by'           => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id_tipo_equipamiento' => new sfValidatorPropelChoice(array('model' => 'TipoEquipamiento', 'column' => 'id', 'required' => false)),
      'fecha_inicio'         => new sfValidatorPropelChoice(array('model' => 'EquipamientoCarrera', 'column' => 'fecha_inicio', 'required' => false)),
      'id_etapa'             => new sfValidatorPropelChoice(array('model' => 'EquipamientoCarrera', 'column' => 'id_etapa', 'required' => false)),
      'id_carrera'           => new sfValidatorPropelChoice(array('model' => 'EquipamientoCarrera', 'column' => 'id_carrera', 'required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'created_by'           => new sfValidatorInteger(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_by'           => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipamiento_carrera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EquipamientoCarrera';
  }


}
