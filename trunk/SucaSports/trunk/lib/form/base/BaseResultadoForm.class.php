<?php

/**
 * Resultado form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
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
