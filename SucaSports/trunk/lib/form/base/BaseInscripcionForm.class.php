<?php

/**
 * Inscripcion form base class.
 *
 * @package    form
 * @subpackage inscripcion
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseInscripcionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_corredor'       => new sfWidgetFormInputHidden(),
      'fecha_inicio'      => new sfWidgetFormInputHidden(),
      'id_etapa'          => new sfWidgetFormInputHidden(),
      'id_carrera'        => new sfWidgetFormInputHidden(),
      'created_at'        => new sfWidgetFormDateTime(),
      'created_by'        => new sfWidgetFormInput(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'updated_by'        => new sfWidgetFormInput(),
      'fecha_inscripcion' => new sfWidgetFormDate(),
      'firma_digital'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id_corredor'       => new sfValidatorPropelChoice(array('model' => 'Corredor', 'column' => 'id', 'required' => false)),
      'fecha_inicio'      => new sfValidatorPropelChoice(array('model' => 'Inscripcion', 'column' => 'fecha_inicio', 'required' => false)),
      'id_etapa'          => new sfValidatorPropelChoice(array('model' => 'Inscripcion', 'column' => 'id_etapa', 'required' => false)),
      'id_carrera'        => new sfValidatorPropelChoice(array('model' => 'Inscripcion', 'column' => 'id_carrera', 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'created_by'        => new sfValidatorInteger(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_by'        => new sfValidatorInteger(array('required' => false)),
      'fecha_inscripcion' => new sfValidatorDate(array('required' => false)),
      'firma_digital'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('inscripcion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inscripcion';
  }


}
