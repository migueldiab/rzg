<?php

/**
 * Alquiler form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseAlquilerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_inventario'       => new sfWidgetFormInputHidden(),
      'fecha_inicio'        => new sfWidgetFormInputHidden(),
      'id_etapa'            => new sfWidgetFormInputHidden(),
      'id_carrera'          => new sfWidgetFormInputHidden(),
      'id_cuenta_corriente' => new sfWidgetFormInputHidden(),
      'id_corredor'         => new sfWidgetFormInputHidden(),
      'created_at'          => new sfWidgetFormDateTime(),
      'created_by'          => new sfWidgetFormInput(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'updated_by'          => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id_inventario'       => new sfValidatorPropelChoice(array('model' => 'Inventario', 'column' => 'id', 'required' => false)),
      'fecha_inicio'        => new sfValidatorPropelChoice(array('model' => 'Alquiler', 'column' => 'fecha_inicio', 'required' => false)),
      'id_etapa'            => new sfValidatorPropelChoice(array('model' => 'Alquiler', 'column' => 'id_etapa', 'required' => false)),
      'id_carrera'          => new sfValidatorPropelChoice(array('model' => 'Alquiler', 'column' => 'id_carrera', 'required' => false)),
      'id_cuenta_corriente' => new sfValidatorPropelChoice(array('model' => 'Alquiler', 'column' => 'id_cuenta_corriente', 'required' => false)),
      'id_corredor'         => new sfValidatorPropelChoice(array('model' => 'Alquiler', 'column' => 'id_corredor', 'required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'created_by'          => new sfValidatorInteger(array('required' => false)),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
      'updated_by'          => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alquiler[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Alquiler';
  }


}
