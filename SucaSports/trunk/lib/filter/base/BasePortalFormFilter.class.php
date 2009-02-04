<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Portal filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BasePortalFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombrepagina' => new sfWidgetFormFilterInput(),
      'texto'        => new sfWidgetFormFilterInput(),
      'updated_by'   => new sfWidgetFormFilterInput(),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'nombrepagina' => new sfValidatorPass(array('required' => false)),
      'texto'        => new sfValidatorPass(array('required' => false)),
      'updated_by'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('portal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Portal';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nombrepagina' => 'Text',
      'texto'        => 'Text',
      'updated_by'   => 'Number',
      'updated_at'   => 'Date',
    );
  }
}
