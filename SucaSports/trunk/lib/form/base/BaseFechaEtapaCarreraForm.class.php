<?php

/**
 * FechaEtapaCarrera form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseFechaEtapaCarreraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha_inicio'   => new sfWidgetFormInputHidden(),
      'id_etapa'       => new sfWidgetFormInputHidden(),
      'id_carrera'     => new sfWidgetFormInputHidden(),
      'max_corredores' => new sfWidgetFormInput(),
      'fecha_fin'      => new sfWidgetFormDate(),
      'costo'          => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDateTime(),
      'created_by'     => new sfWidgetFormInput(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'updated_by'     => new sfWidgetFormInput(),
      'estado'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'fecha_inicio'   => new sfValidatorPropelChoice(array('model' => 'FechaEtapaCarrera', 'column' => 'fecha_inicio', 'required' => false)),
      'id_etapa'       => new sfValidatorPropelChoice(array('model' => 'FechaEtapaCarrera', 'column' => 'id_etapa', 'required' => false)),
      'id_carrera'     => new sfValidatorPropelChoice(array('model' => 'FechaEtapaCarrera', 'column' => 'id_carrera', 'required' => false)),
      'max_corredores' => new sfValidatorInteger(array('required' => false)),
      'fecha_fin'      => new sfValidatorDate(array('required' => false)),
      'costo'          => new sfValidatorNumber(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'created_by'     => new sfValidatorInteger(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_by'     => new sfValidatorInteger(array('required' => false)),
      'estado'         => new sfValidatorString(array('max_length' => 1, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fecha_etapa_carrera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FechaEtapaCarrera';
  }


}
