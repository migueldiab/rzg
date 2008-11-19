<?php

/**
 * Resultado form base class.
 *
 * @package    form
 * @subpackage resultado
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseResultadoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_corredor'  => new sfWidgetFormInputHidden(),
      'fecha_inicio' => new sfWidgetFormInputHidden(),
      'id_etapa'     => new sfWidgetFormInputHidden(),
      'id_carrera'   => new sfWidgetFormInputHidden(),
      'tiempo'       => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'updated_by'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id_corredor'  => new sfValidatorPropelChoice(array('model' => 'Corredor', 'column' => 'id', 'required' => false)),
      'fecha_inicio' => new sfValidatorPropelChoice(array('model' => 'Resultado', 'column' => 'fecha_inicio', 'required' => false)),
      'id_etapa'     => new sfValidatorPropelChoice(array('model' => 'Resultado', 'column' => 'id_etapa', 'required' => false)),
      'id_carrera'   => new sfValidatorPropelChoice(array('model' => 'Resultado', 'column' => 'id_carrera', 'required' => false)),
      'tiempo'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_by'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('resultado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Resultado';
  }


}
