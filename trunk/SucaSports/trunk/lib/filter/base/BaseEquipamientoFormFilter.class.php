<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Equipamiento filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseEquipamientoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'marca'                      => new sfWidgetFormFilterInput(),
      'id_tipo_equipamiento'       => new sfWidgetFormPropelChoice(array('model' => 'TipoEquipamiento', 'add_empty' => true)),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by'                 => new sfWidgetFormFilterInput(),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'                 => new sfWidgetFormFilterInput(),
      'corredor_equipamiento_list' => new sfWidgetFormPropelChoice(array('model' => 'Corredor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'marca'                      => new sfValidatorPass(array('required' => false)),
      'id_tipo_equipamiento'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoEquipamiento', 'column' => 'id')),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'corredor_equipamiento_list' => new sfValidatorPropelChoice(array('model' => 'Corredor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('equipamiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCorredorEquipamientoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, EquipamientoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CorredorEquipamientoPeer::ID_CORREDOR, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CorredorEquipamientoPeer::ID_CORREDOR, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Equipamiento';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'marca'                      => 'Text',
      'id_tipo_equipamiento'       => 'ForeignKey',
      'created_at'                 => 'Date',
      'created_by'                 => 'Number',
      'updated_at'                 => 'Date',
      'updated_by'                 => 'Number',
      'corredor_equipamiento_list' => 'ManyKey',
    );
  }
}
