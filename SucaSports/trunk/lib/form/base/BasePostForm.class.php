<?php

/**
 * Post form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BasePostForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'texto'                            => new sfWidgetFormTextarea(),
      'created_by'                       => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'created_at'                       => new sfWidgetFormDateTime(),
      'updated_by'                       => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'updated_at'                       => new sfWidgetFormDateTime(),
      'fecha_etapa_carrera_fecha_inicio' => new sfWidgetFormDate(),
      'fecha_etapa_carrera_id_etapa'     => new sfWidgetFormInput(),
      'fecha_etapa_carrera_id_carrera'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'Post', 'column' => 'id', 'required' => false)),
      'texto'                            => new sfValidatorString(array('required' => false)),
      'created_by'                       => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'created_at'                       => new sfValidatorDateTime(array('required' => false)),
      'updated_by'                       => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'updated_at'                       => new sfValidatorDateTime(array('required' => false)),
      'fecha_etapa_carrera_fecha_inicio' => new sfValidatorDate(array('required' => false)),
      'fecha_etapa_carrera_id_etapa'     => new sfValidatorInteger(array('required' => false)),
      'fecha_etapa_carrera_id_carrera'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }


}
