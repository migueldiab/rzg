<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CuentaCorriente filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseCuentaCorrienteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_forma_pago' => new sfWidgetFormPropelChoice(array('model' => 'FormaPago', 'add_empty' => true)),
      'monto'         => new sfWidgetFormFilterInput(),
      'concepto'      => new sfWidgetFormFilterInput(),
      'firma_digital' => new sfWidgetFormFilterInput(),
      'fecha_de_pago' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'nota'          => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by'    => new sfWidgetFormFilterInput(),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_forma_pago' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'FormaPago', 'column' => 'id')),
      'monto'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'concepto'      => new sfValidatorPass(array('required' => false)),
      'firma_digital' => new sfValidatorPass(array('required' => false)),
      'fecha_de_pago' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'nota'          => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('cuenta_corriente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CuentaCorriente';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_corredor'   => 'ForeignKey',
      'id_forma_pago' => 'ForeignKey',
      'monto'         => 'Number',
      'concepto'      => 'Text',
      'firma_digital' => 'Text',
      'fecha_de_pago' => 'Date',
      'nota'          => 'Text',
      'created_at'    => 'Date',
      'created_by'    => 'Number',
      'updated_at'    => 'Date',
      'updated_by'    => 'Number',
    );
  }
}
