<?php

/**
 * EtapaCarrera form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseEtapaCarreraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_etapa'     => new sfWidgetFormInputHidden(),
      'id_carrera'   => new sfWidgetFormInputHidden(),
      'nombre'       => new sfWidgetFormInput(),
      'numero_etapa' => new sfWidgetFormInput(),
      'estado'       => new sfWidgetFormInput(),
      'created_at'   => new sfWidgetFormDateTime(),
      'created_by'   => new sfWidgetFormInput(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'updated_by'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id_etapa'     => new sfValidatorPropelChoice(array('model' => 'EtapaCarrera', 'column' => 'id_etapa', 'required' => false)),
      'id_carrera'   => new sfValidatorPropelChoice(array('model' => 'Carrera', 'column' => 'id', 'required' => false)),
      'nombre'       => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'numero_etapa' => new sfValidatorInteger(array('required' => false)),
      'estado'       => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'created_by'   => new sfValidatorInteger(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_by'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('etapa_carrera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EtapaCarrera';
  }


}
