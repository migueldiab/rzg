<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Categoria filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseCategoriaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                 => new sfWidgetFormFilterInput(),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'             => new sfWidgetFormFilterInput(),
      'regla'                  => new sfWidgetFormFilterInput(),
      'categoria_carrera_list' => new sfWidgetFormPropelChoice(array('model' => 'Carrera', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'                 => new sfValidatorPass(array('required' => false)),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'regla'                  => new sfValidatorPass(array('required' => false)),
      'categoria_carrera_list' => new sfValidatorPropelChoice(array('model' => 'Carrera', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categoria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCategoriaCarreraListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CategoriaCarreraPeer::ID_CATEGORIA, CategoriaPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CategoriaCarreraPeer::ID_CARRERA, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CategoriaCarreraPeer::ID_CARRERA, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Categoria';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'nombre'                 => 'Text',
      'updated_at'             => 'Date',
      'updated_by'             => 'Number',
      'regla'                  => 'Text',
      'categoria_carrera_list' => 'ManyKey',
    );
  }
}
