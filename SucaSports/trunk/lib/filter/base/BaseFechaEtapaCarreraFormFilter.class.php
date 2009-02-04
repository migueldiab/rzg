<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * FechaEtapaCarrera filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseFechaEtapaCarreraFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'max_corredores' => new sfWidgetFormFilterInput(),
      'fecha_fin'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'costo'          => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by'     => new sfWidgetFormFilterInput(),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'     => new sfWidgetFormFilterInput(),
      'estado'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'max_corredores' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_fin'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'costo'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fecha_etapa_carrera_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FechaEtapaCarrera';
  }

  public function getFields()
  {
    return array(
      'fecha_inicio'   => 'Date',
      'id_etapa'       => 'Number',
      'id_carrera'     => 'Number',
      'max_corredores' => 'Number',
      'fecha_fin'      => 'Date',
      'costo'          => 'Number',
      'created_at'     => 'Date',
      'created_by'     => 'Number',
      'updated_at'     => 'Date',
      'updated_by'     => 'Number',
      'estado'         => 'Text',
    );
  }
}
