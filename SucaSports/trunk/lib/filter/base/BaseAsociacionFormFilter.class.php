<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Asociacion filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseAsociacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                   => new sfWidgetFormFilterInput(),
      'direccion'                => new sfWidgetFormFilterInput(),
      'telefono'                 => new sfWidgetFormFilterInput(),
      'contacto'                 => new sfWidgetFormFilterInput(),
      'created_by'               => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'               => new sfWidgetFormFilterInput(),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'asociacion_corredor_list' => new sfWidgetFormPropelChoice(array('model' => 'Corredor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'                   => new sfValidatorPass(array('required' => false)),
      'direccion'                => new sfValidatorPass(array('required' => false)),
      'telefono'                 => new sfValidatorPass(array('required' => false)),
      'contacto'                 => new sfValidatorPass(array('required' => false)),
      'created_by'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'asociacion_corredor_list' => new sfValidatorPropelChoice(array('model' => 'Corredor', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('asociacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addAsociacionCorredorListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(AsociacionCorredorPeer::ID_ASOCIACION, AsociacionPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(AsociacionCorredorPeer::ID_CORREDOR, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(AsociacionCorredorPeer::ID_CORREDOR, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Asociacion';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'nombre'                   => 'Text',
      'direccion'                => 'Text',
      'telefono'                 => 'Text',
      'contacto'                 => 'Text',
      'created_by'               => 'Number',
      'created_at'               => 'Date',
      'updated_by'               => 'Number',
      'updated_at'               => 'Date',
      'asociacion_corredor_list' => 'ManyKey',
    );
  }
}
