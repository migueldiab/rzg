<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Inventario filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseInventarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'               => new sfWidgetFormFilterInput(),
      'id_tipo_equipamiento' => new sfWidgetFormPropelChoice(array('model' => 'Equipamiento', 'add_empty' => true)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'           => new sfWidgetFormFilterInput(),
      'id_estado'            => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'               => new sfValidatorPass(array('required' => false)),
      'id_tipo_equipamiento' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Equipamiento', 'column' => 'id')),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_estado'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Estado', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('inventario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inventario';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'nombre'               => 'Text',
      'id_tipo_equipamiento' => 'ForeignKey',
      'updated_at'           => 'Date',
      'updated_by'           => 'Number',
      'id_estado'            => 'ForeignKey',
    );
  }
}
