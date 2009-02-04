<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Chip filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseChipFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_chip' => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by'  => new sfWidgetFormFilterInput(),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'  => new sfWidgetFormFilterInput(),
      'id_estado'   => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'codigo_chip' => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_estado'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Estado', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('chip_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chip';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'codigo_chip' => 'Text',
      'created_at'  => 'Date',
      'created_by'  => 'Number',
      'updated_at'  => 'Date',
      'updated_by'  => 'Number',
      'id_estado'   => 'ForeignKey',
    );
  }
}
