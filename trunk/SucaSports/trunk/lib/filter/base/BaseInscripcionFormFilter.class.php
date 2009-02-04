<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Inscripcion filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseInscripcionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by'        => new sfWidgetFormFilterInput(),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'        => new sfWidgetFormFilterInput(),
      'fecha_inscripcion' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'firma_digital'     => new sfWidgetFormFilterInput(),
      'id_categoria'      => new sfWidgetFormPropelChoice(array('model' => 'Categoria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_inscripcion' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'firma_digital'     => new sfValidatorPass(array('required' => false)),
      'id_categoria'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categoria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('inscripcion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inscripcion';
  }

  public function getFields()
  {
    return array(
      'id_corredor'       => 'ForeignKey',
      'fecha_inicio'      => 'Date',
      'id_etapa'          => 'Number',
      'id_carrera'        => 'Number',
      'created_at'        => 'Date',
      'created_by'        => 'Number',
      'updated_at'        => 'Date',
      'updated_by'        => 'Number',
      'fecha_inscripcion' => 'Date',
      'firma_digital'     => 'Text',
      'id_categoria'      => 'ForeignKey',
    );
  }
}
