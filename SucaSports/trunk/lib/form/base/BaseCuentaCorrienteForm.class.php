<?php

/**
 * CuentaCorriente form base class.
 *
 * @package    form
 * @subpackage cuenta_corriente
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseCuentaCorrienteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'id_corredor'   => new sfWidgetFormInputHidden(),
      'id_forma_pago' => new sfWidgetFormPropelSelect(array('model' => 'FormaPago', 'add_empty' => false)),
      'monto'         => new sfWidgetFormInput(),
      'concepto'      => new sfWidgetFormInput(),
      'firma_digital' => new sfWidgetFormInput(),
      'fecha_de_pago' => new sfWidgetFormDate(),
      'nota'          => new sfWidgetFormTextarea(),
      'created_at'    => new sfWidgetFormDateTime(),
      'created_by'    => new sfWidgetFormInput(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'updated_by'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'CuentaCorriente', 'column' => 'id', 'required' => false)),
      'id_corredor'   => new sfValidatorPropelChoice(array('model' => 'Corredor', 'column' => 'id', 'required' => false)),
      'id_forma_pago' => new sfValidatorPropelChoice(array('model' => 'FormaPago', 'column' => 'id')),
      'monto'         => new sfValidatorNumber(),
      'concepto'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'firma_digital' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_de_pago' => new sfValidatorDate(array('required' => false)),
      'nota'          => new sfValidatorString(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'created_by'    => new sfValidatorInteger(array('required' => false)),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_by'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cuenta_corriente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CuentaCorriente';
  }


}
