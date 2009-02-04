<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Post filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BasePostFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'texto'                            => new sfWidgetFormFilterInput(),
      'created_by'                       => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'created_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'                       => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'updated_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'fecha_etapa_carrera_fecha_inicio' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'fecha_etapa_carrera_id_etapa'     => new sfWidgetFormFilterInput(),
      'fecha_etapa_carrera_id_carrera'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'texto'                            => new sfValidatorPass(array('required' => false)),
      'created_by'                       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'created_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'                       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'updated_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_etapa_carrera_fecha_inicio' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_etapa_carrera_id_etapa'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_etapa_carrera_id_carrera'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'texto'                            => 'Text',
      'created_by'                       => 'ForeignKey',
      'created_at'                       => 'Date',
      'updated_by'                       => 'ForeignKey',
      'updated_at'                       => 'Date',
      'fecha_etapa_carrera_fecha_inicio' => 'Date',
      'fecha_etapa_carrera_id_etapa'     => 'Number',
      'fecha_etapa_carrera_id_carrera'   => 'Number',
    );
  }
}
